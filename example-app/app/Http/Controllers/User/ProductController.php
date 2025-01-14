<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\banners;
use App\Models\blogs;
use App\Models\categories;
use App\Models\feed_back;
use App\Models\manufacturers;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show(){
        $feed_back= feed_back::all();
        $products = products::all();
        $categories = categories::all();
        // $blogs = blogs::all();
        $manufacturers = manufacturers::all();
        // $banner_main = banners::where('type', 1)->get();
        // $banner_minor = banners::where('type', 0)->get();

        $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title',DB::raw('COUNT(products.id) as count') ,DB::raw('AVG(feed_back.star) as star'), DB::raw('MAX(products.created_at) as created_at'))
            ->groupBy('products.id','products.title')
            ->orderBy('count' ,'DESC' )
            ->orderBy('star', 'DESC')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('user.layouts.home',[
            'feed_back' => $feed_back,
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            // 'banner_main' => $banner_main,
            // 'banner_minor' => $banner_minor,
            // 'blogs' => $blogs,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function phone(Request $request)
    {
        $query = products::query();

        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }

        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }

        $products = $query->get();
        $categories = categories::where('id', 'like', '%1%')->get();
        $manufacturers = manufacturers::where('category_id', 'like', '%1%')->get();
        $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
            ->groupBy('products.id', 'products.title')
            ->get();

        return view('user.page.product.another_phone',[
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function phone_apple(Request $request)
    {
        $query = products::query();
        $title = $request->input('title');
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
            Session::put('title', $title);
        } else {
            Session::put('title', '');
        }

        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }
        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }
        $products = $query->get();

        $categories = categories::where('id', 'like', '%1%')->get();
        $manufacturers = DB::table('manufacturers')
            ->where('category_id', 'like', '%1%')
            ->where('manufacturers.name', 'like', '%apple%')
            ->get();
        $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
            ->groupBy('products.id', 'products.title')
            ->get();
        return view('user.page.product.phone.phone_apple', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function phone_samsung(Request $request)
    {
        $query = products::query();
        $title = $request->input('title');
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
            Session::put('title', $title);
        } else {
            Session::put('title', '');
        }

        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }

        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }
        $products = $query->get();
        $categories = categories::where('id', 'like', '%1%')->get();
        $manufacturers = DB::table('manufacturers')
            ->where('category_id', 'like', '%1%')
            ->where('manufacturers.name', 'like', '%samsung%')
            ->get();
            $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
            ->groupBy('products.id', 'products.title')
            ->get();

        return view('user.page.product.phone.phone_samsung', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function phone_google(Request $request)
    {
        $query = products::query();
        $title = $request->input('title');
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
            Session::put('title', $title);
        } else {
            Session::put('title', '');
        }

        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }

        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }
        $products = $query->get();
        $categories = categories::where('id', 'like', '%1%')->get();
        $manufacturers = DB::table('manufacturers')
            ->where('category_id', 'like', '%1%')
            ->where('manufacturers.name', 'like', '%google%')
            ->get();
        $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
            ->groupBy('products.id', 'products.title')
            ->get();
        return view('user.page.product.phone.phone_google', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function phone_xiaomi(Request $request)
    {
        $query = products::query();
        $title = $request->input('title');
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
            Session::put('title', $title);
        } else {
            Session::put('title', '');
        }

        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }

        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }

        $products = $query->get();
        $categories = categories::where('id', 'like', '%1%')->get();
        $manufacturers = DB::table('manufacturers')
            ->where('category_id', 'like', '%1%')
            ->where('manufacturers.name', 'like', '%xiaomi%')
            ->get();
        $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
            ->groupBy('products.id', 'products.title')
            ->get();
        return view('user.page.product.phone.phone_xiaomi', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function phone_asus(Request $request)
    {
        $query = products::query();
        $title = $request->input('title');
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
            Session::put('title', $title);
        } else {
            Session::put('title', '');
        }

        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }

        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }
        $products = $query->get();
        $categories = categories::where('id', 'like', '%1%')->get();
        $manufacturers = DB::table('manufacturers')
            ->where('category_id', 'like', '%1%')
            ->where('manufacturers.name', 'like', '%asus%')
            ->get();
        $feed_back_products = DB::table('products')
            ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
            ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
            ->groupBy('products.id', 'products.title')
            ->get();
        return view('user.page.product.phone.phone_asus', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
    public function tablet(Request $request)
    {
        $query = products::query();
        $memory = $request->input('memory');
        if ($memory) {
            $query->where('memory', 'like', '%' . $memory . '%');
            Session::put('memory', $memory);
        } else {
            Session::put('memory', '');
        }

        $min_price = $request->input('min_price', 0);
        $max_price = $request->input('max_price', 999999999);
        if ($min_price and $max_price) {
            $query->whereBetween('discount', [$min_price, $max_price]);
            Session::put('min_price', $min_price);
            Session::put('max_price', $max_price);
        } else {
            Session::put('min_price', '');
            Session::put('max_price', '');
        }

        $sort = $request->input('sort');
        if ($sort) {
            $query->orderBy('discount', $sort);
            Session::put('sort', $sort);
        } else {
            Session::put('sort', '');
        }
        $products = $query->get();
        $categories = categories::where('id', 'like', '%2%')->get();
        $manufacturers = manufacturers::where('category_id', 'like', '%2%')->get();
        $feed_back_products = DB::table('products')
        ->join('feed_back', 'products.id', '=', 'feed_back.product_id')
        ->select('products.id as id', 'products.title as title', DB::raw('COUNT(products.id) as count'), DB::raw('AVG(feed_back.star) as star'))
        ->groupBy('products.id', 'products.title')
        ->get();
        return view('user.page.product.tablet',[
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'feed_back_products' => $feed_back_products,
        ]);
    }
}
