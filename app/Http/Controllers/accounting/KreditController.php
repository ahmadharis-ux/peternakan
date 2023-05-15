<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Kredit;
use App\Models\User;
use Illuminate\Http\Request;

class KreditController extends Controller
{

    public function index()
    {
        $listSupplierSapi = User::where('role_id', '5')->get();
        $listSupplierSapi = setFullname($listSupplierSapi);

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Buku - Hutang",
            'active' => "dashboard",
            'kredit' => Kredit::all(),
            'listSupplierSapi' => $listSupplierSapi,

        ];

        return view('accounting.kredit.index', $pageData);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Kredit $kredit)
    {
        //
    }


    public function edit(Kredit $kredit)
    {
        //
    }


    public function update(Request $request, Kredit $kredit)
    {
        //
    }


    public function destroy(Kredit $kredit)
    {
        //
    }
}
