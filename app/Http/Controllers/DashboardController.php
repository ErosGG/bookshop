<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;


class DashboardController extends Controller
{
    public function index(): View
    {
//        dd(Str::uuid()->toString());
        return view('admin.dashboard.index');
    }
}
