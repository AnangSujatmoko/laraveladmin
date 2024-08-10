<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the first content record or handle the case where no content is found
        $content = Content::first();

        // Optionally, you could add a fallback or default value
        if (!$content) {
            $content = (object) [
                'title' => 'Default Title',
                'image' => 'default.jpg', // Ensure this default image exists
                'body' => 'Default content body'
            ];
        }

        $menus = \App\Models\Menu::all(); // Assuming you have a Menu model for the menus

        return view('welcome', compact('content', 'menus'));
    }
}
