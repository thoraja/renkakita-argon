<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User\Role;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Carbon;
use App\Models\Product\Product;
use App\Models\User\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show(Request $request, UserService $userService)
    {
        $companies = Auth::user()->role->companies;
        foreach ($companies as $company) {
            $data[$company->id]['company_name'] = $company->name;
            $data[$company->id]['product_count'] = Product::where('company_id', $company->id)->count();
            $data[$company->id]['distributor_count'] = $company->roles->whereIn('id', Role::DISTRIBUTORS)->count();
            $data[$company->id]['order_count'] = Order::whereIn('user_id', $company->roles()->with('users')->get()->pluck('users')->flatten()->pluck('id'))->count();
        }
        return view('admin.dashboard', compact('data'));
    }
}
