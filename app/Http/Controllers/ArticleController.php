<?php


namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ImageArticle;
use App\Models\ImageOffer;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(10);
        return view('article.index', compact('articles'));
    }

    public function add()
    {
        return view('article/add');
    }

    public function addSubmit(ArticleRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $article = new Article();
        $article->title = $title;
        $article->description = $description;
        $article->user_id = Auth::user()->id;
        $article->save();
        if($request->isMethod('post')){
            if($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = 'public/articles/' . $article->id;
                    if(!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $file->move(storage_path("app/$path"), $name);
                    $articleImages = new ImageArticle();
                    $articleImages->article_id = $article->id;
                    $articleImages->name = $name;
                    $articleImages->save();
                }
            }
        }

        session()->flash('success', 'article #'.$article->id.'succes added' );

        return redirect()->route('article');
    }

    public function edit(Article $article)
    {
       return view('article/edit', compact('article'));
    }
    public  function editSubmit(Request $request, Article $article)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $article -> title = $title;
        $article -> description = $description;
        $article -> save();

        return redirect()->route('article');
    }
    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('article');
    }
}
