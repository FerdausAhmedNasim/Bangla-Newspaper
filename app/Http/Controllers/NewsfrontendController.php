<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsfrontendController extends Controller
{
    public  function index()
    {

        $newspapers = Newspaper::all();
        return view('forntend.index', compact('newspapers'));
    }
}
