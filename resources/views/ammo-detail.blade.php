@extends('layouts.app')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Ammo Detail</h2>
                <div>
                    <a href="{{url('/')}}" style="cursor: pointer"><i class="fas fa-chevron-circle-left"></i><label
                            class="ml-1" style="text-decoration: underline;cursor:pointer;">Modify Filter</label></a>

                </div>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr class="table-active" style="border-bottom: 3px solid black;">
                <th class="text-center" style="width: 300px">Retailer</th>
                <th style="width: 500px;" class="text-center">Description</th>
                <th class="text-center">Mfg</th>
                <th class="text-center">Caliber</th>
                <th class="text-center">Grains</th>
                <th class="text-center" style="width: 250px">When</th>
                <th class="text-center">Casing</th>
                <th class="text-center">New?</th>
                <th class="text-center">Price</th>
                <th class="text-center">Rounds</th>
                <th class="text-center">Price/Unit</th>
                <th class="text-center" style="width: 250px">Website Link</th>
                <th class="text-center">Share</th>
                <th class="text-center">Options</th>
            </tr>
            </thead>
            <tbody>
            @if(count($ammoList) != 0)
                @foreach($ammoList as $key => $item)
                    <tr style="cursor: pointer;">
                        <td class="text-center"><a target="_blank" style="color: blue;text-decoration: underline"
                                                   href="{{\App\Retailer::where('id',$item->retailer)->first()['link']}}"
                                                   onclick="performSecondAction({{$item->retailer}})">
                                {{\App\Retailer::where('id',$item->retailer)->first()['name']}}<br>
                                <?php
                                $retailId = $item->retailer;
                                $currentRetailerReviews = \App\RetailerRating::where('retailer_id', $item->retailer)->get();
                                $currentRetailerReviewsOverall = 0;
                                foreach ($currentRetailerReviews as $item1) {
                                    $currentRetailerReviewsOverall += (int)$item1->rating;
                                }
                                if (count($currentRetailerReviews) > 0) {
                                    $currentRetailerReviewsOverall = $currentRetailerReviewsOverall / count($currentRetailerReviews);
                                    $currentRetailerReviewsOverall = round($currentRetailerReviewsOverall, 0);
                                }
                                ?>
                                @if($currentRetailerReviewsOverall == 5)
                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 10px!important;"
                                             class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span></a>
                                @elseif($currentRetailerReviewsOverall == 4)
                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 10px!important;"
                                             class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span></a>
                                @elseif($currentRetailerReviewsOverall == 3)
                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 10px!important;" class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;" class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;" class="fa fa-star checked star-class"></span></a>
                                @elseif($currentRetailerReviewsOverall == 2)
                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 10px!important;"
                                             class="fa fa-star checked star-class"></span>
                                        <span style="font-size: 10px!important;"
                                              class="fa fa-star checked star-class"></span></a>
                                @elseif($currentRetailerReviewsOverall == 1)
                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 10px!important;"
                                             class="fa fa-star checked star-class"></span></a>
                                @else
                                    N/A
                                @endif
                            </a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">{{$item->description}}</a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">{{$item->mfg}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">{{\App\Caliber::where('id',$item->caliber)->first()['name']}}</a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">{{$item->grain_weight}}</a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})"><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() ?></a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">{{$item->case_material}}</a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">
                                @if($item->condition == 'Factory new ammunition only')
                                    <i class="fas fa-check"></i>
                                @else
                                    <i class="fas fa-times"></i>
                                @endif
                            </a>
                        </td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">${{$item->price}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">{{$item->rounds}}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})">${{round(($item->price / $item->rounds), 2) }}</a></td>
                        <td class="text-center"><a target="_blank"
                                                   href="{{$item->ammo_external_link}}"
                                                   onclick="performAction({{$item->id}})"
                                                   style="text-decoration: underline;color: blue">Link</a></td>
                        <td class="text-center">
                            <i style="font-size: 25px" class="fa fa-share-alt-square" onclick="openShare(`{{url('/share-ammo?id=')}}{{$item->id}}`)"  data-toggle="modal" data-target="#myModal">
                            </i>
                        </td>
                        @if(\Illuminate\Support\Facades\Session::get('userId'))
                            <td class="text-center">
                                <button class="btn btn-secondary" onclick="addAmmoToFav({{$item->id}})">Add to Favourite
                                </button>
                            </td>
                        @else
                            <td class="text-center">
                                <button class="btn btn-danger" disabled>Add to Favourite
                                </button>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center" style="width: 200px">No Ammo Found</td>
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

    <div class="modal" id="myModal" style="z-index: 9999999999999999">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Social Sharing</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div>
{{--                        <a href="" target="_blank" id="fbshare">--}}
{{--                            Share on Facebook--}}
{{--                        </a>--}}
                        <input type="text" class="form-control" id="sharing">
                        <button style="margin-top: 8px" class="btn btn-success"  id="submit-review" type="button" onclick="copyLink()">Copy Link</button>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button style="margin-left: 8px;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function openShare(url){
            document.getElementById('sharing').value = url;
            // document.getElementById('fbshare').setAttribute('href','https://www.facebook.com/sharer/sharer.php?u=' + url ) ;
        }
        function copyLink(){
            var copyText = document.getElementById("sharing");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
        function performAction(ammoId) {
            let formData = new FormData();
            formData.append("ammoId", ammoId);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax
            ({
                type: 'POST',
                url: `{{env('APP_URL')}}/click/record`,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);

                },
                error: function (data) {
                    console.log("data", data);
                }
            });
        }
    </script>
    <script>
        function performSecondAction(retailerId) {
            let formData = new FormData();
            formData.append("retailerId", retailerId);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax
            ({
                type: 'POST',
                url: `{{env('APP_URL')}}/click/record/retailer`,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);

                },
                error: function (data) {
                    console.log("data", data);
                }
            });
        }
    </script>
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
