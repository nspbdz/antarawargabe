<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;

use App\Project;
use App\User;
use App\ProjectDetailApproval;
use App\Divisi;
use App\InternalOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;


class InternalOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $title = ["Internal Order", "Internal Order", ""];
        $search = $request->search;
        $data = InternalOrder::get();
        // dd($data);

        $data = InternalOrder::
                 where(function($query) use ($search)
                {
                    if ($search) {
                      $query->where('iocode', 'like', '%'.$search.'%')
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

                    $btn = '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('internal-order.edit', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    <i class="bi bi-pencil-square" aria-hidden="true" id="detailArea"></i></a>';
                    $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('internal-order.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                           <i class="bi-trash" aria-hidden="true" id="detailArea"></i></a>';

                    // $btn .= '<a class="edit btn btn-icon btn-info detail-menu-btn" href="' . route('divisi.show', $row['id']) . '" data-toggle="tooltip" data-placement="top" title="Detail Data">
                    //                        <i class="bi-eye" aria-hidden="true" id="detailArea"></i></a>';
                    return $btn;
                  })


                ->rawColumns(['action'])
                ->make(true);
      }
      return view('internalOrder.index',['title' => $title,]);
    }
    public function store(Request $request) {
// dd($request);
$today = Carbon::today();
// dd($today);
// dd($this->changeDateFormat($today));
     try{
         if($request->id == null){
            $this->validate($request, [
                'iocode' => 'required',
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
            $newIO = InternalOrder::updateOrInsert([
            // ['id'               => $request->data_id],

                'id'   => $request->data_id,
            ],[
                'iocode'  => $request->iocode,
                'name'       => $request->name,
                'isactive'       => 1,
                'createdby'  => Auth::id(),
                'created_at'  => $today,
                // 'created_at'  => $this->changeDateFormat($today),

            ]);
        }else{
            $newIO = InternalOrder::updateOrInsert([
               'id'                   => $request->id
            ],[
                'iocode'  => $request->iocode,
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
          ->withErrors(['internal Order Gagal Disimpan. ' . $msg->msg])
          ->withInput();
      }
       if ($newIO) {
            return redirect()
                ->route('internal-order.index')
                ->with([
                    'success' => 'New internal Order has been created successfully'
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
        $title = ["internal Order", "internal Order", "Edit Data"];
        return view('internalOrder.form',['title' => $title, ]);
    }

    public function show($id) {
        $internalOrder = $this->getIOById($id);
        return view('internalOrder.show', ['internalOrder' => $internalOrder, ]);
    }

    public function edit($id)
    {
        $title = ["internal Order", "internal Order", "Edit Data"];
        $internalOrder = $this->getIOById($id);
        return view('internalOrder.form',['title' => $title,'internalOrder' => $internalOrder, ]);
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
    public function getIOById($id){
        $internalOrder = InternalOrder::find($id);

        return $internalOrder;
      }

      public function changeDateFormat($date){
        return date('d-m-Y H:i:s',strtotime($date));
      }
      public function changeDateFormatShort($date){
        return date('d-m-Y',strtotime($date));
      }

}
