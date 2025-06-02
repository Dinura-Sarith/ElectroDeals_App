<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home() {
        return view('pages.admin');
    }

    public function category() {
        return view('pages.category.category');
    }

    public function product() {
        return view('pages.product.product');
    }
}