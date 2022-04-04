<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;

use App\Project;
use App\User;
use App\Departement;
use App\ProjectDetailApproval;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;


class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $title = ["Team", "Team", ""];
        $search = $request->search;
        $data = Team::get();
        // dd($data);

          $data = Team::
                 with('getDepartement')
                 ->where(function($query) use ($search)
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

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('team.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';
                    $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('team.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                           <i class="bi-trash" aria-hidden="true" id="detailArea"></i></a>';

                    // $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('team.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    //                        <i class="bi-eye" aria-hidden="true" id="detailArea"></i></a>';
                    return $btn;
                  })


                ->rawColumns(['action'])
                ->make(true);
      }
      return view('team.index',['title' => $title,]);
    }
    public function store(Request $request) {
    // dd($request);
    $today = Carbon::today();
    // dd($today);
    // dd($this->changeDateFormat($today));
     try{
         if($request->id == null){
            $this->validate($request, [
                'departement_select' => 'required|not_in:0',
                // 'role_select' => 'required|not_in:0',
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
            $newTeam = Team::updateOrInsert([
                'id'   => $request->data_id,
            ],[
                'name'       => $request->name,
                'departementCode'       => $request->departement_select,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'created_at'  => $today,
                // 'created_at'  => $this->changeDateFormat($today),

            ]);
        }else{
            $newTeam = Team::updateOrInsert([
               'id'                   => $request->id
            ],[
                'name'       => $request->name,
                'departementCode'       => $request->departement_select,
                'updated_at'  => $today,
                'updatedby'  => Auth::id(),
                // 'updated_at'  => $this->changeDateFormat($today),

            ]);

        }

    }catch(Exception $e){
        $msg->sts = 0;
        $msg->msg = $e->getMessage();
        return redirect()->back()
          ->withErrors(['Team Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newTeam) {
            return redirect()
                ->route('team.index')
                ->with([
                    'success' => 'New Team has been created successfully'
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
        $title = ["Team", "Team", "Edit Data"];
        $departement= Departement::get();
        return view('team.form',['title' => $title, 'departement' => $departement ]);

    }

    public function show($id) {
        $team = $this->getTeamById($id);
        $departement= Departement::get();

        return view('team.show', ['team' => $team, ]);
    }

    public function edit($id)
    {
        $title = ["Team", "Team", "Edit Data"];
        $team = $this->getTeamById($id);
        $departement= Departement::get();


        return view('team.form',['departement' => $departement,'title' => $title,'team' => $team, ]);
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
    public function getTeamById($id){
        $team = Team::find($id);

        return $team;
      }

      public function changeDateFormat($date){
        return date('d-m-Y H:i:s',strtotime($date));
      }
      public function changeDateFormatShort($date){
        return date('d-m-Y',strtotime($date));
      }

}
