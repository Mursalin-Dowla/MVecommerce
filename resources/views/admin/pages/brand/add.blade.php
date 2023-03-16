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
                        <h5 class="mb-0 text-info">Add New Brand</h5>
                    </div>
                    <hr/>
                    <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <label for="brand_name" class="col-sm-3 col-form-label">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="Enter Brand Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="brand_image" class="col-sm-3 col-form-label">Brand Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="brand_image" class="form-control" id="brand_image">
                        </div>
                    </div>                    
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Add Brand</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

