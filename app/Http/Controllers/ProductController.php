<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:data_products,kode_barang|regex:/^[0-9]+$/|min:5|max:5',
            'nama_penerima' => 'required|regex:/^[a-zA-Z\s]+$/',
            'nama_barang' => 'required',
            'jenis_barang' => 'required'
        ],[
            'kode_barang.required' => 'Kode Barang Wajib Diisi',
            'kode_barang.unique' => 'Kode Barang Sudah Tersedia',
            'kode_barang.regex' => 'Kode Barang Wajib Diisi Angka',
            'kode_barang.min' => 'Kode Barang Minimal 5 Angka',
            'kode_barang.max' => 'Kode Barang Maksimal 5 Angka',
            'nama_penerima.required' => 'Nama Penerima Wajib Diisi',
            'nama_penerima.regex' => 'Nama Penerima Wajib Diisi Menggunakan Huruf',
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'jenis_barang.required' => 'Jenis Barang Wajib Diisi'
        ]);
        Product::create($request->all());

        return redirect()->route('product.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_penerima' => 'required|regex:/^[a-zA-Z\s]+$/',
            'nama_barang' => 'required',
            'jenis_barang' => 'required'
        ],[
            'nama_penerima.regex' => 'Nama Penerima Wajib Diisi Menggunakan Huruf',
            'nama_penerima.required' => 'Nama Penerima Wajib Diisi',
            'nama_barang.required' => 'Nama Barang Wajib Diisi'
        ]);
        $product->update($request->all());

        return redirect()->route('product.index')->with('success','Data Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success','Data Barang Berhasil Dihapus');
    }

}
