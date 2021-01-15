@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h2>Ammo</h2>
            </div>
            <div class="col-md-4 text-right mt-2 row">
                <div style="display: flex">
                    <input type="file" name="select_file" id="select_file" style="display: none"
                           onchange="uploadExcelFile()"/>
                </div>
                <div>
                    <a class="btn btn-primary" style="color: white"
                       onclick="document.getElementById('select_file').click()">Upload Excel File</a>
                    <a class="btn btn-primary float-right ml-2" href="{{url('/add-ammo')}}">+ Add Ammo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="px-5 table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Record No.</th>
                <th>Unique Id</th>
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
                        <td>{{$item->unique_id}}</td>
                        <td class="text-center">{{$item->description}}</td>
                        <td class="text-center">{{$item->ammo_type}}</td>
                        <td class="text-center">{{\App\Retailer::where('id',$item->retailer)->first()['name']}}</td>
                        <td class="text-center">{{\App\Caliber::where('id',$item->caliber)->first()['name']}}</td>
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
    <script>
        function uploadExcelFile() {
            let formData = new FormData();
            formData.append("select_file", document.getElementById('select_file').files[0]);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax
            ({
                type: 'POST',
                url: `{{env('APP_URL')}}/import_excel/import`,
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
@endsection
