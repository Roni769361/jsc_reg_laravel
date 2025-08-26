<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class basicController extends Controller
{
    public function basic()
    {
        return view('backend.Page.basic');
    }
}
