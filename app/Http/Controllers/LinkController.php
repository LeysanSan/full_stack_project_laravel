<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkController extends Controller
{

    //
    public function index()
    {
        $links = Link::orderBy('created_at', 'desc')->paginate(10);
        return view('links.index', compact('links'));
    }
    public function create()
    {
        return view('links.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);
        $link = new Link();
        $link->original_url = $request->original_url;
        $link->slug = Str::random(6);
        $link->save();

        return redirect()->route('links.index');
    }
    public function redirect($slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();
        return redirect($link->original_url);
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link deleted successfully.');
    }
}
