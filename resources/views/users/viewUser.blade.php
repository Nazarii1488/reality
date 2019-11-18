@extends('layouts.main')
@section('content')
    <main role="main" class="container">
        <div class="row">
            <aside class="col-md-4 blog-sidebar card pt-3">
                <div class="text-center">
                    <img class="rounded-circle" src="{{asset('/images/user-thumb-lg.png')}}" alt="Generic placeholder image" width="140" height="140">
                    <h2>User</h2>
                </div>
                <div class="modal-body text-left">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">First Name: <b>{{$user->name}}</b></li>
                        <li class="list-group-item">Last Name: <b></b></li>
                        <li class="list-group-item">Email: <b>{{$user->email}}</b></li>
                        <li class="list-group-item">Phone: <b></b></li>
                    </ul>
                </div>

            </aside>
            <div class="col-md-8 blog-main">
                <div class="card">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#articles" role="tab" aria-controls="nav-profile" aria-selected="false">Articles</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="offers" role="tabpanel" aria-labelledby="home-tab">
                            <div class="album py-5 bg-light">
                                <div class="container">
                                    <div class="row">
                                        @foreach($user->offers as $offer)
                                            <div class="col-md-6">
                                                <div class="card mb-4 shadow-sm">
                                                    <img src="{{asset($offer->preview())}}" height="225" width="100%">
                                                    <div class="card-body">
                                                        <p class="card-text">Id: {{$offer->id}}</p>
                                                        <p class="card-text">Title: {{$offer->title}}</p>
                                                        <p class="card-text">Price: {{$offer->price}} $</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a href="{{route('offers-view',$offer->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                                                <a href="{{route('offers-edit',$offer->id)}}" class="btn btn-sm btn-outline-warning">Edit</a>
                                                                <a href="{{route('offers-delete',$offer->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                                            </div>
                                                            <small class="text-muted">9 mins</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="articles" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                @foreach($user->article as $article)
                                <div class="col-md-10 offset-md-1 blog-main">
                                    <div class="blog-post">
                                            <h2 class="blog-post-title">{{$article->title}}</h2>
                                            <p class="blog-post-meta"> <a href={{route('article-add',$article->id)}}></a></p>
                                            <p>{{$article->description}}</p>
                                        <div class="btn-group">
                                            <a href="{{route('article-edit', $article->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <a href="{{route('article-delete', $article->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
