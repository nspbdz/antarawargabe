<?php

namespace App\Http\Controllers\hunianwarga;
use App\Http\Controllers\Controller;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\Validator;
use App\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;


class WargaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function warga(Request $request)
    {
       $data=Warga::get();

       return response()->json([
        "status_code" => 200,
        "data" => $data
        // "token_type" => "Bearer",
       ]);

    }

    public function SearchWarga(Request $request)
    {
    // dd($request->name);

        // $request;
    //    $data=Warga::get();

       $data = Warga::where('name','LIKE','%'.$request->name.'%')
                ->orWhere('nik','LIKE','%'.$request->name.'%')
                ->get();

       return response()->json([
        "status_code" => 200,
        "data" => $data
        // "token_type" => "Bearer",
       ]);

    }
    public function create(Request $request)
    {
    $today = Carbon::today();

        try{

               $this->validate($request, [
                   'nik' => 'required|unique:warga',
                   "name" => "required",
                   "tanggallahir" => "required",
                   "tempatlahir" => "required",
                   "pekerjaan" => "required",
                   // 'warga_lingkungan'=> 'required|in:1,0',
                   'wargalingkungan' => 'required|not_in:null',
               ]);

               $newWarga = Warga::updateOrInsert([
                   'id'   => $request->data_id,
               ],[
                   "nik" => $request->nik,
                   "name" => $request->name,
                   "placeofbirth" => $request->tempatlahir,
                   "birthdate" => $request->tanggallahir,
                   "job" => $request->pekerjaan,
                   "iswarga_lingkungan" => $request->warga_lingkungan,
                   'isactive'       => 1,
                   'createdby'  => Auth::id(),
                   'created_at'  => $today,
               //     // 'created_at'  => $this->changeDateFormat($today),
               ]);

            // $data = Warga::find($id);
            $data = Warga::where("nik", "=", $request->nik)
            ->get();

           return response()->json([
            "data" => $data,
            "message" =>"Warga has been created successfully"
            // "token_type" => "Bearer",
           ]);
       }catch(Exception $e){

           $msg->sts = 0;
           $msg->msg = $e->getMessage();
           return response()->json([
            "data" => $data,
            "message" =>"Warga Gagal Disimpan". $msg->msg
            // "token_type" => "Bearer",
           ]);
        }
}
    public function update(Request $request) {
        $today = Carbon::today();

    try{
            $request->validate(
            [
                // 'name' => 'required|string|max:155',
            //   'tgl_transaksi_input'       => 'required',
            ],
            [
                // 'required' => 'Kolom :attribute tidak boleh kosong.',
                'unique' => 'Kolom :attribute sudah terdaftar.'
            ]);

            $newWarga = Warga::updateOrInsert([
                'id'                   => $request->id
            ],[
                // "nik" => $request->nik,
                "name" => $request->name,
                "placeofbirth" => $request->tempatlahir,
                "birthdate" => $request->tanggallahir,
                "job" => $request->pekerjaan,
                "iswarga_lingkungan" => $request->warga_lingkungan,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'updated_at'  => $today,
            //     'updatedby'  => Auth::id(),
            //     // 'updated_at'  => $this->changeDateFormat($today),

            ]);


            $data = Warga::find($request->id);
            // $data = Warga::where("nik", "=", $request->nik)
            // ->get();

            return response()->json([
                "data" => $data,
                "message" =>"Warga has been updated successfully"
                // "token_type" => "Bearer",
            ]);

        }catch(Exception $e){

            $msg->sts = 0;
            $msg->msg = $e->getMessage();
            return response()->json([
                "data" => $data,
                "message" =>"Warga updated failed". $msg->msg
                // "token_type" => "Bearer",
            ]);
            }
    }
    public function store(Request $request) {
    // dd($request);
    $today = Carbon::today();
    // dd($today);
     try{
         if($request->id == null){

            $this->validate($request, [
                'nik' => 'required|unique:warga',
                "name" => "required",
                "tanggallahir" => "required",
                "tempatlahir" => "required",
                "pekerjaan" => "required",
                // 'warga_lingkungan'=> 'required|in:1,0',
                'warga_lingkungan' => 'required|not_in:null',
            ]);
        }else{
            $request->validate(
            [
                // 'name' => 'required|string|max:155',
            //   'tgl_transaksi_input'       => 'required',
            ],
            [
                // 'required' => 'Kolom :attribute tidak boleh kosong.',
                'unique' => 'Kolom :attribute sudah terdaftar.'
            ]);
        }

        if($request->id == null){
            $newWarga = Warga::updateOrInsert([
                'id'   => $request->data_id,
            ],[
                "nik" => $request->nik,
                "name" => $request->name,
                "placeofbirth" => $request->tempatlahir,
                "birthdate" => $request->tanggallahir,
                "job" => $request->pekerjaan,
                "iswarga_lingkungan" => $request->warga_lingkungan,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'created_at'  => $today,
            //     // 'created_at'  => $this->changeDateFormat($today),
            ]);
        }else{

            $newWarga = Warga::updateOrInsert([
               'id'                   => $request->id
            ],[
                "nik" => $request->nik,
                "name" => $request->name,
                "placeofbirth" => $request->tempatlahir,
                "birthdate" => $request->tanggallahir,
                "job" => $request->pekerjaan,
                "iswarga_lingkungan" => $request->warga_lingkungan,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'updated_at'  => $today,

            //     'updatedby'  => Auth::id(),
            //     // 'updated_at'  => $this->changeDateFormat($today),

            ]);

        }

    }catch(Exception $e){
        $msg->sts = 0;
        $msg->msg = $e->getMessage();
        return redirect()->back()
          ->withErrors(['Warga Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }


    }


    public function show($id) {
        // $warga = $this->getWargaById($id);
        $data = $this->getWargaById($id);

        // $time = $data->birthdate;
        return response()->json([
            "status_code" => 200,
            "data" => $data
            // "token_type" => "Bearer",
           ]);
        // return view('warga.show', ['warga' => $warga, ]);
    }

    public function updateWarga($id)
    {
        $title = ["Warga", "Warga", "Edit Data"];
        // $data = Warga::find($id);
        $data = $this->getWargaById($id);
        // $time=$this->changeDateFormatShort($warga->birthdate);
        return response()->json([
            "status_code" => 200,
            "data" => $data
            // "token_type" => "Bearer",
           ]);
    }
    public function createWarga($id)
    {
        $title = ["Warga", "Warga", "Edit Data"];
        // $data = Warga::find($id);
        $data = $this->getWargaById($id);
        // $time=$this->changeDateFormatShort($warga->birthdate);
        return response()->json([
            "status_code" => 200,
            "data" => $data
            // "token_type" => "Bearer",
           ]);
    }


    public function status(Request $request) {
        $model = Warga::find($request->id);
        if ($model->isactive == "1") {
            $model->isactive = "0";
            // $model->notes =$request->input;
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


    public function getWargaById($id){
        $warga = Warga::find($id);

        return $warga;
      }

      public function changeDateFormat($date){
        return date('d-m-Y H:i:s',strtotime($date));
      }
      public function changeDateFormatShort($date){
        // return date('d-m-Y',strtotime($date));
        return date('Y-m-d',strtotime($date));
      }




    }
