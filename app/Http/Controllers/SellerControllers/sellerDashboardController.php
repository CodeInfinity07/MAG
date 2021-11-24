<?php

namespace App\Http\Controllers\SellerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sellerDashboardController extends Controller
{
    public function index()
    {
        return view('SellerViews.layouts.template');
    }
}
