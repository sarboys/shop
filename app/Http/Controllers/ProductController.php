<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ($cat,$id) {
        $detail_products = Product::where('id',$id)->first();
//        dd($detail_products);
        return view('/product/index',[
            'detail_products' => $detail_products
        ]);
    }

    public function indexCategory ($cat) {
        $cat = Category::where('alias',$cat)->first();

        return view('/categories/index',[
            'cat'=>$cat
        ]);
    }
}
