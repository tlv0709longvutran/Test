<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class HomeController extends Controller
{
    public function index() {
        $title  = "Học lập trình web tại unicode";
        $content = 'Học Lập trình PHP - Lavarel tại Unicode';
            //compact('title' , 'content')
       // return view('home')->with(['title'=>$title , 'content'=>$content]);

       return View::make('home',compact('title' , 'content'));

       //$contentView = view('home')->render();
       //dd($contentView);
       //echo $contentView;
    }

    public function getProductDetail($id){
        return view('Client.Food.detail' , compact('id'));
    }
}
