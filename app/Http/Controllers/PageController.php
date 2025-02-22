<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function search()
    {
        return view('page.search');
    }

    public function explore()
    {
        return view('page.explore');
    }

    public function myLibrary()
    {
        return view('page.my-library');
    }

    public function borrowing()
    {
       
    }
}