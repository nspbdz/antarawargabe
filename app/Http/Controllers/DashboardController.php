<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
       $data="data";

         return view('dashboard.index',['data' => $data,]);

    }

    public function sidebar(Request $request)
    {
        $data= User::get();

         return view('layouts.sidebar',['data1' => $data1,]);

    }
    // public function index(Request $request)
    // {
    //     $title = ["Penerimaan Bina Lingkungan", "Penerimaan BL", ""];

    //     $search = $request->search;

    //     $data = Product::
    //              where(function($query) use ($search)
    //             {
    //                 if ($search) {
    //                   $query->where('title', 'like', '%'.$search.'%')
    //                 //   ->orWhere('tgl_transaksi', 'like', '%'.$search.'%')
    //                 //   ->orWhere('keterangan_bl', 'like', '%'.$search.'%')
    //                   ->orWhere('price', 'like', '%'.$search.'%');
    //                 }
    //             })
    //             // ->where(function($query) use ($status)
    //             // {
    //             //     if ($status != null) {
    //             //       $query->where('status','=',(int)$status);
    //             //     }
    //             // })

    //             // ->where('jenis_transaksi',1)
    //             // ->groupBy('id')
    //             ->orderBy('id', 'DESC')
    //             ->get();

    //     // dd($data);
    //     if ($request->ajax()) {
    //       return Datatables::of($data)
    //             ->addIndexColumn()

    //             ->addColumn('keterangan_bl', function($row){
    //                 $data = !empty($row->keterangan_bl) ? $row->keterangan_bl : "-";
    //                 return $data;
    //             })
    //             ->addColumn('total', function($row){
    //                 $data = !empty($row->total) ? "Rp ".number_format($row->total,0,',','.') : "-";
    //                 return $data;
    //             })

    //             ->rawColumns(['action','status','no_voucher','tgl_transaksi','keterangan_bl','total'])
    //             ->make(true);
    //   }

    //   return view('product.index',['title' => $title,]);
    // }
    // public function index(Request $request)
    // {
    //     $data= Product::get();
    //     // return view
    //     // dd($data);
    //     return view('product.index', ['data' => $data]);
    // }
    public function filter(Request $request)
    {
        $search=$request->title;
        dd($search);
    }
}
