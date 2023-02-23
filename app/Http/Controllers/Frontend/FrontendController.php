<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\ArrayList;
use PHPUnit\Framework\Constraint\Count;

class FrontendController extends Controller
{
    public function index()
    {
        // $featured_products = Product::where('trending', '1')->paginate(8);

        $featured_products = Product::where('trending', '1')
        ->leftjoin('ratings', 'products.id', '=', 'ratings.prod_id')
        ->orderBy('products.id')
        ->paginate(8);
        $products = array();
        $idProduct = '';
        $product = null;
        $count = 1;
        $index = 0;
        foreach ($featured_products as $prod) {
            // nếu trường hợp chạy về id ở vòng lặp trước khác với id ở vòng lặp hiện tại
            if (!empty($idProduct) && $idProduct != $prod->id) {
                if (!empty($product)) {
                    $product -> rating_SVG = $product -> rating_SVG/$count;
                    if (empty($product -> rating_SVG) || $product -> rating_SVG == 0) {
                        $product -> count = 0;
                    } else {
                        $product -> count = $count;
                    }

                }
                array_push($products, $product);
                $product = $prod;

                $product -> rating_SVG = $prod-> stars_rated;
                $count = 1;
            } else {
            //#1 ở vòng for dầu tiên vì nó empty nên sẽ nhảy về đây đầu tiên
                if (empty($product)) {
                    $product = $prod;
                    $product -> rating_SVG = $prod-> stars_rated;
                } else {

                    $prod -> rating_SVG = $product->rating_SVG + $prod->stars_rated;
                    $product = $prod;
                    $count++;
                }

            }
            //#2 lúc này $idProduct = 1
            $idProduct = $prod->id;
        }
        array_push($products, $product);
        // dd($products);

        $categories = Category::all();

        foreach ($featured_products as $prod) {

            $ratings = Rating::where('prod_id', $prod->id)->get();
            $rating_sum = Rating::where('prod_id', $prod->id)->sum('stars_rated');
            if ($ratings->count() != 0) {
                $prod->rating_SVG = $rating_sum/$ratings->count();
            } else {
                $prod->rating_SVG = 0;
            }
            $prod->prod_rating = $ratings->count();
        }


        foreach ($categories as $category) {
            $product_count = Product::where('cate_id', $category->id)->get()->count();
            $category->cout_product = $product_count;
        }

        return view('frontend.index', compact('featured_products', 'categories'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists())
        {
            $categories = Category::all();
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status','0')->get();

            return view('frontend.products.index', compact('category','products', 'categories'));
        }else {
            return redirect('/')->with('status',"Slug doesnot exists");
        }
    }

    public function productview($prod_slug)
    {
        if (Product::where('slug', $prod_slug)->exists())
        {
            $categories = Category::all();
            $product = Product::all();
            $products = Product::where('slug', $prod_slug)->first();
            $ratings = Rating::where('prod_id', $products->id)->get();
            $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
            $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
            if ($ratings->count() > 0) {

                $rating_value = $rating_sum/$ratings->count();
            }else{
                $rating_value = 0;
            }
            return view('frontend.products.view', compact('products', 'categories', 'product', 'ratings', 'rating_value', 'user_rating'));
        }else{
            return redirect('/')->with('status', 'Liên kết đã bị hỏng');
        }
    }


    public function searchProduct(Request $request)
    {
        if ($request->search) {
            $categories = Category::all();
            $searchProduct = Product::where("name","LIKE","%$request->search%")->latest()->paginate(8);
            foreach ($searchProduct as $prod) {

                $ratings = Rating::where('prod_id', $prod->id)->get();
                $rating_sum = Rating::where('prod_id', $prod->id)->sum('stars_rated');
                if ($ratings->count() != 0) {
                    $prod->rating_SVG = $rating_sum/$ratings->count();
                } else {
                    $prod->rating_SVG = 0;
                }
                $prod->prod_rating = $ratings->count();
            }
            return view('frontend.products.search', compact('searchProduct','categories'));
        }else{
            return redirect()->back()->with('message','Empty Search');
        }

    }
}
