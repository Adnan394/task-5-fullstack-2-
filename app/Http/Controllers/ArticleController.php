<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('home', [
            'data' => $data,
            'title' => 'Data Article',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('Article.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'Required',
            'content' =>'required',
            'image' => 'image|file|max:2048',
            'category_id' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['image'] = $request->file('image')->store('data-img-articles');
        $save = Article::create($data);
        if($save) {
            return redirect()->route('article.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::where('id', $id)->first();
        return view('Article.detail', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Article::where('id', $id)->first();
        $category = Category::all();
        return view('Article.edit', [
            'data' => $data,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'Required',
            'content' =>'required',
            'image' => 'image|file|max:2048',
            'category_id' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['image'] = $request->file('image')->store('data-img-articles');
        $save = Article::where('id', $id)->update($data);

        if($save) {
            return redirect()->route('article.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect()->route('article.index');
    }
}