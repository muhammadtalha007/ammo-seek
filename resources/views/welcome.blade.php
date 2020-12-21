@extends('layouts.app')
@section('content')
    <section>
        <div class="gap" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-lg-8">
                        <div class="gap remove-gap">
                            <div id="byCaliber2" class="sec-title2 text-center">
                                <h4 itemprop="headline">SEARCH AMMO BY CALIBER</h4>
                            </div>
                            <div id="handgun2" style="display: none" class="sec-title2 text-center">
                                <h4 itemprop="headline">SEARCH HANDGUN AMMO</h4>
                            </div>
                            <div id="rifle2" style="display: none" class="sec-title2 text-center">
                                <h4 itemprop="headline">SEARCH RIFLE AMMO</h4>
                            </div>
                            <div id="rimfire2" style="display: none" class="sec-title2 text-center">
                                <h4 itemprop="headline">SEARCH RIMFIRE AMMO</h4>
                            </div>
                            <div id="shotgun2" style="display: none" class="sec-title2 text-center">
                                <h4 itemprop="headline">SEARCH SHOTGUN AMMO</h4>
                            </div>
                            <div class="remove-ext3">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12" style="margin-bottom: 150px">
                                        <div class="pst-bx2">
                                            <label class="ml-3">Filters:</label>
                                            <div class="row m-3">
                                                <div class="col-md-2 tabscustom customselectedtab" id="byCaliber1"
                                                     onclick="profileTab('byCaliber')">
                                                    By Caliber
                                                </div>
                                                <div class="col-md-2 tabscustom" id="handgun1"
                                                     onclick="profileTab('handgun')">
                                                    Handgun
                                                </div>
                                                <div class="col-md-2 tabscustom" id="rifle1"
                                                     onclick="profileTab('rifle')">
                                                    Rifle
                                                </div>
                                                <div class="col-md-2 tabscustom" id="rimfire1"
                                                     onclick="profileTab('rimfire')">
                                                    Rimfire
                                                </div>
                                                <div class="col-md-2 tabscustom" id="shotgun1"
                                                     onclick="profileTab('shotgun')">
                                                    Shotgun
                                                </div>
                                            </div>

                                            <form method="post" action="{{url("/seek-by-caliber")}}">
                                                {{csrf_field()}}
                                                <div id="byCaliber">
                                                    <div style="margin: 0 auto;display: block!important;"
                                                         class="col-md-8 col-sm-8 col-lg-8 autocomplete">
                                                        <input class="form-control" id="myInput" name="myCountry"
                                                               type="text"
                                                               placeholder="Type a Caliber to seek ammo...">
                                                    </div>
                                                    <div class="mt-4" style="text-align: center">
                                                        <button type="submit" class="btn btn-secondary">Start Seeking
                                                            Now
                                                        </button>
                                                    </div>

                                                </div>
                                            </form>

                                            <form method="post" action="{{url("/seek-by-handgun")}}">
                                                {{csrf_field()}}
                                                <div class="col-md-8 col-sm-8 col-lg-8 autocomplete"
                                                     style="margin: 0 auto;display: none" id="handgun">
                                                    <div>
                                                        <label>Caliber:</label>
                                                        <select class="form-control" name="handgunCaliber"
                                                                id="handgunCaliber">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Caliber::all() as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Retailer:</label>
                                                        <select class="form-control" name="handgunRetailer"
                                                                id="handgunRetailer">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Retailer::all() as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Grain Weight:</label>
                                                        <select class="form-control" name="handgunGrainWeight"
                                                                id="handgunGrainWeight">
                                                            <option value="">(Any)</option>
                                                            @for($i=1;$i<750;$i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>No of Rounds:</label>
                                                        <select class="form-control" name="handgunRounds"
                                                                id="handgunRounds">
                                                            <option value="">(Any)</option>
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="15">15</option>
                                                            <option value="20">20</option>
                                                            <option value="25">25</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="250">250</option>
                                                            <option value="500">500</option>
                                                            <option value="1000">1000</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Condition:</label>
                                                        <select id="handgunCondition" name="handgunCondition"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Factory new ammunition only">Factory new
                                                                ammunition only
                                                            </option>
                                                            <option value="Remanufactured ammo only">Remanufactured ammo
                                                                only
                                                            </option>
                                                            <option value="Factory seconds only">Factory seconds only
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Case Material:</label>
                                                        <select id="handgunCaseMaterial" name="handgunCaseMaterial"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Brass case only">Brass case only</option>
                                                            <option value="Steel case only">Steel case only</option>
                                                            <option value="Aluminum case only">Aluminum case only
                                                            </option>
                                                            <option value="Plastic case only">Plastic case only</option>
                                                            <option value="NAS3 case only">NAS3 case only</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Shipping:</label>
                                                        <select id="handgunShipping" name="handgunShipping"
                                                                class="form-control">
                                                            <option value="">(Show All)</option>
                                                            <option
                                                                value="Hide retailers with 'highest' shipping costs">
                                                                Hide retailers with
                                                                "highest" shipping costs
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'high' shipping costs and higher">
                                                                Hide retailers with
                                                                "high" shipping costs and higher
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'average' shipping costs and higher">
                                                                Hide retailers
                                                                with "average" shipping costs and higher
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4" style="text-align: center">
                                                        <button type="submit" class="btn btn-secondary">Start Seeking
                                                            Now
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form method="post" action="{{url("/seek-by-rifle")}}">
                                                {{csrf_field()}}
                                                <div class="col-md-8 col-sm-8 col-lg-8 autocomplete"
                                                     style="margin: 0 auto;display: none" id="rifle">
                                                    <div>
                                                        <label>Caliber:</label>
                                                        <select class="form-control" name="rifleCaliber"
                                                                id="rifleCaliber">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Caliber::all() as $item)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Retailer:</label>
                                                        <select class="form-control" name="rifleRetailer"
                                                                id="rifleRetailer">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Retailer::all() as $item)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Grain Weight:</label>
                                                        <select class="form-control" name="rifleGrainWeight"
                                                                id="rifleGrainWeight">
                                                            <option value="">(Any)</option>
                                                            @for($i=1;$i<750;$i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>No of Rounds:</label>
                                                        <select class="form-control" name="rifleRounds"
                                                                id="rifleRounds">
                                                            <option value="">(Any)</option>
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="15">15</option>
                                                            <option value="20">20</option>
                                                            <option value="25">25</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="250">250</option>
                                                            <option value="500">500</option>
                                                            <option value="1000">1000</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Condition:</label>
                                                        <select id="rifleCondition" name="rifleCondition"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Factory new ammunition only">Factory new
                                                                ammunition only
                                                            </option>
                                                            <option value="Remanufactured ammo only">Remanufactured ammo
                                                                only
                                                            </option>
                                                            <option value="Factory seconds only">Factory seconds only
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Case Material:</label>
                                                        <select id="rifleCaseMaterial" name="rifleCaseMaterial"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Brass case only">Brass case only</option>
                                                            <option value="Steel case only">Steel case only</option>
                                                            <option value="Aluminum case only">Aluminum case only
                                                            </option>
                                                            <option value="Plastic case only">Plastic case only</option>
                                                            <option value="NAS3 case only">NAS3 case only</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Shipping:</label>
                                                        <select id="rifleShipping" name="rifleShipping"
                                                                class="form-control">
                                                            <option value="">(Show All)</option>
                                                            <option
                                                                value="Hide retailers with 'highest' shipping costs">
                                                                Hide retailers with
                                                                "highest" shipping costs
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'high' shipping costs and higher">
                                                                Hide retailers with
                                                                "high" shipping costs and higher
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'average' shipping costs and higher">
                                                                Hide retailers
                                                                with "average" shipping costs and higher
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4" style="text-align: center">
                                                        <button type="submit" class="btn btn-secondary">Start Seeking
                                                            Now
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form method="post" action="{{url("/seek-by-rimfire")}}">
                                                {{csrf_field()}}
                                                <div class="col-md-8 col-sm-8 col-lg-8 autocomplete"
                                                     style="margin: 0 auto;display: none" id="rimfire">
                                                    <div>
                                                        <label>Caliber:</label>
                                                        <select class="form-control" name="rimfireCaliber"
                                                                id="rimfireCaliber">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Caliber::all() as $item)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Retailer:</label>
                                                        <select class="form-control" name="rimfireRetailer"
                                                                id="rimfireRetailer">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Retailer::all() as $item)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Grain Weight:</label>
                                                        <select class="form-control" name="rimfireGrainWeight"
                                                                id="rimfireGrainWeight">
                                                            <option value="">(Any)</option>
                                                            @for($i=1;$i<750;$i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>No of Rounds:</label>
                                                        <select class="form-control" name="rimfireRounds"
                                                                id="rimfireRounds">
                                                            <option value="">(Any)</option>
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="15">15</option>
                                                            <option value="20">20</option>
                                                            <option value="25">25</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="250">250</option>
                                                            <option value="500">500</option>
                                                            <option value="1000">1000</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Condition:</label>
                                                        <select id="rimfireCondition" name="rimfireCondition"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Factory new ammunition only">Factory new
                                                                ammunition only
                                                            </option>
                                                            <option value="Remanufactured ammo only">Remanufactured ammo
                                                                only
                                                            </option>
                                                            <option value="Factory seconds only">Factory seconds only
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Case Material:</label>
                                                        <select id="rimfireCaseMaterial" name="rimfireCaseMaterial"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Brass case only">Brass case only</option>
                                                            <option value="Steel case only">Steel case only</option>
                                                            <option value="Aluminum case only">Aluminum case only
                                                            </option>
                                                            <option value="Plastic case only">Plastic case only</option>
                                                            <option value="NAS3 case only">NAS3 case only</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Shipping:</label>
                                                        <select id="rimfireShipping" name="rimfireShipping"
                                                                class="form-control">
                                                            <option value="">(Show All)</option>
                                                            <option
                                                                value="Hide retailers with 'highest' shipping costs">
                                                                Hide retailers with
                                                                "highest" shipping costs
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'high' shipping costs and higher">
                                                                Hide retailers with
                                                                "high" shipping costs and higher
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'average' shipping costs and higher">
                                                                Hide retailers
                                                                with "average" shipping costs and higher
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4" style="text-align: center">
                                                        <button type="submit" class="btn btn-secondary">Start Seeking
                                                            Now
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form method="post" action="{{url("/seek-by-shotgun")}}">
                                                {{csrf_field()}}
                                                <div class="col-md-8 col-sm-8 col-lg-8 autocomplete"
                                                     style="margin: 0 auto;display: none" id="shotgun">
                                                    <div>
                                                        <label>Gauge / Bore:</label>
                                                        <select id="shotgunGauge" name="shotgunGauge"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="10 Gauge">10 Gauge</option>
                                                            <option value="12 Gauge">12 Gauge</option>
                                                            <option value="16 Gauge">16 Gauge</option>
                                                            <option value="20 Gauge">20 Gauge</option>
                                                            <option value="24 Gauge">24 Gauge</option>
                                                            <option value="28 Gauge">28 Gauge</option>
                                                            <option value="32 Gauge">32 Gauge</option>
                                                            <option value=".410 Bore">.410 Bore</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Retailer:</label>
                                                        <select class="form-control" name="shotgunRetailer"
                                                                id="shotgunRetailer">
                                                            <option value="">(Any)</option>
                                                            @foreach(\App\Retailer::all() as $item)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Shot Type / Size:</label>
                                                        <select id="shotgunShotType" name="shotgunShotType"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="Slug">Slug</option>
                                                            <option value="Blank">Blank</option>
                                                            <option value="0-Buck">0-Buck</option>
                                                            <option value="00-Buck">00-Buck</option>
                                                            <option value="000-Buck">000-Buck</option>
                                                            <option value="1">1</option>
                                                            <option value="1-Buck">1-Buck</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="3-Buck">3-Buck</option>
                                                            <option value="4">4</option>
                                                            <option value="4-Buck">4-Buck</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="7.5">7.5</option>
                                                            <option value="8">8</option>
                                                            <option value="8.5">8.5</option>
                                                            <option value="9">9</option>
                                                            <option value="9.5">9.5</option>
                                                            <option value="10">10</option>
                                                            <option value="12">12</option>
                                                            <option value="B">B</option>
                                                            <option value="BB">BB</option>
                                                            <option value="BBB">BBB</option>
                                                            <option value="T">T</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Shell Length:</label>
                                                        <select id="shotgunShellLength" name="shotgunShellLength"
                                                                class="form-control">
                                                            <option value="">(Any)</option>
                                                            <option value="1 3/4">1 3/4</option>
                                                            <option value="2 1/2">2 1/2</option>
                                                            <option value="2 1/4">2 1/4</option>
                                                            <option value="2 3/4">2 3/4</option>
                                                            <option value="3">3</option>
                                                            <option value="3 1/2">3 1/2</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>No of Rounds:</label>
                                                        <select class="form-control" name="shotgunRounds"
                                                                id="shotgunRounds">
                                                            <option value="">(Any)</option>
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="15">15</option>
                                                            <option value="20">20</option>
                                                            <option value="25">25</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="250">250</option>
                                                            <option value="500">500</option>
                                                            <option value="1000">1000</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Shipping:</label>
                                                        <select id="shotgunShipping" name="shotgunShipping"
                                                                class="form-control">
                                                            <option value="">(Show All)</option>
                                                            <option
                                                                value="Hide retailers with 'highest' shipping costs">
                                                                Hide retailers with
                                                                "highest" shipping costs
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'high' shipping costs and higher">
                                                                Hide retailers with
                                                                "high" shipping costs and higher
                                                            </option>
                                                            <option
                                                                value="Hide retailers with 'average' shipping costs and higher">
                                                                Hide retailers
                                                                with "average" shipping costs and higher
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4" style="text-align: center">
                                                        <button type="submit" class="btn btn-secondary">Start Seeking
                                                            Now
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="sidebar-wrap">
                            <div class="widget style2 blue-bg2 newsletter-widget">
                                <h5 itemprop="headline">GET IN TOUCH</h5>
                                <p itemprop="description">Kindly Subscribe to get Updates of Latest Ammo</p>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <h6>{{$errors->first()}}</h6>
                                    </div>
                                @endif
                                @if(\Illuminate\Support\Facades\Session::has('msg'))
                                    <div class="alert alert-success">
                                        <h6>{{\Illuminate\Support\Facades\Session::get("msg")}}</h6>
                                    </div>
                                @endif
                                <form method="post" action="{{url("/subscribe-now")}}" onsubmit="return onSubmitForm();">
                                    @csrf
                                    <input class="brd-rd30" type="email" id="subscribeEmail" name="subscribeEmail" placeholder="Email Address.....">
                                    <button class="brd-rd30 theme-btn" type="submit">SUBSCRIBE NOW</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function onSubmitForm() {
            // document.getElementById('grainWeightError').style.display = 'none';
            if (document.getElementById('subscribeEmail').value === '') {
                // document.getElementById('retailerError').style.display = 'block';
                return false;
            }
        }
    </script>
    <script>
        function alertFunction() {
            let formData = new FormData();
            // formData.append("keyword", document.getElementById("myInput").value);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax
            ({
                type: 'POST',
                url: `{{env('APP_URL')}}/search/keyword`,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);
                    var xyz = [];
                    for (var i = 0; i < data.length; i++) {
                        xyz.push(data[i].name);
                    }
                    autocomplete(document.getElementById("myInput"), xyz);
                },
                error: function (data) {
                    alert(data.message);
                    console.log("data", data);
                }
            });
        }

        window.onload = alertFunction;

        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function (e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function (e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function (e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }

            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }

    </script>
    <Script>
        function profileTab(tab) {
            document.getElementById('byCaliber').style.display = 'none';
            document.getElementById('handgun').style.display = 'none';
            document.getElementById('rifle').style.display = 'none';
            document.getElementById('rimfire').style.display = 'none';
            document.getElementById('shotgun').style.display = 'none';

            document.getElementById('byCaliber2').style.display = 'none';
            document.getElementById('handgun2').style.display = 'none';
            document.getElementById('rifle2').style.display = 'none';
            document.getElementById('rimfire2').style.display = 'none';
            document.getElementById('shotgun2').style.display = 'none';

            document.getElementById('byCaliber1').classList.remove('customselectedtab');
            document.getElementById('handgun1').classList.remove('customselectedtab');
            document.getElementById('rifle1').classList.remove('customselectedtab');
            document.getElementById('rimfire1').classList.remove('customselectedtab');
            document.getElementById('shotgun1').classList.remove('customselectedtab');
            document.getElementById(tab + '1').classList.add('customselectedtab');


            document.getElementById(tab).style.display = 'block';
            document.getElementById(tab + '2').style.display = 'block';
        }
    </Script>
@endsection
