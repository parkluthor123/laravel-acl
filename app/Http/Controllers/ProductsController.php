<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);

        return view("pages.main", array(
            'product' => $products,
        ));
    }

    public function register()
    {
        if(Gate::allows('manage-products'))
        {
            return view("pages.register");
        }
        else{
            return redirect()->back();
        }
    }

    public function doRegister(Request $request)
    {
        $products = new Product();
        $products['name'] = $request->name;
        $products['price'] = $request->price;
        $products['qtd'] = $request->qtd;
        $products['description'] = $request->description;
        $products['completed'] = $request->completed == "on" ? "Yes" : "No";

        if($products->save())
        {
            return redirect()->back()->with("message", "Product has been saved with success.");
        }
        else
        {
            return redirect()->back()->with("message", "Product not has been saved.");
        }
    }

    public function edit($id)
    {
        if(Gate::allows('manage-products'))
        {
            $products = Product::find($id);
            return view("pages.edit", array(
                'product' => $products,
            ));
        }
        else{
            return redirect()->back();
        }
    }

    public function doUpdate(Request $request, $id)
    {
        $products = Product::find($id);
        $products['name'] = $request->name;
        $products['price'] = $request->price;
        $products['qtd'] = $request->qtd;
        $products['description'] = $request->description;
        $products['completed'] = $request->completed == "on" ? "Yes" : "No";

        if($products->save())
        {
            return redirect()->back()->with("message", "Product has been saved with success.");
        }
        else
        {
            return redirect()->back()->with("message", "Product not has been saved.");
        }
    }

    public function delete($id)
    {
        $products = Product::find($id);

        if($products->delete())
        {
            return redirect()->back()->with("message", "Product has been deleted.");
        }
        else
        {
            return redirect()->back()->with("message", "Product not has been deleted.");
        }
    }
}
