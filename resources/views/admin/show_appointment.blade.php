<!DOCTYPE html>
<html lang="en">

<head>
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
            <div style="padding-top: 100px;" align="center">
                <table>
                    <tr style="background-color:black;" align="center">
                        <th style="padding:10px;">User Name</th>
                        <th style="padding:10px;">Contact</th>
                        <th style="padding:10px;">Email </th>
                        <th style="padding:10px;">Doctor Name</th>
                        <th style="padding:10px;">Date</th>
                        <th style="padding:10px;">Message</th>
                        <th style="padding:10px;">status</th>
                        <th style="padding:10px;">Approved</th>
                        <th style="padding:10px;">Cancel</th>
                        <th style="padding:10px;">Send Mail</th>
                    </tr>
                    @foreach($appoints as $appoint)
                    <tr style="background-color: black;" align="center">
                        <td>{{$appoint->name}}</td>
                        <td>{{$appoint->contact}}</td>
                        <td>{{$appoint->email}}</td>
                        <td>{{$appoint->doctor}}</td>
                        <td>{{$appoint->date}}</td>
                        <td>{{$appoint->message}}</td>
                        <td>{{$appoint->status}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a>
                        </td>
                        
                        <td>
                            <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">cancel</a>
                        </td>

                        <td>
                            <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a>
                        </td>
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