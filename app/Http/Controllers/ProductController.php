<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductContract;
use App\Services\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productInterface;
    protected $productContract;


    public function __construct(ProductInterface $productInterface, ProductContract $productContract)
    {
        $this->productInterface = $productInterface;
        $this->productContract = $productContract;
    }
    public function index()
    {
        $data = $this->productContract->getData();
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'images' => 'required',
        ]);
        $this->productInterface->storevalue($request);
        Session::flash('message', 'Successfully Product Created');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        //
        $data = $this->productInterface->findId($id);
        return view('edit-product', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        $this->productInterface->update($request);
        Session::flash('message', 'Successfully Product Updated');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $this->productInterface->deleteData($id);
        Session::flash('message', 'Successfully Product Deleted');
        return redirect('/');
    }

    public function DeleteImage($data,$id){
     
        $this->productInterface->deleteimg($data,$id);
        Session::flash('message', 'Successfully Product Image Deleted');
        return redirect()->back();
    }
}
