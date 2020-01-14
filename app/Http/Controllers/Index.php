<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public function admin(){
        $post = request()->all();
        dd($post);
    }
    public function  goods($id ,$name="hoodel"){
        echo $id;
        echo $name;
    }
    public  function ass($ass,$add=""){
        echo 'ass是'.$ass;
        echo 'add是'.$add;
    }
}
