<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        // abort_if(backpack_user()->hasAnyRole(['admin', 'customer']), 403);

        return view('vendor.backpack.base.import_data');
    }

    public function store(Request $request)
    {
        $request->validate([
            'contractExcelFile' => 'required|file',
            'language'          => 'required',
        ]);

        try {
            Excel::import(new ProductImport($request->language), $request->file('contractExcelFile'));

            \Alert::success('Importul s-a efectuat cu succes')->flash();
        } catch (\Throwable $th) {
            \Alert::error('Importul a esuat')->flash();
            throw $th;
        }

        return redirect()->back();
    }
}
