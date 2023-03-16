@extends('admin.master')
@section('admin')
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View Category</li>
                </ol>
            </nav>
        </div>       
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Category</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Cateory Slug</th>
                            <th>Category Image</th>
                            <th> Action</th>                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_slug}}</td>
                                <td>
                                    <img height="80px" width="80px" src="{{asset('uploads/category/'.$category->cat_image)}}" alt="Cat Image">
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach               
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Cateory Slug</th>
                            <th>Category Image</th>
                            <th> Action</th>                
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection