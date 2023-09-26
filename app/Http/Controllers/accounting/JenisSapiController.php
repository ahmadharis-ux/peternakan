<?php

namespace App\Http\Controllers\accounting;

use App\Models\JenisSapi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JenisSapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageData = [
            'title' => "Jenis Sapi",
            'heading' => "Jenis sapi",
            'active' => "opsi",
            'listJenisSapi' => JenisSapi::all(),

        ];

        return view('accounting.jenis_sapi.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required",
        ]);

        $dataJenisSapiBaru = [
            'nama' => $request->nama,
            'id_author' => auth()->user()->id,
        ];


        JenisSapi::create($dataJenisSapiBaru);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisSapi  $jenisSapi
     * @return \Illuminate\Http\Response
     */
    public function show(JenisSapi $jenisSapi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisSapi  $jenisSapi
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisSapi $jenisSapi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisSapi  $jenisSapi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisSapi $jenisSapi)
    {
        // dd($request);

        $request->validate([
            "nama" => "required",
        ]);

        $jenisSapi = JenisSapi::find($request->id_jenisSapi);
        $jenisSapi->nama = $request->nama;
        $jenisSapi->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisSapi  $jenisSapi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  JenisSapi $jenisSapi)
    {
        $jenisSapi = JenisSapi::find($request->id_jenisSapi);
        $jenisSapi->delete();
        return redirect()->back();
    }
}
