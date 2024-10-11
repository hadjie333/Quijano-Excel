<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportUsers extends Controller
{
    public static function import(Request $request) {

        if(($open = fopen('C:\Users\fc\Downloads\users.csv' , 'r')) !== false) {
        while(($data = fgetcsv($open, 1000, ",")) !== false) {
            DB::table("users")->insert([
            "fname" => $data[0],
            "lname" => $data[1],
            "age"   => $data[2]
            
            ]);
        }
        return[
          "success" => true,
          "message" => "import successfully"
           ];
    } 
    else{
    return[
   "success" => false,
   "message" => "Files doesnt exist"
    ];
    
    }
 }
  }
