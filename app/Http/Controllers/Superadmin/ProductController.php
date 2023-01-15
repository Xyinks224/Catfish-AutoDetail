<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('superadmin.product.index', [
            'products' => $products
        ]);
    }

    public function data(DataTables $dataTables)
    {
        $data = Product::orderBy('created_at', 'desc');

        return $dataTables->eloquent($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function create()
    {
        return view('superadmin.product.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required|min:0',
            'facility' => 'required',
        ]);

        $input = $request->all();
        $product = Product::create($input);

        return redirect()->route('superadmin.product.create')->with('success', 'Produk '.$product->name.' berhasil dibuat!');
    }

    public function edit(Product $product)
    {
        return view('superadmin.product.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $product->update($input);

        return redirect()->route('superadmin.product.edit', $product->id)->with('success', 'Produk '.$product->name.' berhasil diubah!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product '.$product->name.' berhasil dihapus!');
    }
}
