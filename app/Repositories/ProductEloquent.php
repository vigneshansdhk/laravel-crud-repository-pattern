<?php

namespace App\Repositories;

use App\Models\Product;

class ProductEloquent implements ProductContract
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getData()
    {
        $res = $this->product->get();
        return $res;
    }

    public function storedata($request, $arr_str_img)
    {

        $data = $this->product->create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $arr_str_img,
            "qty" => $request->quantity,
        ]);
        return $data;
    }

    public function findById($id)
    {
        $res_data = $this->product->find($id);
        return $res_data;
    }

    public function updatedata($request, $arr_str_img)
    {
        $data = $this->product->find($request->id);
        if ($data->image) {
            if ($arr_str_img) {
                $concat = $data->image . "," . $arr_str_img;
                $data['image'] = $concat;
            }
        } else {
            $data['image'] = $arr_str_img;
        }
        $data->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "qty" => $request->quantity,
        ]);
        return $data;
    }

    public function DeletebyId($id)
    {
        $res_data = $this->product->where('id', $id)->delete();
        return $res_data;
    }

    public function Deletebyimg($data, $id)
    {
        
        $del_data = $this->product->find($id);
        $del_list = $del_data->image;
        $arr_list = explode(',', $del_list);
        
        $key = array_search($data, $arr_list);
        
        if (false !== $key) {
            unset($arr_list[$key]);
        }
        $st = implode(',',$arr_list);
        $suc = $this->product->where('id',$id)->update(['image' => $st]);
        return $suc;
    }
}
