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
                                    <a href="{{route('edit.category',$category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Delete
                                      </button> --}}
                                    <a href="{{route('delete.category',$category->id)}}" class="btn btn-sm btn-danger">Delete</a>
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
    <!--Delete Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection