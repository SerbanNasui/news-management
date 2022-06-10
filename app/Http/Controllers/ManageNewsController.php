<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageNewsController extends Controller
{

    public function index(){
        return view('back-office.manage-news.index');
    }
}
