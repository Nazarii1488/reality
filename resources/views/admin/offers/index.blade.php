@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    <h3>All Offers</h3>
                </div>
                <div class="float-left">
                    Find <b>{{$offers->total()}}</b> rows, page <b>{{$offers->currentPage()}} / {{$offers->lastPage()}}</b>
                </div>
                <div class="float-right">
                    {!! $offers->links(); !!}
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
                    @foreach($offers as $offer)
                        <tr>
                            <td>{{$offer->id}}</td>
                            <td>{{$offer->title}}</td>
                            <td class="text-right">
                                <a href="{{route('admin-offers-edit',$offer)}}" class="btn btn-sm btn-warning">edit</a>
                                <a href="{{route('admin-offers-delete',$offer)}}" class="btn btn-sm btn-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {!! $offers->links(); !!}
                </div>
            </div>
        </div>
    </div>
@stop
