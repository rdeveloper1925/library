<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SchoolMaster - Register</title>

    <!-- Fonts -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block"><img height="100%" width="100% " src="{{asset("img/register.jpg")}}"/> </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4">LURS 1.0</h1>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong>Validation Error!</strong> {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                                <form class="user" method="post" action="/doRegister">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" value="{{ old('fName') }}" required name="fName" placeholder="First Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" value="{{ old('lName') }}" required name="lName" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="username" class="form-control form-control-user" required value="{{ old('username') }}" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group row" style="margin:0 30px 10px 30px;">
                                        <div class="col-md-6">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" required name="gender" value="male" >Male
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6 mb-3 mb-sm-0">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" required name="gender" id="" value="female">Female
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"required name="address" value="{{ old('address') }}" aria-describedby="helpId" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"required name="phone" value="{{ old('phone') }}" aria-describedby="helpId" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-user" required name="dob" value="{{ old('dob') }}" placeholder="Date of Birth">
                                    </div>
                                    <input type="hidden" value="1" name="accessLevel">
                                    <input type="hidden" value="1" name="designation">

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" required class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" required class="form-control form-control-user" name="passwordConfirm" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-outline-success btn-user btn-block" value="Register">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</html>
