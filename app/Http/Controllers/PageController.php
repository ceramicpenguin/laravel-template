<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return Factory|View
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * @return Factory|View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * @return Factory|View
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
