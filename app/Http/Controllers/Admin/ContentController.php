<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function edit()
    {
        validate_permission('content.update');

        $content = Content::first();
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request)
    {
        validate_permission('content.update');

        $content = Content::first();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $content->image = $imagePath;
        }

        $content->title = $request->input('title');
        $content->body = $request->input('body');
        $content->save();

        return redirect()->back()->with('success', 'Content updated successfully!');
    }
}
