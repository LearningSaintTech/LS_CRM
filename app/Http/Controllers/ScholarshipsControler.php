<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScholarshipsControler extends Controller
{
    public function scholarshipslist(){
        return view('scholar_ships.index');
    }
}
