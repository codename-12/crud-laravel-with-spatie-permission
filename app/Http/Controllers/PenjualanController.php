<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Http\Request;
use Datatables;
class PenjualanController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:penjualan-list|penjualan-create|penjualan-edit|penjualan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:penjualan-create', ['only' => ['create','store']]);
         $this->middleware('permission:penjualan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:penjualan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->ajax()){
            $data = penjualan::select('*')->with('master_barang');
            return Datatables::of($data)
                           ->addIndexColumn()
                           ->addColumn('action', 'penjualan.actions')
                           ->rawColumns(['action'])
                           ->make(true);
               }
           return view('penjualan.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tgl_faktur'=>'required',
            'no_faktur'=>'required',
            'nama_konsumen'=>'required',
            'kode_barang'=>'required',
            'jumlah' =>'required',
            'harga_satuan'=>'required',
            'harga_total'=>'required',
        ]);
    
        penjualan::create($request->all());
    
        return redirect()->route('penjualan.index')
                        ->with('success','penjualan created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
        return view('penjualan.show',compact('penjualan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(penjualan $penjualan)
    {
        return view('penjualan.edit',compact('penjualan'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualan $penjualan)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $penjualan->update($request->all());
    
        return redirect()->route('penjualan.index')
                        ->with('success','penjualan updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {
        $penjualan->delete();
    
        return redirect()->route('penjualan.index')
                        ->with('success','penjualan deleted successfully');
    }
}
