<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory() {
        return view('addcategory');
    }

    public function store(Request $request) {
        
    }
}
