@extends('admin.master')
@section('admin')
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sub-Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">View Sub-Category</li>
                </ol>
            </nav>
        </div>       
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Sub-Category</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Sub-Category Name</th>
                            <th>Sub-Category Slug</th>
                            <th>Category</th>
                            <th> Action</th>                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{$subcategory->id}}</td>
                                <td>{{$subcategory->subcat_name}}</td>
                                <td>{{$subcategory->subcat_slug}}</td>
                                <td> {{$subcategory->cat->cat_name}} </td>
                                <td>
                                    <a href="{{route('edit.subcategory',$subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{route('delete.subcategory',$subcategory->id)}}" class="btn btn-sm btn-danger">Delete</a>
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