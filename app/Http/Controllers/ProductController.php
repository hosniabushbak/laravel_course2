<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Mail\TestMail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
//    public function __construct()
//    {
//        $date = Carbon::now()->format('Y-m-d');
//        $this->date = $date;
//    }

    public function index () {
        $data['products'] = Product::withoutGlobalScope('status')->get();
        return view('products.index', $data);
    }
    public function create() {
        return view('products.create');
    }

    public function store (StoreProductRequest $request) {


//        $imageExtention = $request->image->extension();
//        $fileName = time().'.'.$imageExtention;
//        $request->image->move('images', $fileName);


//        dd(Product::get()->toArray());
//        $name = $request->product_name;
//        $price = $request->product_price;
//        $requestR = $this->requestR();

//        $transR = [
//            'name.required' => 'الاسم مطلوب',
//            'price.required' => 'السعر مطلوب',
//            'price.numeric' => 'السعر يجب أن يكون أرقام',
//        ];
//
//        $validate = Validator::make($request->all(), $requestR, $transR);
//
//        if ($validate->fails()) {
//            return redirect()->back()->withErrors($validate)->withInput($request->all());
////            $msg = $validate->errors()->first();
////            return redirect()->back()->with(['error'=>$msg]);
//        }

        $dataR = $request->only('name', 'price');
//        $dataR['image'] = $fileName;
//        $status = $request->product_price;

            $product = Product::create($dataR);
        $product
            ->addMedia($request->image)
            ->toMediaCollection();

//        $product = new Product;
//        $product->name = $name;
//        $product->price = $price;
//        $product->save();
//
//        $product = Product::create([
//           'name' => $name,
//           'price' => $price
//        ]);

//        $dummyData = [
//            [
//                'name' => 't',
//                'price' => 12,
//                'date' => $this->date(),
//                'image' => $fileName,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'name' => 'y',
//                'price' => 4,
//                'date' => $this->date(),
//                'image' => $fileName,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]
//        ];
//
//
//        $product = Product::insert($dummyData);



        $success = __('website.success');
//        return redirect()->back()->with(['success'=> $success]);
        return redirect()->route('products.index');
    }

//    public function requestR () {
//        return $requestR = [
//            'name' => ['required'],
//            'price' => ['required', 'numeric']
//        ];
//    }

    public function show($id) {
        $data['product'] = Product::findOrFail($id);
        return view('products.show', $data);
    }

    public function edit($id) {
        $data['product'] = Product::findOrFail($id);

        return view('products.edit', $data);
//        $product = Product::find($id);
//        if (!$product) {
//            abort(404);
//        }
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);


        $dataR = $request->only('name', 'price', 'status');
        $dataR['date'] = '2023-03-12';


        $update = $product->update($dataR);
        if (!$update) {
            return 'false';
        }
        return redirect()->route('products.index')->with(['sucess' => 'updated']);
    }

    public function destroy($id) {
//        $product = Product::find($id);
//        $product->delete();
        $product = Product::destroy($id);
    }

    public function emails() {
        $data = [
          'name' => 'ahmed',
          'age' => '22',
        ];

        Mail::to('abushbakhosni@gmail.com')->cc('abushbakthaer@gmail.com')->send(new TestMail($data));
    }
}
