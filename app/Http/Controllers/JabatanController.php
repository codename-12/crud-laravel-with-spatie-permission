<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use Datatables;
class JabatanController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:jabatan-list|jabatan-create|jabatan-edit|jabatan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:jabatan-create', ['only' => ['create','store']]);
         $this->middleware('permission:jabatan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:jabatan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->ajax()){
            $data = jabatan::select('*');
            return Datatables::of($data)
                           ->addIndexColumn()
                           ->addColumn('action', 'jabatan.actions')
                           ->rawColumns(['action'])
                           ->make(true);
               }
           return view('jabatan.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
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
            'nama_jabatan' => 'required',
            'gaji' => 'required',
        ]);
    
        jabatan::create($request->all());
    
        return redirect()->route('jabatan.index')
                        ->with('success','jabatan created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(jabatan $jabatan)
    {
        return view('jabatan.show',compact('jabatan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(jabatan $jabatan)
    {
        return view('jabatan.edit',compact('jabatan'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jabatan $jabatan)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $jabatan->update($request->all());
    
        return redirect()->route('jabatan.index')
                        ->with('success','jabatan updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jabatan $jabatan)
    {
        $jabatan->delete();
    
        return redirect()->route('jabatan.index')
                        ->with('success','jabatan deleted successfully');
    }
}
