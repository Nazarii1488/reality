@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    <h3>All Article</h3>
                </div>
                <div class="float-left">
                    Find <b>{{$articles->total()}}</b> rows, page <b>{{$articles->currentPage()}} / {{$articles->lastPage()}}</b>
                </div>
                <div class="float-right">
                    {!! $articles->links(); !!}
                </div>
                <table class="table table-center table-brd a-color">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">title</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td class="text-right">
                                <a href="{{route('admin-article-edit',$article)}}" class="btn btn-sm btn-warning">edit</a>
                                <a href="{{route('admin-article-delete',$article)}}" class="btn btn-sm btn-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {!! $articles->links(); !!}
                </div>
            </div>
        </div>
    </div>
@stop
