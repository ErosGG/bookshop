<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function index()
    {
        dd(Str::uuid()->toString());
        return view('admin.dashboard.index');
    }
}
