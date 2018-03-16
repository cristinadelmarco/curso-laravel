<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
    	return view('admin.products.create');
    }

    public function store(Request $request)
    {

    	$messages = [
    		'name.required' => 'El nombre es obligatorio',
    		'description.required' => 'La descripción es obligatoria',
    		'description.max' => 'La descripción no puede tener más de 200 caracteres',
    		'price.required' => 'El precio es obligatorio',
    		'price.numeric' => 'El precio debe ser un capo numérico',
    		'price.min' => 'El precio no puede ser menor a 0'
    	];
    	$rules = [
    		'name' => 'required',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	$this->validate($request, $rules, $messages);

    	//dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->price = $request->input('price');
    	$product->save();

    	return redirect('/admin/products');
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id)
    {
    	$messages = [
    		'name.required' => 'El nombre es obligatorio',
    		'description.required' => 'La descripción es obligatoria',
    		'description.max' => 'La descripción no puede tener más de 200 caracteres',
    		'price.required' => 'El precio es obligatorio',
    		'price.numeric' => 'El precio debe ser un capo numérico',
    		'price.min' => 'El precio no puede ser menor a 0'
    	];
    	$rules = [
    		'name' => 'required',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	$this->validate($request, $rules, $messages);

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->price = $request->input('price');
    	$product->save();

    	return redirect('/admin/products');
    }

    public function destroy($id)
    {
    	$product = Product::find($id);
    	$product->delete();

    	return back();
    }
}
