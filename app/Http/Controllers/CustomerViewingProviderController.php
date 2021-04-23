<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerViewingProviderController extends Controller
{
    public function index()
    {

        return view('profiles.customerviewingproviderpage');
    }
}
