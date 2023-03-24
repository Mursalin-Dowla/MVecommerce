@extends('admin.master')
@section('admin')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            <hr />
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" id="inputProductTitle"
                                        placeholder="Enter product title">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Short Description</label>
                                    <textarea name="short_des" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Long Description</label>
                                    <textarea name="long_des" class="form-control" id="long_des" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Color</label>
                                    <input name="color" type="text" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Red,Blue,White">
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Size</label>
                                    <input name="size" type="text" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Small,Large,Medium">
                                </div>
                                <div class="mb-3">
                                    <label for="">Tags</label>
                                    <input name="tags" type="text" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Cloth,Food,Electronics">
                                </div>
                                <div class="mb-3">
                                    <label for="image-uploadify" class="form-label">Product Images</label>
                                    <input onchange="preImage(this)" name="image" class="form-control"
                                        id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">
                                    <img class="w-25 mt-3" src="" alt="" id="imageView">
                                </div>
                                <div class="mb-3">
                                    <label for="image-uploadifys" class="form-label">Product Gallery</label>
                                    <input name="images[]" class="form-control" id="image-uploadifys" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        multiple>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">Sales Price</label>
                                    <input name="selling_price" type="text" class="form-control" id="inputPrice"
                                        placeholder="00.00">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCompareatprice" class="form-label">Deis% Price</label>
                                    <input name="discount_price" type="text" class="form-control"
                                        id="inputCompareatprice" placeholder="00.00">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCostPerPrice" class="form-label">Product Code</label>
                                    <input name="product_code" type="text" class="form-control"
                                        id="inputCostPerPrice" placeholder="00.00">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCostPerPrice" class="form-label">Quantity</label>
                                    <input name="quantity" type="text" class="form-control" id="inputCostPerPrice"
                                        placeholder="00.00">
                                </div>
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="cat_id" id="" class="form-select">
                                        <option value="cat_id">----- Select Category -----</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="subcat_id">Sub Category</label>
                                    <select name="subcat_id" class="form-select" id="">
                                        <option value="">----- Select Sub-Category -----</option>
                                        @foreach ($subcats as $subcat)
                                            <option value="{{ $subcat->id }}">{{ $subcat->subcat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" class="form-select" id="">
                                        <option value="">----- Select Brand -----</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Vendor</label>
                                    <select name="vendor_id" class="form-select" id="">
                                        <option value="vendor_id">----- Vendor -----</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="hot_deals" class="form-check-input" type="checkbox"
                                            value="Hot Deals" id="flexCheckChecked" checked="">
                                        <label class="form-check-label" for="flexCheckChecked">Hot Deals</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="special_offer" class="form-check-input" type="checkbox"
                                            value="Special Offer" id="flexCheckChecked" checked="">
                                        <label class="form-check-label" for="flexCheckChecked">Special Offer</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="special_deals" class="form-check-input" type="checkbox"
                                            value="Special Deals" id="flexCheckChecked" checked="">
                                        <label class="form-check-label" for="flexCheckChecked">Special Deals</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check">
                                        <input name="featured" class="form-check-input" type="checkbox" value="Featured"
                                            id="flexCheckChecked" checked="">
                                        <label class="form-check-label" for="flexCheckChecked">Featured</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Save Product</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
