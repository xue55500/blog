<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student extends Controller
{
    public function ass()
    {
        $post = request()->all();
        dd($post);
    }
}