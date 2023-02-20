<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function welcome ($name=null) {
//        dd($name ?? 'there is nothing here');

//        if (is_null($name)) {
//            dd('there is nothing here');
//        } else {
//            dd($name);
//        }
    }

    public function showText ($first_name=null) {
        $age = 15;
        return view('show_text', compact('first_name','age'));

    }
}
