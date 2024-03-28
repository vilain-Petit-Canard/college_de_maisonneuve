<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $articles = Article::latest()->get();
        // $articles = Article::all();
        $articles = Article::latest()->get();
        // $users = Etudiant::all();
        // $usersAndArticles = array_merge($articles, $users);
        // $usersAndArticles = (object) array_merge((array) $articles, (array) $users);
        //  return Article::latest()->get();
        return view('article.index', ["articles" => $articles]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:191',
            'contenu' => 'required|string',
        ]);
        // return $article;
        // $etudiant = Etudiant::find($article->user_id);
        // return Auth::user()->id;
        $article = Article::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'langue' => 'fr',
            'user_id' =>  Auth::id(), //sais pas si ca va marcher
        ]);

        return  redirect()->route('article.show', $article->id)->with('success', 'article created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $user = User::find($article->user_id);
        return view('article.show', ['article' => $article, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $user = User::find($article->user_id);
        return view('article.edit', ['article' => $article, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre' => 'required|max:191',
            'contenu' => 'required|string',
        ]);

        $article->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('article.show', $article->id)->with('success', 'Article updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
       $article->delete();
       return redirect()->route('article.index')->with('success', 'Article deleted successfully.');

        
    }
}
