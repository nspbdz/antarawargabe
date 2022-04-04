<?php

namespace App\Http\Controllers\hunianwarga;
use App\Http\Controllers\Controller;

use App\Hunian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;

use Illuminate\Support\Facades\Hash;


class HunianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $title = ["Hunian", "Hunian", ""];
        $search = $request->search;
        $data = Hunian::get();
        // dd($data);

        $data = Hunian::
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

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('hunian.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';

                    return $btn;
                  })
                  ->addColumn('rumah', function($row){
                    $rumah=$row->block_number.'. '.$row->house_number;
                    // $merged = $row->block_number
                    return $rumah;
                  })

                ->rawColumns(['action','rumah'])
                ->make(true);
      }
      return view('hunian.index',['title' => $title,]);
    }
    public function store(Request $request) {
    // dd($request);
    $today = Carbon::today();
    // dd($today);
     try{
         if($request->id == null){

            $this->validate($request, [
                // 'nik' => 'required',
                // "name" => "required",
                // "tanggallahir" => "required",
                // "tempatlahir" => "required",
                // "pekerjaan" => "required",

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
            $newHunian = Hunian::updateOrInsert([
                'id'   => $request->data_id,
            ],[
                'block_number' => $request->nomor_blok,
                'house_number' => $request->nomor_rumah,
                'building_type' => $request->tipe_bangungan,
                'surface_area' => $request->luas_tanah,
                'building_area' => $request->luas_bangunan,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'created_at'  => $today,
            //     // 'created_at'  => $this->changeDateFormat($today),
            ]);
        }else{

            $newHunian = Hunian::updateOrInsert([
               'id'                   => $request->id
            ],[
                'block_number' => $request->nomor_blok,
                'house_number' => $request->nomor_rumah,
                'building_type' => $request->tipe_bangungan,
                'surface_area' => $request->luas_tanah,
                'building_area' => $request->luas_bangunan,
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
          ->withErrors(['Hunian Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newHunian) {
            return redirect()
                ->route('hunian.index')
                ->with([
                    'success' => 'New Hunian has been created successfully'
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
        $title = ["Hunian", "Hunian", "Create Data"];
        return view('hunian.form',['title' => $title, ]);

    }



    public function show($id) {
        $hunian = $this->getHunianById($id);
        return view('hunian.show', ['hunian' => $hunian, ]);
    }

    public function edit($id)
    {
        $title = ["Hunian", "Hunian", "Edit Data"];
        $hunian = $this->getHunianById($id);
        // $time=$this->changeDateFormatShort($hunian->birthdate);
        // dd($time);
        // dd($hunian->birthdate);
        return view('hunian.form',['title' => $title,'hunian' => $hunian, ]);
    }


    public function status(Request $request) {
        $model = Hunian::find($request->id);
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


    public function getHunianById($id){
        $hunian = Hunian::find($id);

        return $hunian;
      }

      public function changeDateFormat($date){
        return date('d-m-Y H:i:s',strtotime($date));
      }
      public function changeDateFormatShort($date){
        // return date('d-m-Y',strtotime($date));
        return date('Y-m-d',strtotime($date));
      }




    }

