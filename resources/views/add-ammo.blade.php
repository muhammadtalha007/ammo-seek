@extends('layouts.admin-layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="px-5">
        <div class="container">
            <h5 class="mt-4 mb-3">Add Ammo</h5>
            <form method="post" action="{{url("/save-ammo-data")}}" onsubmit="return onSubmitForm();">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Describe Ammo:</label>
                            <textarea type="text" class="form-control" name="description" id="description"
                                      placeholder="Enter Description"></textarea>
                            <p class="small" id="descriptionError" style="color: red;display: none">Description is
                                required.</p>
                        </div>
                        <div class="form-group">
                            <label>Ammo Type:</label>
                            <select id="ammoType" name="ammoType" class="form-control" onchange="shotGunSelected()">
                                <option value="Handgun">Handgun</option>
                                <option value="Rifle">Rifle</option>
                                <option value="Rimfire">Rimfire</option>
                                <option value="Shotgun">Shotgun</option>
                            </select>
                        </div>
                        <div class="form-group" id="selected1" style="display: none">
                            <label>Gauge / Bore:</label>
                            <select id="gauge" name="gauge" class="form-control">
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
                        <div class="form-group" id="selected2" style="display: none">
                            <label>Shot Type / Size:</label>
                            <select id="shotType" name="shotType" class="form-control">
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
                        <div class="form-group" id="selected3" style="display: none">
                            <label>Shell Length:</label>
                            <select id="shellLength" name="shellLength" class="form-control">
                                <option value="1 3/4">1 3/4</option>
                                <option value="2 1/2">2 1/2</option>
                                <option value="2 1/4">2 1/4</option>
                                <option value="2 3/4">2 3/4</option>
                                <option value="3">3</option>
                                <option value="3 1/2">3 1/2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Retailer:</label>
                            <select id="retailer" name="retailer" class="form-control">
                                @foreach(\App\Retailer::all() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <p class="small" id="retailerError" style="color: red;display: none">Retailer is
                                required. <span style="color: black">( Kindly Add Retailer From Side Tab )</span></p>
                        </div>
                        <div class="form-group">
                            <label>Caliber:</label>
                            <select id="caliber" name="caliber" class="form-control">
                                @foreach(\App\Caliber::all() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <p class="small" id="caliberError" style="color: red;display: none">Caliber is required. <span style="color: black">( Kindly Add Caliber From Side Tab )</span></p>
                        </div>
                        <div class="form-group">
                            <label>Price:</label>
                            <input type="number" class="form-control" placeholder="Enter Price" name="price" id="price">
                            <p class="small" id="priceError" style="color: red;display: none">Price is required.</p>
                        </div>
                        <div class="form-group">
                            <label>Mfg:</label>
                            <input type="text" class="form-control" placeholder="Enter Mfg" name="mfg" id="mfg">
                            <p class="small" id="mfgError" style="color: red;display: none">Mfg is required.</p>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Condition:</label>
                            <select id="condition" name="condition" class="form-control">
                                <option value="Factory new ammunition only">Factory new ammunition only</option>
                                <option value="Remanufactured ammo only">Remanufactured ammo only</option>
                                <option value="Factory seconds only">Factory seconds only</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-top: 40px;">
                            <label>Case Material:</label>
                            <select id="caseMaterial" name="caseMaterial" class="form-control">
                                <option value="Brass">Brass case only</option>
                                <option value="Steel">Steel case only</option>
                                <option value="Aluminum">Aluminum case only</option>
                                <option value="Plastic">Plastic case only</option>
                                <option value="NAS3">NAS3 case only</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Shipping:</label>
                            <select id="shipping" name="shipping" class="form-control">
                                <option value="Hide retailers with 'highest' shipping costs">Hide retailers with
                                    "highest" shipping costs
                                </option>
                                <option value="Hide retailers with 'high' shipping costs and higher">Hide retailers with
                                    "high" shipping costs and higher
                                </option>
                                <option value="Hide retailers with 'average' shipping costs and higher">Hide retailers
                                    with "average" shipping costs and higher
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rounds:</label>
                            <input type="number" class="form-control" placeholder="Enter Rounds" name="rounds"
                                   id="rounds">
                            <p class="small" id="roundsError" style="color: red;display: none">Rounds is required.</p>
                        </div>
                        <div class="form-group">
                            <label>Grain Weight:</label>
                            <input type="number" class="form-control" placeholder="Enter Grain Weight"
                                   name="grainWeight"
                                   id="grainWeight">
                            <p class="small" id="grainWeightError" style="color: red;display: none">Grain Weight is
                                required.</p>
                        </div>
                        <div class="form-group">
                            <label>Ammo External Link:</label>
                            <input type="text" class="form-control" placeholder="Enter Ammo External Link"
                                   name="externalLink"
                                   id="externalLink">
                            <p class="small" id="externalLinkError" style="color: red;display: none">Ammo External Link is
                                required.</p>
                        </div>
                    </div>
                </div>
                <button type="submit" id="btnFetch" class="btn btn-primary spinner-border">Save</button>
            </form>
        </div>
    </div>
    <script>
        function onSubmitForm() {
            document.getElementById('grainWeightError').style.display = 'none';
            document.getElementById('roundsError').style.display = 'none';
            document.getElementById('descriptionError').style.display = 'none';
            document.getElementById('mfgError').style.display = 'none';
            document.getElementById('priceError').style.display = 'none';
            document.getElementById('caliberError').style.display = 'none';
            document.getElementById('retailerError').style.display = 'none';
            document.getElementById('externalLinkError').style.display = 'none';
            if (document.getElementById('retailer').value === '') {
                document.getElementById('retailerError').style.display = 'block';
                return false;
            }
            if (document.getElementById('caliber').value === '') {
                document.getElementById('caliberError').style.display = 'block';
                return false;
            }
            if (document.getElementById('price').value === '') {
                document.getElementById('priceError').style.display = 'block';
                return false;
            }
            if (document.getElementById('mfg').value === '') {
                document.getElementById('mfgError').style.display = 'block';
                return false;
            }
            if (document.getElementById('description').value === '') {
                document.getElementById('descriptionError').style.display = 'block';
                return false;
            }
            if (document.getElementById('rounds').value === '') {
                document.getElementById('roundsError').style.display = 'block';
                return false;
            }
            if (document.getElementById('grainWeight').value === '') {
                document.getElementById('grainWeightError').style.display = 'block';
                return false;
            }
            if (document.getElementById('externalLink').value === '') {
                document.getElementById('externalLinkError').style.display = 'block';
                return false;
            }
        }
    </script>
    <script>
        function shotGunSelected() {
            if (document.getElementById('ammoType').value === 'Shotgun') {
                document.getElementById('selected1').style.display = 'block';
                document.getElementById('selected2').style.display = 'block';
                document.getElementById('selected3').style.display = 'block';
            } else {
                document.getElementById('selected1').style.display = 'none';
                document.getElementById('selected2').style.display = 'none';
                document.getElementById('selected3').style.display = 'none';
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
// Prepare the preview for profile picture
            $("#photo").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photopreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
