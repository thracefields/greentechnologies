<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class PagesController extends Controller
{
    public function getSearch(Request $request)
    {
        $this->validate($request, [
            'data' => 'required'
        ]);
        $data = $request->data;
        $articles = Article::where('name', 'LIKE', '%' . $data . '%')->paginate(10);
        return view('articles.search')->withArticles($articles);
    }

}
