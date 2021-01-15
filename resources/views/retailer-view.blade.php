<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Ammo Seek</title>

    <link rel="stylesheet" href="assets/css/webfonts.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body itemscope>
<main>
    <header class="style3">
        <div class="lg-ad-sec" style="padding: 0!important;">
            <div class="container">
                <div class="lg-ad-inr">
                    <div class="logo"><a href="{{url('/retailer-route')}}?id={{base64_encode($retailer->id)}}" title="Logo" itemprop="url"><h4 class="mt-3">Ammo Seek</h4>
                        </a></div>
                </div>
            </div>
        </div><!-- Logo Add Section -->
        <div class="mnu-srch-sec">
            <div class="container">
                <nav>
                    <div>
                        <ul>
                            <li><a href="{{url('/retailer-route')}}?id={{base64_encode($retailer->id)}}" title="" itemprop="url">Welcome Vendor {{$retailer->name}}</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div><!-- Menu Search Sec -->
    </header><!-- Header -->
    <br>
   <div class="px-5" style="margin-top: 150px">
{{--       <h3>Your Id is ({{$retailer->id}})</h3>--}}
    <p>This page is only Accessible to you ( You can see your ammo here and upload new csv anytime here)</p>
       <p>Your Retailer Id is : {{$retailer->id}}</p>
       <input type="file" name="select_file" id="select_file" style="display: none"
              onchange="uploadExcelFile()"/>
       <button class="btn btn-success" style="float: right"   onclick="document.getElementById('select_file').click()">Upload CSV File</button>

       <h3>Ammo List</h3>
   </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr class="table-active" style="border-bottom: 3px solid black;">
                <th class="text-center" style="width: 300px">Unique_Id</th>
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
            </tr>
            </thead>
            <tbody>
            @if(count($ammoList) != 0)
                @foreach($ammoList as $key => $item)
                    <tr style="cursor: pointer;">
                        <td>{{$item->unique_id}}</td>
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












    <footer>
        <div class="blue-bg gap">
            <div class="container">
                <div class="footer-data style2 text-center remove-ext6">
                    <div class="row">
                        <div class="col-md-4 col-sm-2 col-lg-4"></div>
                        <div class="col-md-4 col-sm-8 col-lg-4">
                            <div class="widget about-widget">
                                <div class="logo"><a  title="" itemprop="url"><h1
                                            style="color: white" class="mt-3">Ammo Seek</h1></a></div>
                                <p itemprop="description">Appreciate our broad services of Ammo Seek Searches</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-2 col-lg-4"></div>
                        <div class="col-md-2 col-sm-12 col-lg-2"></div>
                        <div class="col-md-8 col-sm-12 col-lg-8">
                            <div class="widget">
                                <div class="cnt-inf-lst style2 text-left">
                                    <div class="cnt-inf-inr">
                                        <i class="fa fa-envelope-o theme-clr"></i>
                                        <strong>EMAIL ADDRESS</strong>
                                        <a href="#" title="" itemprop="url">user@domainname.com</a>
                                        <a href="#" title="" itemprop="url">name@domain.com</a>
                                    </div>
                                    <div class="cnt-inf-inr">
                                        <i class="fa fa-phone theme-clr"></i>
                                        <strong>PHONE NO</strong>
                                        <span>+(123) 456 7890</span>
                                        <span>+(123) 456 7890</span>
                                    </div>
                                    <div class="cnt-inf-inr">
                                        <i class="fa fa-map-marker theme-clr"></i>
                                        <strong>LOCATION</strong>
                                        <span>123 New York E Block Street 2101 USA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="bottom-bar2 text-center">--}}
                {{--                    <p itemprop="description">Copyright 2019. Design by <a class="theme-clr"--}}
                {{--                                                                           href="https://themeforest.net/user/theme-ink/portfolio"--}}
                {{--                                                                           title="Theme-Ink" itemprop="url"--}}
                {{--                                                                           target="_blank">Theme-Ink</a></p>--}}
                {{--                </div>--}}
            </div>
        </div>
    </footer>
</main><!-- Main Wrapper -->
<script>
    function uploadExcelFile() {
        let formData = new FormData();
        formData.append("select_file", document.getElementById('select_file').files[0]);
        formData.append("_token", "{{ csrf_token() }}");
        $.ajax
        ({
            type: 'POST',
            url: `{{env('APP_URL')}}/vendor/import_excel/import`,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                data = JSON.parse(data);
                if (data.status === true) {
                    swal.fire({
                        "title": "",
                        "text": "Excel Imported Successfully!",
                        "type": "success",
                        "showConfirmButton": true,
                        "onClose": function (e) {
                            window.location.reload();
                        }
                    })
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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/custom-scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>
