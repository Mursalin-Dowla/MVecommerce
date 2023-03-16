@extends('vendor.master')
@section('vendor')
<div class="authentication-forgot d-flex align-items-center justify-content-center">
    <div class="card forgot-box">
        <div class="card-body">
            <div class="p-5 rounded  border">
                <div class="text-center">
                    <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                </div>
                <h4 class="mt-5 font-weight-bold">Change Password</h4>
              <form action="{{route('vendor.updatepassword')}}" method="POST">
                @csrf
                <div class="my-4">
                    <label class="form-label">Old Password</label>
                    <input name="old_password" type="text" class="form-control form-control-lg" placeholder="*********" />
                    @error('old_password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="my-4">
                    <label class="form-label">New Password</label>
                    <input name="new_password" type="text" class="form-control form-control-lg" placeholder="*********" />
                    @error('new_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="my-4">
                    <label class="form-label">Confirm New Password</label>
                    <input name="confirm_new_password" type="text" class="form-control form-control-lg" placeholder="*********" />
                     @error('confirm_new_password')
                        <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg">Change Password</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection