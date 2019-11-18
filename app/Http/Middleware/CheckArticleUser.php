<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckArticleUser
{
    public function handle($request, Closure $next)
    {

        $article = $request->route()->parameter('article');

        if (Auth::user()->id == $article->user_id) {
            return $next($request);
        }
        return redirect()->route('index');
    }
}
