@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Ammo</h2>
            </div>
            <div class="col-md-3 text-right mt-2 ml-5">
                <a class="btn btn-primary float-right" href="{{url('/add-ammo')}}">+ Add Ammo</a>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Description</th>
                <th class="text-center">Ammo Type</th>
                <th class="text-center">Retailer</th>
                <th class="text-center">Caliber</th>
                <th class="text-center">Condition</th>
                <th class="text-center">Case Material</th>
                <th class="text-center">Shipping</th>
                <th class="text-center">Price</th>
                <th class="text-center">Mfg</th>
                <th class="text-center">Rounds</th>
                <th class="text-center">Grain Weight</th>
                <th class="text-center">Ammo External Link</th>
                <th class="text-center">Gauge</th>
                <th class="text-center">Shot Type</th>
                <th class="text-center">Shell Length</th>
                <th class="text-center">Options</th>
            </tr>
            </thead>
            <tbody>
            @if(count($ammo) != 0)
                @foreach($ammo as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td class="text-center">{{$item->description}}</td>
                        <td class="text-center">{{$item->ammo_type}}</td>
                        <td class="text-center">{{\App\Retailer::where('id',$item->retailer)->first()['name']}}</td>
                        <td class="text-center">{{\App\Caliber::where('id',$item->retailer)->first()['name']}}</td>
                        <td class="text-center">{{$item->condition}}</td>
                        <td class="text-center">{{$item->case_material}}</td>
                        <td class="text-center">{{$item->shipping}}</td>
                        <td class="text-center">{{$item->price}}</td>
                        <td class="text-center">{{$item->mfg}}</td>
                        <td class="text-center">{{$item->rounds}}</td>
                        <td class="text-center">{{$item->grain_weight}}</td>
                        <td class="text-center">{{$item->ammo_external_link}}</td>
                        <td class="text-center">{{$item->gauge}}</td>
                        <td class="text-center">{{$item->shot_type}}</td>
                        <td class="text-center">{{$item->shell_length}}</td>
                        <td class="text-center">
                            <a href="{{url('/delete-ammo/'.$item->id)}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">No Ammo Found Yet!</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
