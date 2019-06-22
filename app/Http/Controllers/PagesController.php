<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to Laravel';
        // return view('pages/index', compact('title'));
        return view('pages/index')->with('title', $title);
    }

    public function about() {
        $title = 'This is the about page';
        return view('pages/about')->with('title', $title);
    }

    public function services() { # can pass in array for template to use
        $data = [
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        ];
        return view('pages/services')->with($data);
    }

}

