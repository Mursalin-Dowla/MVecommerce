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
                        <h5 class="mb-0 text-info">Add New Sub-Category</h5>
                    </div>
                    <hr/>
                    <form action="{{route('store.subcategory')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <label for="subcat_name" class="col-sm-3 col-form-label">Sub-Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="subcat_name" class="form-control" id="subcat_name" placeholder="Enter Sub-Category Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cat_id" class="col-sm-3 col-form-label">Select Category</label>
                        <div class="col-sm-9">
                            <select name="cat_id" id="cat_id">
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach                        
                            </select>
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

