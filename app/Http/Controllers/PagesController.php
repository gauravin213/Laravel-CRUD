<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;


class PagesController extends Controller
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Show the requested page
    public function show(Page $page)
    {

    	die('@@');
        //return view('pages', compact('page'));
    }
}
