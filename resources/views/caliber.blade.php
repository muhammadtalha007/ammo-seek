@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Caliber</h2>
            </div>
            <div class="col-md-3 text-right mt-2 ml-5">
                <a class="btn btn-primary float-right" href="{{url('/add-caliber')}}">+ Add Caliber</a>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Options</th>
            </tr>
            </thead>
            <tbody>
            @if(count($caliber) != 0)
                @foreach($caliber as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">
{{--                            <a href="{{url('/edit-category/'.$item->id)}}">--}}
{{--                                <button class="btn btn-secondary">Edit</button>--}}
{{--                            </a>--}}
                            <a href="{{url('/delete-caliber/'.$item->id)}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td class="text-center">No Caliber Found Yet!</td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
