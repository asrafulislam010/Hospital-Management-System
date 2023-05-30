<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.nabvar')

        <div class="container-fluid page-body-wrapper">



            <div class="container" style="padding:100px;" align="center">


                @if((session()->has('message')))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>

                    {{session()->get('message')}}
                </div>
                @endif

                <form action="{{url('edit_doctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:20px">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color:black;" name="name" value="{{$data->name}}">
                    </div>

                    <div style="padding:20px">
                        <label for="">Contact Number</label>
                        <input type="text" style="color:black;" name="phone" value="{{$data->phone}}">
                    </div>

                    <div style="padding:20px">
                        <label for="">Speciality</label>
                        <input type="text" style="color:black;" name="speciality" value="{{$data->speciality}}">
                    </div>

                    <div style="padding:20px">
                        <label for="">Room No</label>
                        <input type="text" style="color:black;" name="room" value="{{$data->room}}">
                    </div>

                    <div style="padding:20px">
                        <label for="">Old Image</label>
                        <img height="150" width="150" src="doctorimage/{{$data->image}}" alt="">
                    </div>

                    <div style="padding:20px">
                        <label for=""> Change Image</label>
                        <input type="file" name="image">
                    </div>

                    <div style="padding:20px">
                        <input type="submit" class="btn btn-primary">
                    </div>

                </form>
            </div>

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
</body>

</html>