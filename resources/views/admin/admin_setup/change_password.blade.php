@extends('admin.admin_master')
@section('title', 'Change Password')
@section('admin')

<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <!-- ---------------------
            start Employee Profile
            ---------------- -->
        <div class="card w-100">
            <div class="card-body pb-0">
                <h4 class="card-title">@yield('title')</h4>
            </div>
            <div class="card-body border-top">
                <form method="post" action="{{ route('admin.update.password') }}" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <div class="mb-3">
                                <label for="inputfname" class="control-label col-form-label" >Old Password</label>
                                <input type="password" name="oldpassword" id="oldpassword" class="form-control"  placeholder="Old Password"/>
                                <small class="form-control-feedback">
                                    @error('oldpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="mb-3">
                                <label for="inputlname2" class="control-label col-form-label">New Password</label>
                                <input type="password" name="newpassword" id="newpassword" class="form-control"   placeholder="New Password"/>
                                <small class="form-control-feedback">
                                    @error('newpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="mb-3">
                                <label for="inputlname2" class="control-label col-form-label">Confirm New Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"  placeholder="Confirm New Password"/>
                                <small class="form-control-feedback">
                                    @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>

                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="mb-3 mb-0 text-end">
                            <button type="submit" class="btn btn-danger rounded-pill px-4 waves-effect waves-light"> Change Password</button>
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


@endsection
