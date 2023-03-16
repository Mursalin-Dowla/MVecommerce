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
                        <h5 class="mb-0 text-info">Add New Category</h5>
                    </div>
                    <hr/>
                    <form action="{{route('store.category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <label for="cat_name" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="cat_name" class="form-control" id="cat_name" placeholder="Enter Category Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cat_image" class="col-sm-3 col-form-label">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="cat_image" class="form-control" id="cat_image">
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

