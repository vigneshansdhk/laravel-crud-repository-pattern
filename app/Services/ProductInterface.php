<?php

namespace App\Services;

interface ProductInterface
{
    public function storevalue($request);

    public function findId($id);

    public function update($request);

    public function deleteData($id);

    public function deleteimg($data,$id);


    
}
