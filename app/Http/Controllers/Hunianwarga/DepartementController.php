<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;

use App\Project;
use App\User;
use App\ProjectDetailApproval;
use App\Departement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;


class DepartementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $title = ["Departement", "Departement", ""];
        $search = $request->search;
        $data = Departement::get();
        // dd($data);

        $data = Departement::
                 where(function($query) use ($search)
                {
                    if ($search) {
                      $query->where('code', 'like', '%'.$search.'%')
                    //   ->orWhere('tgl_transaksi', 'like', '%'.$search.'%')
                    //   ->orWhere('keterangan_bl', 'like', '%'.$search.'%')
                      ->orWhere('name', 'like', '%'.$search.'%');
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

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('departement.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';
                    $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('departement.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                           <i class="bi-trash" aria-hidden="true" id="detailArea"></i></a>';

                    // $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('departement.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    //                        <i class="bi-eye" aria-hidden="true" id="detailArea"></i></a>';
                    return $btn;
                  })


                ->rawColumns(['action'])
                ->make(true);
      }
      return view('departement.index',['title' => $title,]);
    }
    public function store(Request $request) {
    // dd($request);
    $today = Carbon::today();
    // dd($today);
    // dd($this->changeDateFormat($today));
     try{
         if($request->id == null){


            $this->validate($request, [
                'code' => 'required',
                'name' => 'required',
            ]);
        }else{
            $request->validate(
            [
                // 'name' => 'required|string|max:155',
            ],
            [
                // 'required' => 'Kolom :attribute tidak boleh kosong.',
                // 'unique' => 'Kolom :attribute sudah terdaftar.'
            ]);
        }
        if($request->id == null){
            $newDepartement = Departement::updateOrInsert([
                'id'   => $request->data_id,
            ],[
                'code'       => $request->code,
                'name'       => $request->name,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'created_at'  => $today,
                // 'created_at'  => $this->changeDateFormat($today),

            ]);
        }else{
            $newDepartement = Departement::updateOrInsert([
               'id'                   => $request->id
            ],[
                'name'       => $request->name,
                'updated_at'  => $today,
                'updatedby'  => Auth::id(),
                // 'updated_at'  => $this->changeDateFormat($today),

            ]);

        }

    }catch(Exception $e){
        $msg->sts = 0;
        $msg->msg = $e->getMessage();
        return redirect()->back()
          ->withErrors(['Departement Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newDepartement) {
            return redirect()
                ->route('departement.index')
                ->with([
                    'success' => 'New Departement has been created successfully'
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
        $title = ["Departement", "Departement", "Edit Data"];
        return view('departement.form',['title' => $title, ]);

    }

    public function show($id) {
        $departement = $this->getDepartementById($id);
        return view('departement.show', ['departement' => $departement, ]);
    }

    public function edit($id)
    {
        $title = ["Departement", "Departement", "Edit Data"];
        $departement = $this->getDepartementById($id);
        // dd($departement);
        return view('departement.form',['title' => $title,'departement' => $departement, ]);
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
    public function getDepartementById($id){
        $departement = Departement::find($id);

        return $departement;
      }

      public function changeDateFormat($date){
        return date('d-m-Y H:i:s',strtotime($date));
      }
      public function changeDateFormatShort($date){
        return date('d-m-Y',strtotime($date));
      }

}
