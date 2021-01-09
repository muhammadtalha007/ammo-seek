@extends('layouts.admin-layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="px-5">
        <div class="container">
            <h5 class="mt-4 mb-3">Add Retailer</h5>
            @if($errors->any())
                <div class="alert alert-danger">
                    <h4>{{$errors->first()}}</h4>
                </div>
            @endif
            <form method="post" action="{{url("/save-retailer-data")}}" onsubmit="return onSubmitForm();">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control col-lg-5 col-md-5 col-sm-5" placeholder="Enter Name"
                           name="name"
                           id="name">
                    <p id="nameError" class="small" style="color: red;display: none">Name is required.</p>
                </div>
                <div class="form-group">
                    <label>Link:</label>
                    <input type="text" class="form-control col-lg-5 col-md-5 col-sm-5" placeholder="Enter link"
                           name="link"
                           id="link">
                    <p id="linkError" class="small" style="color: red;display: none">Link is required.</p>
                </div>
                <button type="submit" id="btnFetch" class="btn btn-primary spinner-border">Save</button>
            </form>
        </div>
    </div>
    <script>
        function onSubmitForm() {
            document.getElementById('nameError').style.display = 'none';
            document.getElementById('linkError').style.display = 'none';
            if (document.getElementById('name').value === '') {
                document.getElementById('nameError').style.display = 'block';
                return false;
            }
            if (document.getElementById('link').value === '') {
                document.getElementById('linkError').style.display = 'block';
                return false;
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
