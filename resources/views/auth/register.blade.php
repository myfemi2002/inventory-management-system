<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, xtreme admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Xtreme is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <title>:: Register :: Newinfo POS</title>
    <link rel="canonical" href="https://www.newinfo.com.ng" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/favicon.png') }}"/>
    <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet" />
 </head>

  <body>
    <div class="main-wrapper">
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#2962FF" stroke-width="2"></path>
          <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#2962FF" stroke-width="2"></path>
          <path id="teabag" fill="#2962FF" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
          <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#2962FF"></path>
          <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#2962FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
      <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background: url(backend/assets/images/big/auth-bg.jpg) no-repeat center center">
        <div class="auth-box">
          <div>
            <div class="logo">
              <span class="db"><img src="{{ asset('backend/assets/images/logo-icon.png') }}" alt="logo"></span>
              <h5 class="font-medium mb-3">Newinfo Admin Registration</h5>
            </div>
            <!-- Form -->
            <div class="row">
              <div class="col-12">
                  
                <form method="POST" action="{{ route('register') }}">@csrf
                  <div class="mb-3 row">
                    <div class="col-12">
                      <input class="form-control form-control-lg" type="text" name="name"  required=" " placeholder=" Full Name">					
                    </div>
                    <small class="form-control-feedback">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                  </div>

                  <div class="mb-3 row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="email" name="email" required=" " placeholder="Email">
                    </div>
                    <small class="form-control-feedback">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                  </div>

                  <div class="mb-3 row">
                    <div class="col-12">
                        <input class="form-control form-control-lg" type="password" name="password" required=" " placeholder="Password">
                    </div>
                    <small class="form-control-feedback">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                  </div>

                  <div class="mb-3 row">
                    <div class="col-12">
                        <input class="form-control form-control-lg"  type="password" name="password_confirmation" required=" " placeholder="Confirm Password">
                    </div>
                    <small class="form-control-feedback">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </small>
                  </div>

                  <div class="mb-3 text-center">
                    <div class="col-xs-12 pb-3">
                      <button class="btn d-block w-100 btn-lg btn-info" type="submit "> Sign Up</button>
                    </div>
                  </div>

                  <div class="mb-3 mb-0 mt-2">
                    <div class="col-sm-12 text-center"> Already have an account? <a href="{{ route('login') }}" class="text-info ms-1"><b>Sign In</b></a></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Required js -->
    <!-- -------------------------------------------------------------- -->
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- -------------------------------------------------------------- -->
    <!-- This page plugin js -->
    <!-- -------------------------------------------------------------- -->
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/feather.min.js') }}"></script>
    <!-- <script src="../../dist/js/custom.min.js"></script> -->
    <script>
      feather.replace();
      $(".preloader").fadeOut();
    </script>


                {{-- sweetalert2 --}}
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script type="text/javascript">
                    $(function(){
                    $(document).on('click', '#delete', function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");


                    Swal.fire({
                        title: 'Are you sure?',
                                text: "Delete This Data!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                    Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                    }
                })
                    });
                });

                </script>

    <!-- Toaster js -->
    <script src="{{ asset('backend/assets/toaster/toastr.min.js') }}"></script>

    <script>

        @if (Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        }

        @endif

    </script>
</body>
<!-- Mon, 04 Apr 2022 04:44:40 GMT -->
</html>
