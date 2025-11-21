<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    // List Short URLs
    public function index()
    {
        $user = auth()->user();

        if ($user->role->name === 'SuperAdmin') {
            $urls = ShortUrl::with('user', 'company')->get();
        } elseif ($user->role->name === 'Admin') {
            $urls = ShortUrl::where('company_id', $user->company_id)->with('user')->get();
        } else {
            $urls = ShortUrl::where('user_id', $user->id)->get();
        }

        return view('shorturls.index', compact('urls'));
    }

    // Show create form (middleware handles roles)
    public function create()
    {
        return view('shorturls.create');
    }

    // Store short URL (middleware ensures only Admin/Member)
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $user = auth()->user();

        $short_code = Str::random(6);

        ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code' => $short_code,
            'user_id' => $user->id,
            'company_id' => $user->company_id
        ]);

        return redirect()->route('shorturls.index')->with('success', 'Short URL created!');
    }

    // Public redirect
    public function redirect($shortCode)
    {
        $url = ShortUrl::where('short_code', $shortCode)->firstOrFail();
        return redirect()->to($url->original_url);
    }
}
