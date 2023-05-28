<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\PemakaianPakan;
use Illuminate\Http\Request;

class PemakaianPakanController extends Controller
{

    public function index()
    {
        $pageData = [
            'title' => "Pemakaian pakan",
            'heading' => "Pemakaian pakan",
            'active' => "operasional kandang",
            'listPemakaianPakan' => PemakaianPakan::all(),
        ];
        return view('accounting.pemakaian_pakan.index', $pageData);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function show(PemakaianPakan $pemakaianPakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function edit(PemakaianPakan $pemakaianPakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemakaianPakan $pemakaianPakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemakaianPakan $pemakaianPakan)
    {
        //
    }
}
