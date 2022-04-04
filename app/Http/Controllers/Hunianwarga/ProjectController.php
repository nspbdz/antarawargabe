<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use App\ProjectDetailApproval;
use App\Divisi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProjectController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $title = ["Master Project", "Master Project", ""];
        $search = $request->search;
        $data = Project::get();
        // dd($data);

        $data = Project::
                 where(function($query) use ($search)
                {
                    if ($search) {
                      $query->where('projectcode', 'like', '%'.$search.'%')
                    //   ->orWhere('tgl_transaksi', 'like', '%'.$search.'%')
                    //   ->orWhere('keterangan_bl', 'like', '%'.$search.'%')
                      ->orWhere('projectname', 'like', '%'.$search.'%');
                    }
                })

                // ->where('jenis_transaksi',1)
                // ->groupBy('id')
                ->orderBy('id', 'DESC')
                ->get();

        // dd($data);
        if ($request->ajax()) {
          return Datatables::of($data)
                ->addIndexColumn()

                // ->addColumn('created', function($row){
                // $data = !empty($row->created_at) ? $this->changeDateFormatShort($row->created_at) : "-";
                //     return $data;
                // })

                ->addColumn('action', function($row){

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('project.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';
                    $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('project.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                           <i class="bi-trash" aria-hidden="true" id="detailArea"></i></a>';

                    // $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('project.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    //                        <i class="bi-eye" aria-hidden="true" id="detailArea"></i></a>';
                    return $btn;
                  })

                ->rawColumns(['action'])
                ->make(true);
      }
      return view('project.index',['title' => $title,]);
    }
    public function store(Request $request) {
    // dd($request);
    $today = Carbon::today();
    // dd($this->changeDateFormat($today));
     try{
         if($request->id == null){


            $this->validate($request, [
                'projectcode' => 'required',
                'projectname' => 'required',
                'initiativename' => 'required',
                'budgetallocation' => 'required',

            ]);
        }else{
            $request->validate(
            [
                // 'projectname' => 'required|string|max:155',
            ],
            [
                // 'required' => 'Kolom :attribute tidak boleh kosong.',
                // 'unique' => 'Kolom :attribute sudah terdaftar.'
            ]);
        }
        if($request->id == null){
            $newDivisi = Project::updateOrInsert([
            // ['id'               => $request->data_id],
                'id'   => $request->data_id,
            ],[
                'projectcode'                => $request->projectcode,
                'projectname'                => $request->projectname,
                'budgetallocation'                => $request->budgetallocation,
                'initiativename'       => $request->initiativename,
                'isactive'            => 1,
                'createdby'           => Auth::id(),
                'created_at'          => $today,
                // 'created_at'  => $this->changeDateFormat($today),
            ]);
        }else{
            $newDivisi = Project::updateOrInsert([
               'id'           => $request->id
            ],[
                'projectcode'                => $request->projectcode,
                'projectname'                => $request->projectname,
                'budgetallocation'                => $request->budgetallocation,
                'initiativename'       => $request->initiativename,
                'updated_at'  => $today,
                'updatedby'   => Auth::id(),
                // 'updated_at'  => $this->changeDateFormat($today),
            ]);

        }

    }catch(Exception $e){
        $msg->sts = 0;
        $msg->msg = $e->getMessage();
        return redirect()->back()
          ->withErrors(['Divisi Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newDivisi) {
            return redirect()
                ->route('project.index')
                ->with([
                    'success' => 'New Divisi has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }

    }
    public function create() {
      $title = ["Master Project", "Master Project", "Tambah Data"];

        // return view('project.form');
      return view('project.form',['title' => $title,]);

    }

    public function show($id) {
        $divisi = $this->getUProjectById($id);
        return view('project.show', ['divisi' => $divisi, ]);
    }

    public function edit($id)
    {
        $title = ["Master Project", "Master Project", "Tambah Data"];

        $project = $this->getUProjectById($id);
        return view('project.form',['title' => $title,'project' => $project, ]);
    }


    public function status(Request $request) {
        $model = ProjectDetailApproval::find($request->id);
        if ($model->isactive == "1") {
            $model->isactive = "0";
            $model->notes =$request->input;
            // $model->updatedby = Auth::id();
            // $model->modifiedon = Carbon::now();
            $model->save();

            $status  = 200;
            $header  = 'Success';
            $message = 'Menu berhasil di non-aktifkan.';
        } else {
            $model->isactive = "0";
            // $model->updatedby = Auth::id();
            // $model->modifiedon = Carbon::now();
            $model->save();

            $status  = 200;
            $header  = 'Success';
            $message = 'Menu berhasil di aktifkan.';
        }
        return response()->json([
            'status' => $status,
            'header' => $header,
            'message' => $message
        ]);
    }
    public function getUProjectById($id){
        $divisi = Project::find($id);

        return $divisi;
      }

      public function changeDateFormat($date){
        return date('d-m-Y H:i:s',strtotime($date));
      }
      public function changeDateFormatShort($date){
        return date('d-m-Y',strtotime($date));
      }

}
