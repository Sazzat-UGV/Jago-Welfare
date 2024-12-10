<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('browse-blog');
        $blogs = Blog::with('category')->latest('id')->paginate();
        return view('backend.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('add-blog');
        $categories = Category::latest('id')->get();
        return view('backend.pages.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('add-blog');

        $request->validate([
            'category' => 'required|numeric',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:10240',
        ]);

        $tagsString = '';
        if ($request->tags) {
            $tagsArray = json_decode($request->tags, true);
            $tags = array_map(function ($tag) {
                return $tag['value'];
            }, $tagsArray);
            $tagsString = implode(',', $tags);
        }

        $blog = Blog::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'tags' => $tagsString,
        ]);

        $this->image_upload($request, $blog->id);
        return redirect()->route('admin.blog.index')->with('success', 'Blog added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('read-blog');
        $blog = Blog::with('category')->findOrFail($id);
        return view('backend.pages.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('edit-blog');
        $categories = Category::latest('id')->get();
        $blog = Blog::with('category')->findOrFail($id);
        return view('backend.pages.blog.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('edit-blog');
        $blog = Blog::findOrFail($id);
        $request->validate([
            'category' => 'required|numeric',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'photo' => 'sometimes|image|mimes:png,jpg,jpeg|max:10240',
        ]);

        $tagsString = '';
        if ($request->tags) {
            $tagsArray = json_decode($request->tags, true);
            $tags = array_map(function ($tag) {
                return $tag['value'];
            }, $tagsArray);
            $tagsString = implode(',', $tags);
        }

        $blog->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'tags' => $tagsString,
        ]);

        $this->image_upload($request, $blog->id);
        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete-blog');
        $blog = Blog::findOrFail($id);
        if ($blog->photo != 'default_blog.png') {
            //delete old photo
            $photo_location = 'public/uploads/blog/';
            $old_photo_location = $photo_location . $blog->photo;
            unlink(base_path($old_photo_location));
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
    }

    public function image_upload($request, $blog_id)
    {
        $blog = Blog::findOrFail($blog_id);
        if ($request->hasFile('photo')) {
            if ($blog->photo != 'default_blog.png') {
                //delete old photo
                $photo_location = 'public/uploads/blog/';
                $old_photo_location = $photo_location . $blog->photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/blog/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $blog->update([
                'photo' => $new_photo_name,
            ]);
        }
    }
}
