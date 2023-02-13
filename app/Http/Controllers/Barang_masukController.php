<?php

namespace App\Http\Controllers;
use App\Models\barang_masuk;
use Datatables;
use Illuminate\Http\Request;

class Barang_masukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:barang_masuk-list|barang_masuk-create|barang_masuk-edit|barang_masuk-delete', ['only' => ['index','show']]);
         $this->middleware('permission:barang_masuk-create', ['only' => ['create','store']]);
         $this->middleware('permission:barang_masuk-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:barang_masuk-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      if ($request->ajax()){
        $data = barang_masuk::select('*')->with('category');
        return Datatables::of($data)
                       ->addIndexColumn()
                       ->addColumn('action', 'barang_masuk.actions')
                       ->rawColumns(['action'])
                       ->make(true);
           }
       return view('barang_masuk.index');
   }
  
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang_masuk.create');
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
    
        barang_masuk::create($request->all());
    
        return redirect()->route('barang_masuk.index')
                        ->with('success','Barang created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(barang_masuk $barang_masuk)
    {
        return view('barang_masuk.show',compact('barang_masuk'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(barang_masuk $barang_masuk)
    {
        return view('barang_masuk.edit',compact('barang_masuk'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang_masuk $barang_masuk)
    {
         request()->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_barang' => 'required',
            'qty' => 'required',
        ]);
    
        $barang_masuk->update($request->all());
    
        return redirect()->route('barang_masuk.index')
                        ->with('success','Barang updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_masuk $barang_masuk)
    {
        $barang_masuk->delete();
    
        return redirect()->route('barang_masuk.index')
                        ->with('success','Barang deleted successfully');
    }
}
