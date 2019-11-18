@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-light">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h2>Add Article</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('articles-add-submit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" name="title" value="" class="form-control" />
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="images" class="col-mb-4 col-form-label text-md-right">Images</label>

                                <div class="col-mb-6">
                                    <input type="file" name="images[]" id="images" multiple />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" name="description" class="form-control" ></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
