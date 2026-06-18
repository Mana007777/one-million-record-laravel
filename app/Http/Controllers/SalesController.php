<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        return view('upload-file');
    }
    public function store(Request $request)
    {
        if(request()->has('file')){
            $data = array_map('str_getcsv', file($request->file));
            $header = $data[0];
            unset($data[0]);
            foreach ($data as $item) {
                $saleData = array_combine($header, $item);
                Sales::create($saleData);
              
            }
            return 'File uploaded successfully';
        }
    }
}
