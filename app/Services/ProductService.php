<?php

namespace App\Services;

use App\Repositories\ProductContract;

class ProductService implements ProductInterface
{

    protected $productContract;

    public function __construct(ProductContract $productContract)
    {
        $this->productContract = $productContract;
    }

    public function storevalue($request)
    {

        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $images[] = $name;
            }
        }
        $arr_str_img = implode(",", $images);
        $data = $this->productContract->storedata($request,$arr_str_img);
        return $data;
    }

    public function findId($id){
        $getdata = $this->productContract->findById($id);
        return $getdata;
    }

    public function update($request){
        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $images[] = $name;
            }
        }
        $arr_str_img = implode(",", $images);
        $data = $this->productContract->updatedata($request,$arr_str_img);
        return $data;
    }

    public function deleteData($id){
        $getdata = $this->productContract->DeletebyId($id);
        return $getdata;
    }

    public function deleteimg($data,$id){
        $getimg = $this->productContract->Deletebyimg($data,$id);
        return $getimg;
    }

}
