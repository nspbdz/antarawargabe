<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;

use App\Project;
use App\User;
use App\Role;
use App\Access;
use App\ProjectDetailApproval;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $title = ["Role User", "Role User", ""];
        $search = $request->search;
        $data = Role::get();
        // dd($data);

        $data = Role::
                 where(function($query) use ($search)
                {
                    if ($search) {
                      $query->where('name', 'like', '%'.$search.'%');
                    //   ->orWhere('tgl_transaksi', 'like', '%'.$search.'%')
                    //   ->orWhere('keterangan_bl', 'like', '%'.$search.'%')
                    //   ->orWhere('name', 'like', '%'.$search.'%');
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

                ->addColumn('action', function($row){

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('role.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';
                    // $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('role.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    //                        <i class="bi-eye" aria-hidden="true" id="detailArea"></i></a>';
                    return $btn;
                  })


                ->rawColumns(['action'])
                ->make(true);
      }
      return view('roleUser.index',['title' => $title,]);
    }
    public function store(Request $request) {
        // dd($request);

        $dashboard = $request->dashboard == null ? $dataPage[]="0" : $dataPage[]=$request->dashboard;
        $masteruser = $request->master_user == null ? $dataPage[]="0" : $dataPage[]=$request->master_user;
        $masterrole = $request->master_role == null ? $dataPage[]="0" : $dataPage[]=$request->master_role;
        $masterproject = $request->master_project == null ? $dataPage[]="0" : $dataPage[]=$request->master_project;
        $masterdepartement = $request->master_departement == null ? $dataPage[]="0" : $dataPage[]=$request->master_departement;
        $masterteam = $request->master_team == null ? $dataPage[]="0" : $dataPage[]=$request->master_team;
        $masterinternalorder = $request->master_internal_order == null ? $dataPage[]="0" : $dataPage[]=$request->master_internal_order;
        $masterasset = $request->master_asset == null ? $dataPage[]="0" : $dataPage[]=$request->master_asset;
        $inputproject = $request->input_project == null ? $dataPage[]="0" : $dataPage[]=$request->input_project;
        $crosscheckdata = $request->cross_check_data == null ? $dataPage[]="0" : $dataPage[]=$request->cross_check_data;
        $approval = $request->approval == null ? $dataPage[]="0" : $dataPage[]=$request->approval;
        $reporting = $request->reporting == null ? $dataPage[]="0" : $dataPage[]=$request->reporting;
        $verifikasiupload = $request->verifikasi_upload == null ? $dataPage[]="0" : $dataPage[]=$request->verifikasi_upload;
        $reclass = $request->re_class == null ? $dataPage[]="0" : $dataPage[]=$request->re_class;

        // dd($dataPage);

        $pages=implode(",",$dataPage);
        // dd($pages);

     try{
         if($request->id == null){

            // echo $newId->id + 1;
            $this->validate($request, [
                // 'name' => 'required|unique:role',

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
            $newRole = Role::updateOrInsert([
                'id'   => $request->data_id,
            ],[
                "name"       => $request->name,
                "position"       => $request->position,
                // "page"       => "{$pages}",

            ]);
              $dataRole = Role::where('name', '=', $request->name)->first();

            $newRole = Access::updateOrInsert([
                'id'   => $request->data_id,
            ],[
                "roleid"       => $dataRole->id,
                "page"       => "{$pages}",

            ]);
        }else{
            // dd($request->id);
            $dataRole = Role::where('name', '=', $request->name)->first();
            // dd($dataRole);
            $data=Access::where('roleid', '=', $dataRole->id)->first();
            // dd($data);
            $newRole = Access::updateOrInsert([
                'id'   => $data->id,
            ],[
                "roleid"       => $dataRole->id,
                "page"       => "{$pages}",

            ]);

        }

    }catch(Exception $e){
        $msg->sts = 0;
        $msg->msg = $e->getMessage();
        return redirect()->back()
          ->withErrors(['Role Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newRole) {
            return redirect()
                ->route('role.index')
                ->with([
                    'success' => 'New Role has been created successfully'
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
        $title = ["Role", "Role", "Create Data"];

        $allPages=["dashboard","input project","cross check data","approval","reporting","verifikasi upload","re class","master", "master user","master role","master project","master departement","master team","master internal order","master asset",];

        return view('roleUser.form',['title' => $title,'allPages' => $allPages, ]);
    }

    public function show($id) {
        $Role = $this->getRoleUserById($id);
        return view('roleUser.show', ['role' => $Role, ]);
    }

    public function edit($id)
    {
        $title = ["Role", "Role", "Edit Data"];
        $role = $this->getRoleUserById($id);
        $access=Access::with('getRole')->where('roleid', '=', $id )->first();
        $pagesDataExplode=explode(",",$access->page);
        // $dashboard[] =["dashboard","];

        $allPages=["dashboard","input project","cross check data","approval","reporting","verifikasi upload","re class","master", "master user","master role","master project","master departement","master team","master internal order","master asset",];

        return view('roleUser.form',['title' => $title,'role' => $role,'pagesDataExplode' => $pagesDataExplode,'allPages' => $allPages, ]);
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
    public function getRoleUserById($id){
        $Role = Role::find($id);

        return $Role;
      }


}
