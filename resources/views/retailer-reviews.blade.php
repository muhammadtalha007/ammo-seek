@extends('layouts.app')
@section('content')
    <section>
        <div class="gap">
            <div class="">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-lg-2">
                    </div>
                    <div class="col-md-8 col-sm-12 col-lg-8">
                        <div class="gap remove-gap">
                            <div class="sec-title2 text-center">
                                <h4 itemprop="headline">Retailer Ratings and Reviews</h4>
                            </div>
                            @if(!empty($message))
                                <div class="alert alert-success">
                                    {{$message}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Select a retailer</label>
                                    <select class="form-control" onchange="naviagateToUrl(`{{url('retailer-reviews?retailer=')}}${this.value}`)">
                                        @foreach($retailers as $retailer)
                                            <option value="{{$retailer->id}}" {{$retailerId == $retailer->id ? 'selected' : ''}}>{{$retailer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="text-center" style="font-weight: 500!important;">{{$currentRetailer->name}}</h3>
                                </div>
                                <div class="col-lg-3">
                                    <div class="rate" style="float: right!important;">
                                        @if($currentRetailerReviewsOverall == 5)
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                        @endif
                                        @if($currentRetailerReviewsOverall == 4)
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                        @endif
                                        @if($currentRetailerReviewsOverall == 3)
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                        @endif
                                        @if($currentRetailerReviewsOverall == 2)
                                            <span class="fa fa-star checked star-class"></span>
                                            <span class="fa fa-star checked star-class"></span>
                                        @endif
                                        @if($currentRetailerReviewsOverall == 1)
                                            <span class="fa fa-star checked star-class"></span>
                                        @endif
                                        @if($currentRetailerReviewsOverall == 0)
                                            N/A
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                @if(empty(\Illuminate\Support\Facades\Session::get('userId')))
                                    <button class="btn btn-success" disabled>Rate/Review This Retailer</button>
                                    <p style="font-size: 14px;color: darkred;font-weight: bold">Please Login to write a review!</p>
                                @else
                                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Rate/Review This Retailer</button>
                                @endif
                            </div>

                            <div class="col-lg-12 mt-2">
                                <div class="col-lg-9" style="background-color: #80808040;padding: 20px;margin: 0 auto;max-width: 780px;border-radius: 10px;">
                                    @if(count($currentRetailerReviews) == 0)
                                        <div style=";margin-bottom : 8px;padding: 10px; background-color: white;border-radius: 10px;">
                                            <p class="text-center">OOPS! This retailer is not rated yet!</p>
                                        </div>
                                    @endif
                                   @foreach($currentRetailerReviews as $reviews)
                                    <div style=";margin-bottom : 8px;padding: 10px; background-color: white;border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-md-4" >
                                                @if($reviews->rating == 5)
                                                <span style="font-size: 14px!important;" class="fa fa-star checked star-class"></span>
                                                <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                @elseif($reviews->rating == 4)
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                @elseif($reviews->rating == 3)
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>

                                                @elseif($reviews->rating == 2)
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>
                                                @elseif($reviews->rating == 1)
                                                    <span style="font-size: 14px!important;"  class="fa fa-star checked star-class"></span>

                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <span class="font-weight-bold">{{$reviews->heading ?? ''}}</span>
                                            </div>
                                        </div>
                                        <div style="margin-top: 5px">
                                            <p class="font-italic" style="font-size: 15px">{{\App\User::where('id', $reviews->user_id)->first()['name'] ?? ''}} - <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($reviews->created_at))->diffForHumans() ?></p>
                                        </div>
                                        <div style="margin-top: 5px">
                                            <p style="font-size: 18px">{{$reviews->comment ?? ''}}</p>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-lg-2">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="myModal" style="z-index: 9999999999999999">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Write a Review</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="{{url('save-rating')}}">
                            @csrf
                            <div>
                                <label>Stars</label><br>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2"/>
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1"/>
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div> <br><br><br>
                            <div style="display: block">
                                <label>Heading</label>
                                <br>
                                <input type="text" class="form-control" name="heading">
                                <input type="hidden" class="form-control" value="{{$retailerId ?? ''}}" name="retailerId">
                            </div>
                            <div>
                                <label>Comment</label>
                                <br>
                                <textarea class="form-control" name="comment"></textarea>
                            </div>
                            <button style="display: none" id="submit-review" type="submit">Submit Review</button>
                        </form>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="document.getElementById('submit-review').click()">Save Review</button>
                        <button style="margin-left: 8px;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </section>
    <script>
        function onSubmitForm() {
            if (document.getElementById('subscribeEmail').value === '') {
                return false;
            }
        }
    </script>
    <script>
        function alertFunction() {
            let formData = new FormData();
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
    <script>
        function seekCaliber(caliberName) {
            document.getElementById('myInput').value = caliberName;
            document.getElementById('startSeekingButton').click();
        }

        function naviagateToUrl(url){
            window.location.href = url;
        }
    </script>
@endsection
