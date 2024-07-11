<?php

namespace App\Repositories;

interface ProductContract
{
  public function storedata($request,$arr_str_img);

  public function getData();

  public function findById($id);

  public function updatedata($request,$arr_str_img);
  
  public function DeletebyId($id);

  public function Deletebyimg($data,$id);

}