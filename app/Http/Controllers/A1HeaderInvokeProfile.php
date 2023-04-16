<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class A1HeaderInvokeProfile
{
    use AuthorizesRequests, ValidatesRequests;


    public function index()
    {
        return view('profile.show');
    }
}
