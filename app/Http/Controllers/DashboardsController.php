<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Commission;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardsController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
}
