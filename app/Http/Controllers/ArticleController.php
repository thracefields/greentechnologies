<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Image;
use Storage;
use Purify;
use Auth;
use Carbon\Carbon;

use App\Article;
use App\Category;
use App\User;

class ArticleController extends Controller
{

    public function __construct() {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $articles = Article::orderBy('id', 'desc')->paginate(26);
        $categories = Category::all();

        return view('articles.index')
            ->withArticles($articles)
            ->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::paginate(15);
        $categories = Category::all();
        return view('articles.create')->withArticles($articles)
        ->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'description' => 'required',
            'featured_image' => 'nullable|image'
        ]);

        $article = new Article;

        $article->name = $request->name;
        $article->description = Purify::clean($request->description);
        $article->category_id = $request->category;

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/uploads/' . $filename);

            Image::make($image)->resize(600, 400)
            ->save($location);

            $article->image = $filename;
        } else {
            $article->image = 'no-image.png';
        }

        $article->save();

        Session::flash('success', 'Успешно добавихте нова статия.');

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        $minutes = 20;
        views($article)->delayInSession($minutes)->record();

        $approved = $article->comments()->paginate(10);

        return view('articles.show')->withArticle($article)->withApproved($approved);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $article = Article::findOrFail($id);
        return view('articles.edit')->withArticle($article)
        ->withCategories($categories);
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
        $this->validate($request, [
            'name' => 'required|max:60',
            'description' => 'required',
            'featured_image' => 'nullable|image'
        ]);

        $article = Article::find($id);
        $article->name = $request->input('name');
        $article->description = Purify::clean($request->input('description'));

        $article->category_id = $request->category;

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/uploads/' . $filename);

            Image::make($image)->resize(600, 400)
            ->save($location);

            $oldFilename = $article->image;
            $article->image = $filename;
            $condition = $oldFilename === 'no-image.png';
            if(!$condition) { 
                Storage::delete($oldFilename);
            }
        }
        $article->save();
        
        Session::flash('success', 'Промените са запазени.');

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->comments()->forceDelete();
        $article->views()->forceDelete();

        $filename = $article->image;
        $condition = $filename === 'no-image.png';
        if(!$condition) { 
            $location = public_path('images/uploads/' . $filename);
            Storage::delete($filename);
        }

        $article->delete();
        
        Session::flash('success', 'Успешно изтрихте статията.');
        return redirect()->route('articles.index');
    }

    public function admin() {
        $articles = Article::orderBy('id', 'desc')->paginate(6); 
        return view('articles.admin')->withArticles($articles);
    }
}