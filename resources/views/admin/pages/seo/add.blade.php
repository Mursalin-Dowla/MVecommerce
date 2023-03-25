@extends('admin.master')
@section('admin')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <hr/>
        <div class="card border-top border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Add SEO Information</h5>
                    </div>
                    <hr/>
                    <form action="{{route('store.seo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-form-label">Site Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Category Name">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-3 col-form-label">Meta Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="description" cols="10" rows="10"></textarea>
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keyword" class="col-sm-3 col-form-label">Meta Keywords</label>
                        <div class="col-sm-9">
                            <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Enter Category Name">
                            @error('keyword')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="author" class="col-sm-3 col-form-label">Author</label>
                        <div class="col-sm-9">
                            <input type="text" name="author" class="form-control" id="author" placeholder="Enter Category Name">
                            @error('author')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="favicon" class="col-sm-3 col-form-label">Fav Icon</label>
                        <div class="col-sm-9">
                            <input type="file" name="favicon" class="form-control" id="favicon">
                            @error('favicon')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="logo" class="col-sm-3 col-form-label">Site Logo</label>
                        <div class="col-sm-9">
                            <input type="file" name="logo" class="form-control" id="logo">
                            @error('logo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Add</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

