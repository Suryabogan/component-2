<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Awe\JsonUtility;
use Storage;

class ProductController extends Controller
{
    //


    public function Homepage()
    {
        // dd($_SERVER);
        $file = $_SERVER["DOCUMENT_ROOT"]."\products.json";
        $data = JsonUtility::makeProductArray($file);
        $book = array();
        $cd = array();
        foreach ($data as $key => $value) {
           if ($key=="book") {
               $book[] = $value;
           }else{
               $cd[] =$value;
           }
        }
        return view('welcome', compact('book','cd'));
    }

    public function addNewproduct(Request $request)
    {
        $file = $_SERVER["DOCUMENT_ROOT"]."\products.json";
        $producttype = $request->product_type;  
        $title = $request->title;
        $fname = $request->firstname; 
        $sname = $request->surname; 
        $price = $request->price; 
        $pages = $request->pages;
        $res = JsonUtility::addNewProduct( $file,  $producttype,  $title,  $fname,  $sname,  $price, $pages);
        if ($res) {
            return $this->Homepage();
        }else{
            echo "Failed to add";
        }
    }

    public function getByid($id)
    {
        $file = $_SERVER["DOCUMENT_ROOT"]."\products.json";
        $data = JsonUtility::getProductWithId($file, $id);
        $data = $data[0];
        return view('select', compact('data'));
    }

    public function deleteItem($id)
    {
        $file = $_SERVER["DOCUMENT_ROOT"]."\products.json";
        return (JsonUtility::deleteProductWithId( $file, $id)) ? $this->Homepage() : response("Error");

    }

    public function updateItem(Request $request)
    {
        $file = $_SERVER["DOCUMENT_ROOT"]."\products.json";
        $producttype = $request->product_type;
        $id = $request->id;  
        $title = $request->title;
        $fname = $request->firstname; 
        $sname = $request->surname; 
        $price = $request->price; 
        $pages = $request->pages;
        $res= JsonUtility::updateProductWithId( $file,  $id,  $title,  $fname,  $sname, $price,  $pages);
        if ($res) {
            return $this->Homepage();
        }else{
            echo "Failed to update";
        }
    }

   
}
