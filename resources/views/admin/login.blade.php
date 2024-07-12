<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">



</head>

<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="text-center">
                            <h1 class="h2">Admin Login</h1>
                            <p class="lead">
                                
                            </p>
                        </div>
                        <div class="card login-form mb-0">
                            <div class="card-body">
                                <form class="mt-4 mb-4 login-input" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                   
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter email" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter password" />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Login</button>
                                </form>



                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/js/toastr.init.js') }}"></script>

    <script>
        // Get the message from your session data
        var toasterMessage = "{{ session('success') }}";
    
        // Define the default message type and position
        var messageType = "success";
        var positionClass = "toast-top-right";
    
        // Check if there was an error message
        @if (session('error'))
            toasterMessage = "{{ session('error') }}";
            messageType = "error";
        @endif
    
        // Display the notification based on the message type
        toastr.options = {
            "positionClass": positionClass,
        };
    
        if (toasterMessage) {
            if (messageType === "success") {
                toastr.success(toasterMessage);
            } else if (messageType === "error") {
                toastr.error(toasterMessage);
            }
        }
    </script>
    
    
</body>

</html>
