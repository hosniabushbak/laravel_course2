<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Student;
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

        $customers = Customer::get()->toArray();
        dd($customers);

        $age = 'amhed';
        return view('test.show_text', compact('first_name','age'));
    }

    public function password() {
//        $students = Student::find(1)->toArray();
        $students = Student::where('id', 1)->first()->toArray();
        dd($students);
    }

    public function home () {
        return view('theme.index');
    }

    public function about () {
        return view('theme.about');
    }
}
