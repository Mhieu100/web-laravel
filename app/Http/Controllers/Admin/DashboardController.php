<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $date = new \DateTime();
        $totalProduct = Product::count();
        $totalBrand = Brand::count();
        $totalCategory = Category::count();
        $totalUser = User::where('role_as', '0')->count();
        $totalOrder = Order::count();
        // $today = Carbon::now()->format('d-m-Y');
        $thismonth = Carbon::now()->format('m');
        $thisyear = Carbon::now()->format('Y');
        $totalOrderToday = Order::whereDate('created_at', $date)->count();
        $totalOrderInMonth = Order::whereMonth('created_at', $thismonth)->count();
        $totalOrderInYear = Order::whereYear('created_at', $thisyear)->count();

        return view('admin.dashboard', compact('totalProduct', 'totalBrand', 'totalCategory', 'totalUser', 'totalOrder', 'totalOrderToday', 'totalOrderInMonth', 'totalOrderInYear'));
    }
}