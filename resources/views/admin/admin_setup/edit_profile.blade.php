@extends('admin.admin_master')
@section('title', 'Edit Profile')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- row -->
<div class="row">
<div class="col-lg-12 d-flex align-items-stretch">
    <!-- ---------------------
        start Employee Profile
        ---------------- -->
    <div class="card w-100">
        <div class="card-body pb-0">
            <h4 class="card-title">@yield('title')</h4>
        </div>
        <div class="card-body border-top">
            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="inputfname" class="control-label col-form-label" >Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $adminProfileEdit->name }}" placeholder="First Name Here"/>
                            <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="inputlname2" class="control-label col-form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $adminProfileEdit->email }}" readonly placeholder="Email"/>
                            <small class="form-control-feedback">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="uname" class="control-label col-form-label">Phone</label>
                            <input type="phone" name="phone" class="form-control"  value="{{ $adminProfileEdit->phone }}" placeholder="Phone" />
                            <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label">Address</label>
                            <textarea name="address" class="form-control" aria-label="With textarea" placeholder="Address">{{ $adminProfileEdit->address }}</textarea>
                            <small class="form-control-feedback">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label">Upload Profile Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="profile_image" class="form-control" id="image">
                                    <small class="form-control-feedback">
                                        @error('profile_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label">Profile Image</label>
                            <div class="input-group">
                                <img  id="showImage" src="{{ (!empty($adminProfileEdit->profile_image))? url('upload/admin_images/'.$adminProfileEdit->profile_image):url('upload/no_image.jpg') }}" class="rounded-circle" width="100" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="mb-3 mb-0 text-end">
                            <button type="submit" class="btn btn-danger rounded-pill px-4 waves-effect waves-light"> Update Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- ---------------------
            end Employee Profile
            ---------------- -->
    </div>
</div>
</div>


<!-- End row -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
