@extends('layouts.customer-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Favourites</h2>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr class="table-active" style="border-bottom: 3px solid black;">
                {{--                <th>#</th>--}}
                {{--                <th class="text-center">Ammo Type</th>--}}
                <th class="text-center">Retailer</th>
                <th style="width: 500px;" class="text-center">Description</th>
                <th class="text-center">Mfg</th>
                <th class="text-center">Caliber</th>
                <th class="text-center">Grains</th>
                <th class="text-center">Price</th>
                <th class="text-center">Rounds</th>
{{--                <th class="text-center">Options</th>--}}

                {{--                <th class="text-center">Condition</th>--}}
                {{--                <th class="text-center">Case Material</th>--}}
                {{--                <th class="text-center">Shipping</th>--}}
                {{--                <th class="text-center">Ammo External Link</th>--}}
                {{--                <th class="text-center">Gauge</th>--}}
                {{--                <th class="text-center">Shot Type</th>--}}
                {{--                <th class="text-center">Shell Length</th>--}}
                {{--                <th class="text-center">Options</th>--}}
            </tr>
            </thead>
            <tbody>
            @if(count($ammos) != 0)
                @foreach($ammos as $key => $item)
                    <tr style="cursor: pointer;">
                        {{--                        <td>{{$key + 1}}</td>--}}
                        {{--                        <td class="text-center">{{$item->ammo_type}}</td>--}}
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">{{\App\Retailer::where('id',$item->retailer)->first()['name']}}</a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">{{$item->description}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">{{$item->mfg}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">{{\App\Caliber::where('id',$item->retailer)->first()['name']}}</a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">{{$item->grain_weight}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">${{$item->price}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}">{{$item->rounds}}</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">No Favourite Found</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <script>
        function addAmmoToFav(ammoId) {
            let formData = new FormData();
            formData.append("ammoId", ammoId);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax
            ({
                type: 'POST',
                url: `{{env('APP_URL')}}/add-ammo-fav`,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.status === true) {
                        swal.fire({
                            "title": "Success",
                            "text": "Ammo Added To Favourite Successfully!",
                            "type": "success",
                            "showConfirmButton": true,
                            "onClose": function (e) {
                                window.location.reload();
                            }
                        });
                    } else {
                        alert(data.message);
                    }
                },
                error: function (data) {
                    alert(data.message);
                    console.log("data", data);
                }
            });
        }
    </script>
@endsection
