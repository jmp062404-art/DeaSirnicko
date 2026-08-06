<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    /*

    */
     //Public Method - accessible outside or inside classes
    public function index(){

        //return File::all();
        //Map Functions
        $files = File::all()->map(
            function ($file){ //Inline Callback
                $file->name = $this->stringFormatter($file->name);
                return $file;
            });

            return $files;
        
    }

    //Request parameter - represent http request galing kay client
    public function store(Request $request){
        //Validation - validate the data na nirequest kay client
        //required parehas, 255 max, unique email
         $validated = $request->validate([
            "name" => 'required|string|max:255',
            "email" => 'required|email|unique:files,email',
        ]);


        //Store
        $file = File::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
        ]);


        //Redirect
        return redirect()->route('file.create')->with('success', 'File created successfully!');
    }

    //private method - within class lang macacall
    //under encapsulation kasi nakaprivate
    private function stringFormatter($string){
        //return - magbabato ng data
        return strtoupper($string);
    }
}