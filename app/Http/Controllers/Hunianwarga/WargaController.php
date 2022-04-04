<?php

namespace App\Http\Controllers\hunianwarga;
use App\Http\Controllers\Controller;

use App\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;

use Illuminate\Support\Facades\Hash;


class WargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $title = ["Warga", "Warga", ""];
        $search = $request->search;
        $data = Warga::get();
        // dd($data);

        $data = Warga::
                 where(function($query) use ($search)
                {
                    if ($search) {
                      $query->where('code', 'like', '%'.$search.'%')
                      ->orWhere('name', 'like', '%'.$search.'%');
                    }
                })
                ->orderBy('id', 'DESC')
                ->get();

        // dd($data);
        if ($request->ajax()) {
          return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function($row){

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('warga.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';

                    return $btn;
                  })

                ->rawColumns(['action'])
                ->make(true);
      }
      return view('warga.index',['title' => $title,]);
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
       if ($newWarga) {
            return redirect()
                ->route('warga.index')
                ->with([
                    'success' => 'New Warga has been created successfully'
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
        $title = ["Warga", "Warga", "Create Data"];
        return view('warga.form',['title' => $title, ]);

    }



    public function show($id) {
        $warga = $this->getWargaById($id);
        return view('warga.show', ['warga' => $warga, ]);
    }

    public function edit($id)
    {
        $title = ["Warga", "Warga", "Edit Data"];
        $warga = $this->getWargaById($id);
        $time=$this->changeDateFormatShort($warga->birthdate);
        // dd($time);
        // dd($warga->birthdate);
        return view('warga.form',['time' => $time,'title' => $title,'warga' => $warga, ]);
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

