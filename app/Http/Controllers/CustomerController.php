<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home() {
        return view('customer.home');
    }

    public function mobile() {
        return view('customer.mobiles');
    }

    public function pc() {
        return view('customer.pcs');
    }
}
