@extends('layouts.app')
@section('content')
    <section>
        <div class="gap black-layer opc5">
            <div class="fixed-bg2" style="background-image: url('assets/images/pg-tp-bg.jpg');"></div>
            <div class="container">
                <div class="pag-tp">
                    <div class="pag-tp-inr">
                        <h1 itemprop="headline">Login And Register</h1>
                        <p itemprop="description">We Stand Beside those who Protect our Community</p>
                    </div>
                    <ol class="breadcrumb brd-rd30 theme-bg">
                        <li class="breadcrumb-item"><a href="index-2.html" title="" itemprop="url">HOME</a></li>
                        <li class="breadcrumb-item active">LOGIN AND REGISTER</li>
                    </ol>
                </div><!-- Page Top -->
            </div>
        </div>
    </section>
    <section>
        <div class="gap">
            <div class="container">
                <div class="login-register-wrp">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="lgn-rgstr gray-bg brd-rd3 text-center">
                                <h3 itemprop="headline">Don't Have An Account?</h3>
                                 @if(\Illuminate\Support\Facades\Session::has('msg'))
                                    <div class="alert alert-danger">
                                        <h4>{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                    </div>
                                @endif
                                <form class="lgn-rgstr-frm" method="POST" action="{{ route('register') }}" onsubmit="return onSubmitForm();">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input class="brd-rd30" id="name" name="name" type="text" placeholder="Complete Name">
                                            <p class="small" id="nameError" style="color: red;display: none">Name is required.</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input class="brd-rd30" id="email" name="email" type="email" placeholder="Email Address">
                                            <p class="small" id="emailError" style="color: red;display: none">Email is required.</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input class="brd-rd30" id="password" name="password" type="password" placeholder="Password">
                                            <p class="small" id="passwordError" style="color: red;display: none">Password is required.</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input class="brd-rd30" id="confirmPassword" name="confirmPassword" type="password" placeholder="Re - Password">
                                            <p class="small" id="confirmPasswordError" style="color: red;display: none">Confirm Password is required.</p>
                                            <p class="small" id="passwordNotMatchError" style="color: red;display: none">Password and Confirm Password doesn't
                                                match.</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <button class="theme-btn theme-bg brd-rd30" type="submit">REGISTER NOW
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="cnt-wth" style="display: none">
                                    <h6 itemprop="headline">CONTACT WITH</h6>
                                    <div class="scl2">
                                        <a class="facebook" href="#" title="Facebook" itemprop="url" target="_blank"><i
                                                class="fa fa-facebook"></i></a>
                                        <a class="twitter" href="#" title="Twitter" itemprop="url" target="_blank"><i
                                                class="fa fa-twitter"></i></a>
                                        <a class="google" href="#" title="Google Plus" itemprop="url" target="_blank"><i
                                                class="fa fa-google-plus"></i></a>
                                        <a class="linkedin" href="#" title="Linkedin" itemprop="url" target="_blank"><i
                                                class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="lgn-rgstr gray-bg brd-rd3 text-center">
                                <h3 itemprop="headline">Have An Account?</h3>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <h4>{{$errors->first()}}</h4>
                                    </div>
                                @endif
                                <form class="lgn-rgstr-frm" method="POST" action="{{ route('login') }}"  onsubmit="return onSubmitForm2();">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input class="brd-rd30" id="email2" name="email2" type="email" placeholder="Email Address">
                                            <p class="small" id="emailError2" style="color: red;display: none">Email is required.</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <input class="brd-rd30" id="password2" name="password2" type="password" placeholder="Password">
                                            <p class="small" id="passwordError2" style="color: red;display: none">Password is required.</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <button class="theme-btn theme-bg brd-rd30" type="submit">LOGIN</button>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <a href="#" title="" itemprop="url">FORGET A PASSWORD</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- Login & Register Wrap -->
            </div>
        </div>
    </section>
    <script>
        function onSubmitForm() {
            document.getElementById('nameError').style.display = 'none';
            document.getElementById('emailError').style.display = 'none';
            document.getElementById('passwordError').style.display = 'none';
            document.getElementById('confirmPasswordError').style.display = 'none';
            document.getElementById('passwordNotMatchError').style.display = 'none';
            if (document.getElementById('name').value === '') {
                document.getElementById('nameError').style.display = 'block';
                return false;
            }
            if (document.getElementById('email').value === '') {
                document.getElementById('emailError').style.display = 'block';
                return false;
            }
            if (document.getElementById('password').value === '') {
                document.getElementById('passwordError').style.display = 'block';
                return false;
            }
            if (document.getElementById('confirmPassword').value === '') {
                document.getElementById('confirmPasswordError').style.display = 'block';
                return false;
            }
            if (document.getElementById('confirmPassword').value !== document.getElementById('password').value) {
                document.getElementById('passwordNotMatchError').style.display = 'block';
                return false;
            }
        }
    </script>
    <script>
        function onSubmitForm2() {
            document.getElementById('emailError2').style.display = 'none';
            document.getElementById('passwordError2').style.display = 'none';
            if (document.getElementById('email2').value === '') {
                document.getElementById('emailError2').style.display = 'block';
                return false;
            }
            if (document.getElementById('password2').value === '') {
                document.getElementById('passwordError2').style.display = 'block';
                return false;
            }
        }
    </script>
@endsection
