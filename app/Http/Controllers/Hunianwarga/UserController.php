<?php

namespace App\Http\Controllers\hunianwarga;
use App\Http\Controllers\Controller;

use App\Project;
use App\Role;
use App\Access;
use App\User;
use App\ProjectDetailApproval;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       $data=User::get();

       return response()->json([
        "status_code" => 200,
        "data" => $data
        // "token_type" => "Bearer",
       ]);

    }
    public function store(Request $request) {
        // dd($request);

     try{
         if($request->id == null){
        // dd($request);
            $this->validate($request, [
                'role_select' => 'required|not_in:0',
                'username' => 'required|unique:users,username',
                'jabatan' => 'required',
                'namadepan' => 'required',
                'namabelakang' => 'required',
                'nip' => 'required',
                'namatimleader' => 'required',
                'namavalidator' => 'required',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|min:8'
            ],
            [
                // 'required' => 'Kolom :attribute tidak boleh kosong.',
                'unique' => 'Kolom :attribute sudah terdaftar.'
            ]
        );

        }else{
            // dd($request);
            $request->validate(

            [
                // 'current_password' => ['required', new MatchOldPassword],
                // 'new_password' => ['required'],
                // 'new_confirm_password' => ['same:new_password'],
                // 'name' => 'required|string|max:155',
            ],
            [
                // 'required' => 'Kolom :attribute tidak boleh kosong.',
                // 'unique' => 'Kolom :attribute sudah terdaftar.'
            ]);
        }
        if($request->id == null){
            // dd($request);
            $newUser = User::updateOrInsert([
                'id'   => $request->data_id,
            ],[

                'username'       => $request->username,
                'position'       => $request->jabatan,
                'namadepan'       => $request->namadepan,
                'namabelakang'     => $request->namabelakang,
                'nip'               => $request->nip,
                'leaderteamname'       => $request->namatimleader,
                'validatorname'       => $request->namavalidator,
                'accessid' => $request->role_select,
                'isactive' => 1,
                'password' => Hash::make($request['password']),
            ]);
        }else{
            // User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);


            $newUser = User::updateOrInsert([
              'id'                   => $request->id
            ],[
                // 'username'       => $request->username,
                'position'       => $request->jabatan,
                'namadepan'       => $request->namadepan,
                'namabelakang'     => $request->namabelakang,
                'nip'               => $request->nip,
                'leaderteamname'       => $request->namatimleader,
                'validatorname'       => $request->namavalidator,
                'accessid' => $request->role_select,
                'isactive' => 1,
                'password' => Hash::make($request['new_password']),
            ]);

        }

    }catch(Exception $e){
        $msg->sts = 0;
        $msg->msg = $e->getMessage();
        return redirect()->back()
          ->withErrors(['User Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newUser) {
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'New User has been created successfully'
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
        $title = ["User", "User", "Create Data"];
        $role = Role::get();
        return view('manajemenUser.form',['title' => $title,'role' => $role, ]);
    }

    public function show($id) {
        $user = $this->getUserById($id);
        return view('manajemenUser.show', ['user' => $user, ]);
    }

    public function edit($id)
    {
        // $id id milik user
        $title = ["User", "User", "Edit Data"];
        $user = $this->getUserById($id);
        $role = Role::get();
        $UserAccess = User::with('getAccess')->where('id', '=', $id)->first();

        $access = Access::with('getRole')->get();
        $accessRole[] = array();

        foreach($access as $key=>$value){
            $accessRole[$key] = array(
              'id'              => $value['id'],
              'text'            => $value['getRole']['name'],
            //   'text'            => $value['id'].' - '.$value['getRole']['name'],
            );
          }
      $access['accessRole'] = $accessRole;


        return view('manajemenUser.form',['UserAccess' => $UserAccess,'access' => $access,'role' => $role,'title' => $title,'user' => $user, ]);
    }


    public function status(Request $request) {
        // dd($request);
        $model = User::find($request->id);
        if ($model['isactive'] == 1) {
            // dd($model['isactive']);
            $model['isactive'] = 0;
            // $model->notes =$request->input;
            // $model->updatedby = Auth::id();
            // $model->modifiedon = Carbon::now();
            $model->save();

            $status  = 200;
            $header  = 'Success';
            $message = 'Menu berhasil di non-aktifkan.';
        } else {
            $model['isactive'] = 1;
            // $model->updatedby = Auth::id();
            // $model->modifiedon = Carbon::now();
            $model->save();

            // dd($model['isactive']);
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
    public function getUserById($id){
        $user = User::find($id);

        return $user;
      }


}
