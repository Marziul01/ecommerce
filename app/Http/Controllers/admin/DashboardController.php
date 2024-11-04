<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use App\Notifications\NewContactNotification;
use App\Notifications\ProductQtyNotification;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function index(){

        $orders = Order::all();
        $users = User::where('role', 1)->count();
        $products = Product::where('status', 1)->count();
        $inactiveproducts = Product::where('status', 2)->count();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Calculate the start and end dates of the current month
        $startDate = Carbon::create($currentYear, $currentMonth, 1)->startOfDay();
        $endDate = $startDate->copy()->endOfMonth();

        // Query the database to get the total earnings
        $monthlyEarnings = Order::where('status', 4)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('grand_total');

        $monthlyEarningsData = [];

        $alltotalearning = Order::where('status', 4)->sum('grand_total');

        // Loop through each month of the current year
        for ($month = 1; $month <= $currentMonth; $month++) {
            // Calculate the start and end dates of the current month
            $startDate = Carbon::create($currentYear, $month, 1)->startOfDay();
            $endDate = $startDate->copy()->endOfMonth();

            // Query the database to get the total earnings for the current month
            $monthlyEarnings = Order::where('status', 4)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('grand_total');

            // Store the monthly earnings data in the array
            $monthlyEarningsData[] = $monthlyEarnings;
        }

        $subCategoryCounts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select('sub_categories.name as sub_category_name', DB::raw('count(*) as order_count'))
            ->groupBy('sub_categories.name')
            ->get();

        // Extracting category names and order counts
        $subCategoryNames = $subCategoryCounts->pluck('sub_category_name')->toArray();
        $orderCounts = $subCategoryCounts->pluck('order_count')->toArray();

        $admin = User::where('role', 0)->first();
        $trackingProducts = Product::where('track_qty', 'YES')->where('status', 1)->get();

        if ($trackingProducts->isNotEmpty()) {
            foreach ($trackingProducts as $trackingProduct) {
                if ($trackingProduct->qty <= 5) {
                    // Check if notification already sent for this product
                    $notificationExists = DB::table('notifications')
                        ->where('type', 'App\Notifications\ProductQtyNotification')
                        ->where('data', 'like', '%"name":"' . $trackingProduct->name . '"%')
                        ->exists();

                    // If notification not sent for this product, send notification
                    if (!$notificationExists) {
                        Notification::send($admin, new ProductQtyNotification($trackingProduct));
                    }
                }
            }
        }

        $notifications = DB::table('notifications')->where('read_at', NULL)->get();
        $totalNotification = $notifications->count();

        return view('admin.dashboard.dashboard',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first(),
            'orders' => $orders,
            'users' => $users,
            'products' => $products,
            'monthlyEarnings' => $monthlyEarnings,
            'monthlyEarningsData' => $monthlyEarningsData,
            'subCategoryNames' => $subCategoryNames,
            'orderCounts' => $orderCounts,
            'notifications' => $notifications,
            'totalNotification' => $totalNotification,
            'alltotalearning' => $alltotalearning,
            'inactiveproducts' => $inactiveproducts,
        ]);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

    public static function notificationRead($id){
       $notification = DB::table('notifications')->where('id', $id)->first();
       if ($notification != Null){
           DB::table('notifications')
               ->where('id', $id)
               ->update(['read_at' => Carbon::now()]);

            if ($notification->type == 'App\Notifications\ProductQtyNotification'){
                return redirect(route('product.index'));
            }elseif ($notification->type == 'App\Notifications\NewOrderNotification'){
                return redirect(route('ordersPending'));
            }elseif ($notification->type == 'App\Notifications\NewUserNotification'){
                return redirect(route('users.index'));
            }elseif ($notification->type == 'App\Notifications\NewReviewNotfication'){
                return redirect(route('reviews'));
            }
            else{
                return back();
            }

        }else{
           return back();
       }
    }

    public function markAllAsRead(Request $request) {
        DB::table('notifications')->where('type', 'App\Notifications\NewContactNotification')->update(['read_at' => now()]);
        return response()->json(['success' => true]);
    }

}
