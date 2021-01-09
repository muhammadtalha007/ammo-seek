@extends('layouts.app')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Ammo Detail</h2>
               <h3 style="text-align: center;background-color: lightgrey;padding: 15px">{{$ammoList->description}}</h3>
                <h3>{{\App\Retailer::where('id',$ammoList->retailer)->first()['name']}}</h3>
                                                <?php
                                                $retailId = $ammoList->retailer;
                                                $currentRetailerReviews = \App\RetailerRating::where('retailer_id', $ammoList->retailer)->get();
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
                                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 14px!important;"
                                                                                                                                                   class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span></a>
                                                @elseif($currentRetailerReviewsOverall == 4)
                                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 14px!important;"
                                                                                                                                                   class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span></a>
                                                @elseif($currentRetailerReviewsOverall == 3)
                                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 14px!important;" class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;" class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;" class="fa fa-star checked star-class"></span></a>
                                                @elseif($currentRetailerReviewsOverall == 2)
                                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 14px!important;"
                                                                                                                                                   class="fa fa-star checked star-class"></span>
                                                        <span style="font-size: 14px!important;"
                                                              class="fa fa-star checked star-class"></span></a>
                                                @elseif($currentRetailerReviewsOverall == 1)
                                                    <a onclick="window.location.href = `{{url('retailer-reviews')}}?retailer={{$retailId}}`"><span style="font-size: 14px!important;"
                                                                                                                                                   class="fa fa-star checked star-class"></span></a>
                                                @else
                                                     Rating : N/A
                @endif

                <p><span style="font-weight: bold">Manufacturer :</span> {{$ammoList->mfg}}</p>
                <p><span style="font-weight: bold">Caliber :</span> {{\App\Caliber::where('id',$ammoList->caliber)->first()['name']}}</p>
                <p><span style="font-weight: bold">Shot Type :</span> {{$ammoList->shot_type ?? ''}}</p>
                <p><span style="font-weight: bold">Shell Length :</span> {{$ammoList->shell_length ?? ''}}</p>
                <p><span style="font-weight: bold">Casing Material :</span> {{$ammoList->case_material ?? ''}}</p>
                <p><span style="font-weight: bold">Condition :</span> {{$ammoList->condition ?? ''}}</p>
{{--                <p><span style="font-weight: bold">Purchase Limit :</span> {{$ammoList->mfg}}</p>--}}
                <p><span style="font-weight: bold">Rounds :</span> {{$ammoList->rounds ?? ''}}</p>
                <p><span style="font-weight: bold">Price :</span> ${{$ammoList->price ?? ''}}</p>
                <p><span style="font-weight: bold">Cost/Unit :</span> ${{round(($ammoList->price / $ammoList->rounds), 2) }}</p>
                <br>
                <a class="btn btn-success" target="_blank" href="{{$ammoList->ammo_external_link}}">Go to Product Page</a>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
{{--            <tr class="table-active" style="border-bottom: 3px solid black;">--}}
{{--                <th class="text-center" style="width: 300px">Retailer</th>--}}
{{--                <th style="width: 500px;" class="text-center">Description</th>--}}
{{--                <th class="text-center">Mfg</th>--}}
{{--                <th class="text-center">Caliber</th>--}}
{{--                <th class="text-center">Grains</th>--}}
{{--                <th class="text-center" style="width: 250px">When</th>--}}
{{--                <th class="text-center">Casing</th>--}}
{{--                <th class="text-center">New?</th>--}}
{{--                <th class="text-center">Price</th>--}}
{{--                <th class="text-center">Rounds</th>--}}
{{--                <th class="text-center" style="width: 250px">Website Link</th>--}}
{{--                <th class="text-center">Share</th>--}}
{{--                <th class="text-center">Options</th>--}}
{{--            </tr>--}}
            </thead>
            <tbody>
{{--            @if(count($ammoList) != 0)--}}
{{--                @foreach($ammoList as $key => $item)--}}
{{--                    <tr style="cursor: pointer;">--}}
{{--                        <td class="text-center"><a target="_blank" style="color: blue;text-decoration: underline"--}}
{{--                                                   href="{{\App\Retailer::where('id',$item->retailer)->first()['link']}}"--}}
{{--                                                   onclick="performSecondAction({{$item->retailer}})">--}}
{{--                                {{\App\Retailer::where('id',$item->retailer)->first()['name']}}<br>--}}

{{--                                    N/A--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">{{$item->description}}</a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">{{$item->mfg}}</a></td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">{{\App\Caliber::where('id',$item->retailer)->first()['name']}}</a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">{{$item->grain_weight}}</a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})"><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() ?></a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">{{$item->case_material}}</a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">--}}
{{--                                @if($item->condition == 'Factory new ammunition only')--}}
{{--                                    <i class="fas fa-check"></i>--}}
{{--                                @else--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">${{$item->price}}</a></td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})">{{$item->rounds}}</a></td>--}}
{{--                        <td class="text-center"><a target="_blank"--}}
{{--                                                   href="{{$item->ammo_external_link}}"--}}
{{--                                                   onclick="performAction({{$item->id}})"--}}
{{--                                                   style="text-decoration: underline;color: blue">Link</a></td>--}}
{{--                        <td class="text-center">--}}
{{--                            <button class="btn btn-secondary" onclick="openShare(`{{url('/share-ammo')}}/{{$item->id}}`)"  data-toggle="modal" data-target="#myModal">Share--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                        @if(\Illuminate\Support\Facades\Session::get('userId'))--}}
{{--                            <td class="text-center">--}}
{{--                                <button class="btn btn-secondary" onclick="addAmmoToFav({{$item->id}})">Add to Favourite--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                        @else--}}
{{--                            <td class="text-center">--}}
{{--                                <button class="btn btn-danger" disabled>Add to Favourite--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                        @endif--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            @else--}}
{{--                <tr>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td class="text-center" style="width: 200px">No Ammo Found</td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                </tr>--}}
{{--            @endif--}}
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
