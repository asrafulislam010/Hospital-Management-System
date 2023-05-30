<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.nabvar')


            <!-- partial -->
            <div class="container-fluid page-body-wrapper">



                <div class="container" align="center" style="padding-top:100px;">

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>

                        {{session()->get('message')}}
                    </div>
                    @endif

                    <form method="POST" action="{{url('upload_doctor')}}" enctype="multipart/form-data">
                        @csrf

                        <div style="padding: 15px;">
                            <label for="">Doctor Name</label>
                            <input type="text" style="color:black" name="name" placeholder="Enter Doctor Name" required="">
                        </div>
                        <div style="padding: 15px;">
                            <label for="">Contact</label>
                            <input type="text" style="color:black;" name="number" placeholder="Enter contact number" required="">
                        </div>
                        <div style="padding: 15px;">
                            <label for="">Speciality</label>
                            <select name="speciality" id="" style="color:black; width: 220px;">
                                <option value="skin">skin</option>
                                <option value="heart">Heart</option>
                                <option value="eye">Eye</option>
                                <option value="brain">Brain</option>
                            </select>
                        </div>
                        <div style="padding: 15px;">
                            <label for="">Room No</label>
                            <input type="text" style="color:black" name="room" placeholder="Enter room Number" required="">
                        </div>


                        <div style="padding: 15px;">
                            <label for="">Doctor Image</label>
                            <input type="file" name="image" required="">
                        </div>


                        <div style="padding: 15px;">
                            <button type="submit" class="btn btn-success">Add Doctor</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
</body>

</html>