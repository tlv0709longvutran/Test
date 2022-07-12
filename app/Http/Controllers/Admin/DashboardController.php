<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        return 'Khởi động Dashboard';
    }

    public function index(){
        return '<h2>Dashboard Welcome</h2>';
    }
}
