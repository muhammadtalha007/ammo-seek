@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Manage Users</h2>
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
                <th class="text-center">Block / Unblock</th>
            </tr>
            </thead>
            <tbody>
            @if(count($users) != 0)
                @foreach($users as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">
                            @if($item->status == '0')
                                <a href="{{url('/block-user/'.$item->id)}}">
                                    <button class="btn btn-danger">Block</button>
                                </a>
                            @else
                                <a href="{{url('/unblock-user/'.$item->id)}}">
                                    <button class="btn btn-success">Unblock</button>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td class="text-center">No User Found Yet!</td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
