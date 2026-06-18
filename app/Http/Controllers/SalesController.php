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
    public function upload(Request $request)
    {
        if (request()->has('file')) {
            // $data = array_map('str_getcsv', file($request->file));
            $data = file($request->file);
            // $header = $data[0];
            // unset($data[0]);

            $chunks = array_chunk($data, 1000);

            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                $path = resource_path("temp");
                file_put_contents("$path . $name", $chunk);
            }

            // foreach ($data as $item) {
            //     $saleData = array_combine($header, $item);
            //     Sales::create($saleData);
            // }
            return 'File uploaded successfully';
        }
    }

    public function store(Request $request)
    {
        $path = resource_path("temp");
        $files = glob("$path/*.csv");
        $header = [];
        foreach ($files as $key =>  $file) {
            $data = array_map('str_getcsv', file($file));
            if($key == 0){
                $header = $data[0];
                unset($data[0]);
            }
            foreach ($data as $item) {
                $saleData = array_combine($header, $item);
                Sales::create($saleData);
            }
            unlink($file); 
        }
        return 'Data stored successfully';

    }
}
