@extends('layouts.app')
@section('content')
    <section>
        <div class="gap black-layer opc5">
            <div class="fixed-bg2" style="background-image: url(assets/images/pg-tp-bg.jpg);"></div>
            <div class="container">
                <div class="pag-tp">
                    <div class="pag-tp-inr">
                        <h1 itemprop="headline">Contact Us</h1>
                        <p itemprop="description">We Stand Beside those who Protect our Community</p>
                    </div>
                    <ol class="breadcrumb brd-rd30 theme-bg">
                        <li class="breadcrumb-item"><a href="index-2.html" title="" itemprop="url">HOME</a></li>
                        <li class="breadcrumb-item active">CONTACT US</li>
                    </ol>
                </div><!-- Page Top -->
            </div>
        </div>
    </section>
    <section>
        <div class="gap">
            <div class="container">
                <div class="cont-wrp">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="cont-desc">
                                <h2 itemprop="headline">Have any Question......!</h2>
                                <p itemprop="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ac tortor vitae purus
                                    faucibus ornare suspendisse sed nisi. Faucibus et molestie ac feugiat sed lectus.
                                    Eget nulla facilisi etiam dignissim diam quis enim. Arcu felis bibendum ut tristique
                                    et egestas quis. Neque egestas congue quisque egestas diam in arcu. Elementum
                                    facilisis leo vel fringilla est ullamcorper eget nulla.....</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">

                            <form class="cont-frm" method="post" action="{{url("/contact-us")}}" onsubmit="return onSubmitForm();">
                                @csrf
                                @if(\Illuminate\Support\Facades\Session::has('msg'))
                                    <div class="alert alert-success">
                                        <h6>{{\Illuminate\Support\Facades\Session::get("msg")}}</h6>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="brd-rd30" name="name" id="name" type="text" placeholder="Complete Name">
                                        <span style="color: red;display: none" class="small" id="nameError">Name is required!</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="brd-rd30" name="email" id="email" type="email" placeholder="Email Address">
                                        <span style="color: red;display: none" class="small" id="emailError">Email is required!</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input class="brd-rd30" name="phoneNo" id="phoneNo" type="text" placeholder="Phone No">
                                        <span style="color: red;display: none" class="small" id="phoneNoError">Phone No is required!</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <textarea class="brd-rd30" name="problems" id="problems" placeholder="Problems"></textarea>
                                        <span style="color: red;display: none" class="small" id="problemError">Problem is required!</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <button class="theme-btn theme-bg brd-rd30" type="submit">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- Contact Sec -->
            </div>
        </div>
    </section>
    <script>
        function onSubmitForm() {
            document.getElementById('nameError').style.display = 'none';
            document.getElementById('emailError').style.display = 'none';
            document.getElementById('phoneNoError').style.display = 'none';
            document.getElementById('problemError').style.display = 'none';
            if (document.getElementById('name').value === '') {
                document.getElementById('nameError').style.display = 'block';
                return false;
            }
            if (document.getElementById('email').value === '') {
                document.getElementById('emailError').style.display = 'block';
                return false;
            }
            if (document.getElementById('phoneNo').value === '') {
                document.getElementById('phoneNoError').style.display = 'block';
                return false;
            }
            if (document.getElementById('problems').value === '') {
                document.getElementById('problemError').style.display = 'block';
                return false;
            }
        }
    </script>
@endsection
