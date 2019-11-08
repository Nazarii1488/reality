@extends('layouts.main')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="{{route('article-add')}}" class="btn btn-primary my-2">Add Article</a>
            </p>
        </div>
    </section>
    @include('layouts.flashMessage')

    <section role="main" class="container">
    <div class="row">
            <div class="col-md-8 offset-md-2 blog-main">
               <h3 class="pb-4 mb-4 font-italic border-bottom">
                From the Firehose
                </h3>
                @foreach($articles as $article)
                     <div class="blog-post">
                         <h2 class="blog-post-title">{{$article->title}}</h2>
                             <p class="blog-post-meta"> <a href={{route('article-add',$article->id)}}></a></p>
                             <p>{{$article->description}}</p>
                          <div class="btn-group">
                             <a href="{{route('article-edit', $article->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                              <a href="{{route('article-delete', $article->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                          </div>
                         </div><!-- /.blog-post -->
                @endforeach
            </div>
        <div class="float-left">
            {!! $articles->links(); !!}
        </div>
    </div><!-- /.blog-main -->

        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</section><!-- /.container -->
@stop
