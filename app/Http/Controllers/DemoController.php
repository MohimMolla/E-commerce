<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    public function index()
    {
        //   $user = DB::table('products')->get();
        //   $user = DB::table('users')->first();
        //   $user = DB::table('users')->find(10);
        //   $user = DB::table('products')->find(5);
        //   $user = DB::table('products')->pluck('short_des','title');
        //   $user = DB::table('products')->count();
        //   $user1 = DB::table('products')->max('price');
        //   $user2 = DB::table('products')->min('price');
        //   $user = $user2 - $user1;
        //$user = DB::table('products')->avg('price');
        //$user = DB::table('products')->sum('price');
        //$user = DB::table('products')->select('id','title','price')->get();
        //$user = DB::table('products')->select('id','title','price','stock')->distinct()->get();


        //inner join section
        //$user = DB::table('products')
        //->join('categories','products.category_id', '=', 'categories.id' )
        //->join('brands','products.brand_id', '=', 'brands.id' )
        //->distinct()->get();

        //left join section
        //$user = DB::table('products')
        //->leftJoin('categories','products.category_id', '=', 'categories.id' )
        //->leftJoin('brands','products.brand_id', '=', 'brands.id' )
        //->get();

        //right join section
        //$user = DB::table('products')
        //->rightJoin('categories','products.category_id', '=', 'categories.id' )
        //->rightJoin('brands','products.brand_id', '=', 'brands.id' )
        //->get();

        //cross join section
        //$user = DB::table('products')
        //->crossJoin('categories','products.category_id', '=', 'categories.id' )
        //->crossJoin('brands','products.brand_id', '=', 'brands.id' )
        //->get();

        //advance join
        //$user = DB::table('products')
        //->join('categories', function(JoinClause $join){
        //    $join->on('products.category_id', '=','categories.id');
        //})
        //->where('products.price','<', 500)
        //->join('brands', function(JoinClause $join){
        //    $join->on('products.brand_id', '=','brands.id');
        //})
        //->where('brands.id','=', 5)
        //->get();

        //unoin join
        //$Query1 = DB::table('products')->where('products.price', '>',500);
        //$Query2=DB::table('products')->where('products.discount', '=',100);
        //$user = $Query1->union($Query2)->get();


        //basic where clause
        //$user = DB::table('products')
        //->where('products.price', '>', 500)
        //->where(function($query){
        //    $query->where('products.discount', '>', 13)

        //    ->orWhere('products.discount', '>', 100);
        //})
        //like for search results
        //->where('products.title', 'LIKE', '%h%' )
        //not like for search results
        //->where('products.title', 'NOt LIKE', '%ho%' )
        //->whereIn('products.price',[549,800])
        //->whereNotIn('products.price',[549,800])
        //->get();

        //where & orwhere methode

        //$user = DB::table('products')
        //->where('products.price', '>', 100)
        //->orWhere('products.price', '<', 500)
        //->join('categories','products.category_id', '=', 'categories.id' )
        //->select('price','categories.categoryName')
        //->get();
        //where between methode
        //$user = DB::table('products')
        //->whereBetween('products.price',[400,1000])
        //->join('categories','products.category_id', '=', 'categories.id' )
        //->select('price','categories.categoryName')
        //->get();
        ////where not between methode
        //$user = DB::table('products')
        //->whereNotBetween('products.price',[400,1000])
        //->join('categories','products.category_id', '=', 'categories.id' )
        //->select('price','categories.categoryName')
        //->get();

        //where in methode
        //$user = DB::table('products')
        //    ->whereIn('products.price', [549, 1249])
        //    ->join('categories', 'products.category_id', '=', 'categories.id')
        //    ->join('brands','products.brand_id', '=', 'brands.id')
        //    ->select('price', 'categories.categoryName','brands.brandName')
        //    ->get();

        //where not in methode
        //$user = DB::table('products')
        //    ->whereNotIn('products.price', [549, 1249])
        //    ->join('categories', 'products.category_id', '=', 'categories.id')
        //    ->join('brands','products.brand_id', '=', 'brands.id')
        //    ->select('price', 'categories.categoryName','brands.brandName')
        //    ->get();

        //where date, month, year methode
        //$user = DB::table('products')
        //    //->whereDate('products.created_at', '2024-02-05')
        //    //->whereMonth('products.created_at', '02')
        //    ->whereYear('products.created_at', '2024')
        //    ->join('categories', 'products.category_id', '=', 'categories.id')
        //    ->join('brands', 'products.brand_id', '=', 'brands.id')
        //    ->select('products.price', 'products.created_at', 'categories.categoryName', 'brands.brandName')
        //    ->get();

        //where colume methode
        //$user = DB::table('products')           
        //    ->whereColumn ('products.price','<', 'products.discount')
        //    ->join('categories', 'products.category_id', '=', 'categories.id')
        //    ->join('brands', 'products.brand_id', '=', 'brands.id')
        //    ->select('products.price',  'products.discount','categories.categoryName', 'brands.brandName')
        //    ->get();


        //orderby methode
        //$user = DB::table('products')
        //->join('categories', 'products.category_id', '=', 'categories.id')
        //->join('brands', 'products.brand_id', '=', 'brands.id')
        //->select('products.*', 'categories.categoryName', 'brands.brandName')
        //->orderBy('products.title', 'asc')
        //->get();

        //random order methode
        //$user = DB::table('products')
        //->join('categories', 'products.category_id', '=', 'categories.id')
        //->join('brands', 'products.brand_id', '=', 'brands.id')
        //->select('products.*', 'categories.categoryName', 'brands.brandName')
        //->inRandomOrder()
        //->first();

        //skip methode
        //$user = DB::table('products')
        //->skip(2)
        //->take(5) 
        //->join('categories', 'products.category_id', '=', 'categories.id')
        //->join('brands', 'products.brand_id', '=', 'brands.id')
        //->select('products.*', 'categories.categoryName', 'brands.brandName')
        //->get();
        //$user = DB::table('products')
        //    //->skip(2)
        //    //->offset(2)
        //    ->join('categories', 'products.category_id', '=', 'categories.id')
        //    ->join('brands', 'products.brand_id', '=', 'brands.id')
        //    ->select('products.*', 'categories.categoryName', 'brands.brandName')
        //    ->skip(2)
        //    ->take(PHP_INT_MAX)
        //    ->get();

        //group by methode
        $user = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
           ->groupBy('categories.id')
            ->first();

        return $user;
    }

    public function incriment(Request $request){
        $result = DB::table('products')
            ->where('id', '=', $request->id)
            ->increment('price', 5);
            //->get();
        
    }


    
}
