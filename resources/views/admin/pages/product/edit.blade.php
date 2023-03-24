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
                        <h5 class="mb-0 text-info">Edit Brand</h5>
                    </div>
                    <hr/>
                    <form action="{{route('update.brand',$brand->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <label for="brand_name" class="col-sm-3 col-form-label">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$brand->brand_name}}" name="brand_name" class="form-control" id="brand_name" placeholder="Enter brand Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Brand Image</label>
                        <img class="w-25" height="120px" width="120px" src="{{asset('uploads/brand/'.$brand->brand_image)}}" alt="Cat Image">
                    </div>
                    <div class="row mb-3">
                        <label for="brand_image" class="col-sm-3 col-form-label">New brand Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="brand_image" class="form-control" id="brand_image">
                        </div>
                    </div>                    
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Update brand</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

