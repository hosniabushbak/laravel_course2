<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Student;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function __construct() {
//        $this->ahmed = 'ahmed';
//        $this->middleware('auth')->except('password');
    }

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
        $ahmed = 'ahmed';
//        $students = Student::find(1)->toArray();
//        $students = Student::where('id', 1)->first()->toArray();
//        dd($students);
        return 1;
    }

    public function home () {
//        $data['supplier'] = Supplier::find(1);
//        $data['student'] = 'thaer';
//        dd(websiteName());
        $data['supplier'] = Supplier::find(3);
        $data['suppliers'] = Supplier::get();
        return view('theme.index', $data);
    }

    public function about () {
        $ahmed = 'ahmed';
//        $suppliers = Supplier::get()->toArray();
//        $suppliers = Supplier::all()->toArray();
//        $supplier = Supplier::find(1)->toArray();
//        $supplier = Supplier::where('name','safsa')->where('id',1)->first()->toArray();
//        $supplier = Supplier::where(['name'=>'safsa','id'=>1])->first()->toArray();
//        $supplier = Supplier::find(2);
//        if (is_null($supplier)) {
//            dd("no supplier");
//        }
//        $supplier = Supplier::findOrFail(2);
        $supplier = Supplier::find(1);

        return view('theme.about', compact('supplier'));

    }
}
