<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ImageArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->paginate(9);
        return view('admin/article/index',compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('admin/article/edit',compact('article'));
    }

    public function editSubmit(Request $request, Article $article)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $article->title = $title;
        $article->description = $description;
        $article->save();

        if($request->isMethod('post')) {
            if($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = 'public/article/' . $article->id;
                    if(!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $file->move(storage_path("app/$path"), $name);
                    $articleImage = new ImageArticle();
                    $articleImage->offer_id = $article->id;
                    $articleImage->name = $name;
                    $articleImage->save();
                }
            }
        }

        session()->flash('warning', 'article #'.$article->id.' edited');
        return redirect()->route('admin-article');
    }

    public function delete(Article $article)
    {
        $directoryPath = 'public/article/'.$article->id;
        $article->delete();
        if(Storage::exists($directoryPath)) {
            Storage::deleteDirectory($directoryPath);
        }
        session()->flash('danger', 'article #'.$article->id.' removed');
        return redirect()->route('admin-article');
    }

    public function deleteImage(Article $article, ImageArticle $imageArticle)
    {
        $pathDir = 'app/public/article/'.$article->id.'/';
        $imgName = $imageArticle->name;

        $imageArticle->delete();

        if (is_file(storage_path($pathDir . $imgName))) {
            unlink(storage_path($pathDir . $imgName));
        }
        return redirect()->route('admin-article-edit',$article->id);
    }
}
