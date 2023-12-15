@extends('admin.admin_master')
@section('title', 'Profile')
@section('admin')

          <!-- -------------------------------------------------------------- -->
          <!-- Start Page Content -->
          <!-- -------------------------------------------------------------- -->
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
              <!-- ---------------------
                            start Hanna Gover
                        ---------------- -->
              <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                  <center class="mt-4">

                    <img src="{{ (!empty($adminProfileData->profile_image))? url('upload/admin_images/'.$adminProfileData->profile_image):url('upload/no_image.jpg') }}" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2">{{ $adminProfileData->name }}</h4>
                    <h6 class="card-subtitle">{{ $adminProfileData->role }}</h6>
                    <div class="row text-center justify-content-md-center">
                      <div class="col-4">
                        <a href="javascript:void(0)" class="link"><i class="ri-group-line fs-3 align-middle"></i>
                            <font class="font-medium">254</font></a>
                      </div>

                      <div class="col-4">
                        <a href="javascript:void(0)" class="link"><i class="ri-gallery-line fs-3 align-middle"></i>
                            <font class="font-medium">54</font></a>
                      </div>
                    </div>

                  </center>
                </div>
                <div>
                  <hr />
                </div>
                <div class="card-body">
                    <center>
                  <small class="text-muted">Email address </small>
                  <h6>{{ $adminProfileData->email }}</h6>
                  <small class="text-muted pt-4 db">Phone</small>
                  <h6>{{ $adminProfileData->phone }}</h6>
                  <small class="text-muted pt-4 db">Address</small>
                  <h6>{{ $adminProfileData->address }}</h6>

                  <small class="text-muted pt-4 db">Social Profile</small>
                  <br />
                  <button class="btn btn-circle btn-secondary">
                    <i class="ri-facebook-fill fs-5"></i>
                  </button>
                  <button class="btn btn-circle btn-secondary">
                    <i class="ri-twitter-fill fs-5"></i>
                  </button>
                  <button class="btn btn-circle btn-secondary">
                    <i class="ri-youtube-fill fs-5"></i>
                  </button>
                </div>
            </center>
              </div>
              <!-- ---------------------
                            end Hanna Gover
                        ---------------- -->
            </div>
            <!-- Column -->
          </div>
          <!-- Row -->
          <!-- -------------------------------------------------------------- -->
          <!-- End PAge Content -->
          <!-- -------------------------------------------------------------- -->

@endsection
