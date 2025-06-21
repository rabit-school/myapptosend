<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        // Text search filter
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        // Dropdown index filter
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        // Date range filter
        if ($from = $request->input('from_date')) {
            $query->whereDate('created_at', '>=', Carbon::parse($from));
        }
        if ($to = $request->input('to_date')) {
            $query->whereDate('created_at', '<=', Carbon::parse($to));
        }

        // Pagination
        $posts = $query->latest()->paginate(10)->appends($request->query());

        return view('posts.index', compact('posts'));
    }
}
