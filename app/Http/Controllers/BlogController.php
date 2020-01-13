<?php

namespace App\Http\Controllers;

use App\blog\Blog;
use Faker\ValidGenerator;
use Illuminate\Http\Request;
use App\models\category\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category:id,name')->latest()->paginate(5);
        return view('blogs.index', compact('blogs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('blogs.create', compact('categorys')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:10|max:100',
            'desc' => 'required',
            'slug' => 'required|min:10|max:100|alpha_dash|unique:blogs,slug',
        ]);

        $cat = Category::find($request->category);
        $cat->blogs()->create($request->except('category'));

        // $cat->blogs()->create([
        //     'title' => $request->title,
        //     'desc' => $request->desc,
        //     'slug' => $request->slug
        // ]);
           
        // Blog::create([
        //     'category_id' => $request->category,
        //     'title' => $request->title,
        //     'desc' => $request->desc,
        //     'slug' => $request->slug
        //  ]);
        return redirect()->route('blog.index')->with('success', 'Blog created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
        return view('blogs.show', compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $blog->update($request->all());
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blogs deleted successfully');
    }
}
