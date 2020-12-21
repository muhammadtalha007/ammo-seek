@extends('layouts.app')
@section('content')
    <div class="p-4 ml-3">
        <div class="row">
            <div class="col-md-6 mt-2">
                <h2>Customer</h2>
            </div>
            <div class="col-md-5 text-right mt-2 ml-5 row">
                <div style="display: flex">
                    <input type="file" name="select_file" id="select_file" style="display: none"
                           onchange="uploadExcelFile()"/>
                </div>
                <div>
                    <a class="btn btn-primary" style="color: white"
                       onclick="document.getElementById('select_file').click()">Upload Excel File and Send SMS</a>
                    <a class="btn btn-primary" href="{{url('/add-customer')}}">+ Add Customer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="px-5">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Email</th>
                <th class="text-center">Number</th>
                <th class="text-center">Options</th>
            </tr>
            </thead>
            <tbody>
            @if(count($customer) != 0)
                @foreach($customer as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">{{$item->number}}</td>
                        <td class="text-center">
                            <a href="{{url('/edit-customer/'.$item->id)}}">
                                <button class="btn btn-secondary">Edit</button>
                            </a>
                            <a href="{{url('/delete-customer/'.$item->id)}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td></td>
                    <td>No Staff Found Yet!</td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
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
