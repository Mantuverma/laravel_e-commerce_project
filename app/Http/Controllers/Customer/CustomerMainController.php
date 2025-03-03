<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerMainController extends Controller
{
    public function profile()
    {
        return view('customer.profile');
    }

    public function history()
    {
        return view('customer.history');
    }

    public function payment()
    {
        return view('customer.payment');
    }

    public function affilated()
    {
        return view('customer.affilated');
    }



}