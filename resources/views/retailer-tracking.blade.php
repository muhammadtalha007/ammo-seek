@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Retailer Tracking</h2>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Retailer</th>
                <th class="text-center">No. Of Time Clicked</th>
            </tr>
            </thead>
            <tbody>
            @if(count($retailerTracking) != 0)
                @foreach($retailerTracking as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item['clicked']}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td class="text-center">No Track Found Yet!</td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
