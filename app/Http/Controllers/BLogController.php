<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BLogController extends Controller
{
    //
    public function bloglist(){
        return view('blog.index');
    }
}
