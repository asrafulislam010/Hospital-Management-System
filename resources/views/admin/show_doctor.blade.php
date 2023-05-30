<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public">
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

            <div class="container" style="padding-top:100px; margin:5px;" align="center">
                <table>
                    <tr style="background-color:black;">
                        <th style="padding:10px;">User Name</th>
                        <th style="padding:10px;">Contact</th>
                        <th style="padding:10px;">Speciality</th>
                        <th style="padding:10px;">Room No</th>
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Delete</th>
                        <th style="padding:10px;">Update</th>
                        
                    </tr>
                    @foreach($data as $doctor)
                    <tr style="background-color: black;" align="center">
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td>
                            <img height="100" width="100" src="doctorimage/{{$doctor->image}}" alt="">
                        </td>
                        <td><a class="btn btn-danger" href="{{url('delete_doctor',$doctor->id)}}" onclick="return confirm('Are You Sure? You Want to delete')">Delete</a></td>

                        <td><a class="btn btn-primary" href="{{url('update_doctor',$doctor->id)}}">Update</a></td>

                       
                    </tr>

                    @endforeach
                </table>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
</body>

</html>