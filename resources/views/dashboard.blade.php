@extends('layouts.customer-layout')
@section('content')
    <div class="p-2 ml-3"><a href="{{url('/')}}"><h5 style="text-decoration: underline">Home</h5></a></div>
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-11 mt-2">
                <h2 class="text-center" style="text-decoration: underline">Customer Panel</h2>
                <h6 class="text-center">You Can See Favourites Here</h6>
            </div>
        </div>
    </div>
{{--    <div class="px-5">--}}
{{--        <div class="row">--}}
{{--            <a href="{{url('/ammo')}}" class="col-xl-3 col-lg-3 order-lg-3 order-xl-2 ml-3" style="color: #646c9a;cursor: pointer">--}}
{{--                <div--}}
{{--                    style="display: flex;flex-grow: 1;flex-direction: column;box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);background-color: #e2e2e257;margin-bottom: 20px;border-radius: 4px;">--}}
{{--                    <div style="padding: 25px;">--}}
{{--                        <h4 class="text-center" style="text-decoration: underline">Ammo</h4>--}}
{{--                        <div class="mb-3"><h6 class="text-center">(Add or Delete Ammo)</h6></div>--}}
{{--                        <div class="row" style="padding: 15px;text-align: center;">--}}
{{--                            <div style="margin: 0 auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="{{url('/retailer')}}" class="col-xl-3 col-lg-3 order-lg-3 order-xl-2 ml-3" style="color: #646c9a;cursor: pointer">--}}
{{--                <div--}}
{{--                    style="display: flex;flex-grow: 1;flex-direction: column;box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);background-color: #e2e2e257;margin-bottom: 20px;border-radius: 4px;">--}}
{{--                    <div style="padding: 25px;">--}}
{{--                        <h4 class="text-center" style="text-decoration: underline">Retailer</h4>--}}
{{--                        <div class="mb-3"><h6 class="text-center">(Add or Delete Retailer)</h6></div>--}}
{{--                        <div class="row" style="padding: 15px;text-align: center;">--}}
{{--                            <div style="margin: 0 auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <a href="{{url('/caliber')}}" class="col-xl-3 col-lg-3 order-lg-3 order-xl-2 ml-3" style="color: #646c9a;cursor: pointer">--}}
{{--                <div--}}
{{--                    style="display: flex;flex-grow: 1;flex-direction: column;box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);background-color: #e2e2e257;margin-bottom: 20px;border-radius: 4px;">--}}
{{--                    <div style="padding: 25px;">--}}
{{--                        <h4 class="text-center" style="text-decoration: underline">Caliber</h4>--}}
{{--                        <div class="mb-3"><h6 class="text-center">(Add or Delete Caliber)</h6></div>--}}
{{--                        <div class="row" style="padding: 15px;text-align: center;">--}}
{{--                            <div style="margin: 0 auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            </div>--}}
{{--        <div class="row col-lg-12">--}}
{{--            <a href="{{url('/users')}}" class="col-xl-3 col-lg-3 order-lg-3 order-xl-2 ml-3" style="color: #646c9a;cursor: pointer">--}}
{{--                <div--}}
{{--                    style="display: flex;flex-grow: 1;flex-direction: column;box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);background-color: #e2e2e257;margin-bottom: 20px;border-radius: 4px;">--}}
{{--                    <div style="padding: 25px;">--}}
{{--                        <h4 class="text-center" style="text-decoration: underline">Manage Users</h4>--}}
{{--                        <div class="mb-3"><h6 class="text-center">(Block and Unblock Users)</h6></div>--}}
{{--                        <div class="row" style="padding: 15px;text-align: center;">--}}
{{--                            <div style="margin: 0 auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
