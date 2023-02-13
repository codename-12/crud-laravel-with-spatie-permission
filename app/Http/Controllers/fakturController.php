<?php

namespace App\Http\Controllers;

use App\Models\faktur;
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
         $this->middleware('permission:faktur-list|faktur-create|faktur-edit|faktur-delete', ['only' => ['index','show']]);
         $this->middleware('permission:faktur-create', ['only' => ['create','store']]);
         $this->middleware('permission:faktur-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:faktur-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->ajax()){
            $data = faktur::select('*');
            return Datatables::of($data)
                           ->addIndexColumn()
                           ->addColumn('action', 'faktur.actions')
                           ->rawColumns(['action'])
                           ->make(true);
               }
           return view('faktur.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faktur.create');
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
    
        faktur::create($request->all());
    
        return redirect()->route('faktur.index')
                        ->with('success','faktur created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(faktur $faktur)
    {
        return view('faktur.show',compact('faktur'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit(faktur $faktur)
    {
        return view('faktur.edit',compact('faktur'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, faktur $faktur)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $faktur->update($request->all());
    
        return redirect()->route('faktur.index')
                        ->with('success','faktur updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(faktur $faktur)
    {
        $faktur->delete();
    
        return redirect()->route('faktur.index')
                        ->with('success','faktur deleted successfully');
    }
}
