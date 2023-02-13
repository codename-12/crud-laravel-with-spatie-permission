<?php

namespace App\Http\Controllers;

use App\Models\master_barang;
use Illuminate\Http\Request;
use Datatables;
class MasterbarangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:master_barang-list|master_barang-create|master_barang-edit|master_barang-delete', ['only' => ['index','show']]);
         $this->middleware('permission:master_barang-create', ['only' => ['create','store']]);
         $this->middleware('permission:master_barang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:master_barang-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      if ($request->ajax()){
        $data = master_barang::select('*')->with('kategori');
        return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'master_barang.actions')
                       ->rawColumns(['action'])
                       ->make(true);
           }
       return view('master_barang.index');
   }
  
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_barang.create');
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
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_barang' => 'required',
            'qty' => 'required',
        ]);
    
        master_barang::create($request->all());
    
        return redirect()->route('master_barang.index')
                        ->with('success','Barang created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\master_barang  $master_barang
     * @return \Illuminate\Http\Response
     */
    public function show(master_barang $master_barang)
    {
        return view('master_barang.show',compact('master_barang'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\master_barang  $master_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(master_barang $master_barang)
    {
        return view('master_barang.edit',compact('master_barang'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\master_barang  $master_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, master_barang $master_barang)
    {
         request()->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_barang' => 'required',
            'qty' => 'required',
        ]);
    
        $master_barang->update($request->all());
    
        return redirect()->route('master_barang.index')
                        ->with('success','Barang updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\master_barang  $master_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(master_barang $master_barang)
    {
        $master_barang->delete();
    
        return redirect()->route('master_barang.index')
                        ->with('success','Barang deleted successfully');
    }
}
