@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Contact Us</h2>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone No</th>
                <th class="text-center">Problem</th>
            </tr>
            </thead>
            <tbody>
            @if(count($contactUs) != 0)
                @foreach($contactUs as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">{{$item->phone_no}}</td>
                        <td class="text-center">{{$item->problem}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td class="text-center">No Contact Message Found Yet!</td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
