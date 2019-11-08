@extends('layouts.main')
@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="{{route('offers-add')}}" class="btn btn-primary my-2">Add Offer</a>
                </p>
            </div>
        </section>
        @include('layouts.flashMessage')

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        {!! $offers->links(); !!}
                    </div>
                </div>

                <div class="row">

                    @foreach($offers as $offer)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">

                                <img src="{{asset($offer->preview())}}" height="225" width="100%">
                                <div class="card-body">
                                    <p class="card-text">Title: {{$offer->title}}</p>
                                    <p class="card-text">Price: {{$offer->price}} $</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('offers-view', $offer->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                            @if(Auth::user() && Auth::user()->id == $offer->user_id)
                                            <a href="{{route('offers-edit', $offer->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <a href="{{route('offers-delete', $offer->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                            @endif
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="float-left">
                    {!! $offers->links(); !!}
                </div>
            </div>
        </div>
    </main>
@stop
