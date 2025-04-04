<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('welcome')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('photos/', $name, 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post muvaffaqiyatli yaratildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post topilmadi.');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('photos/', $name, 'public');
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('posts.index')->with('success','Post muvaffaqiyatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post topilmadi.');
        }

        if($post->photo && Storage::exists('public/' . $post->photo)) {
           Storage::delete($post->photo);
           unlink(public_path('app/public',$post->photo));
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post muvaffaqiyatli o`chirildi.');
    }
}
