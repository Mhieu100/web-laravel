<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Frontend\Product\View;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $categories = Category::where('status', '0')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        $newArrivalProducts = Product::latest()->take(16)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->get();
        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalProducts', 'featuredProducts', 'categories'));
    }

    public function shop()
    {
        $products = Product::orderBy('id','DESC')->paginate(18);
        $categories = Category::where('status', '0')->get();
        return view('frontend.shop.index' ,compact('products', 'categories'));
    }

    public function searchProducts(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(2);
            $search = $request->search;
            return view('frontend.search.index', compact('searchProducts', 'search'));
        } else {
            return redirect()->back();
        }
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function collections()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function products($category_slug)
    {
        $category = Category::where('name', $category_slug)->first();

        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('name', $category_slug)->first();

        if ($category) {
            $product = $category->products()->where('name', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');
    }
}