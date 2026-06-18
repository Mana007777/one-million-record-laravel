<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        return view('upload-file');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $data = array_map('str_getcsv', file($file));

        return response()->json(['message' => 'File uploaded successfully', 'data' => $data]);
    }
}
