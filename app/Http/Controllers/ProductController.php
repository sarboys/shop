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

    public function indexCategory ($cat,Request $request) {
        $paginate = 2;

        $cat = Category::where('alias',$cat)->first();
        $products = Product::where('category_id',$cat->id)->paginate($paginate);


        if(isset($request->orderBy)) {
            if($request->orderBy == 'price_low_high') {
                $products = Product::where('category_id',$cat->id)->orderBy('price')->paginate($paginate);
            }
        }
        if($request->ajax()) {
            return view('/ajax/order',['products'=> $products])->render();
        }
        return view('/categories/index',[
            'cat'=>$cat,
            'products'=>$products
        ]);
    }
}
