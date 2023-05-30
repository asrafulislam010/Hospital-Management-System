<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

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

                    <form method="POST" action="{{url('sendemail',$data->id)}}">
                        @csrf

                        <div style="padding: 15px;">
                            <label for="">Greeting</label>
                            <input type="text" style="color:black" name="greeting" required="">
                        </div>
                        <div style="padding: 15px;">
                            <label for="">Body</label>
                            <input type="text" style="color:black;" name="body" required="">
                        </div>

                        <div style="padding: 15px;">
                            <label for="">Action Text</label>
                            <input type="text" style="color:black" name="actiontext" required="">
                        </div>

                        <div style="padding: 15px;">
                            <label for="">Action Url</label>
                            <input type="text" style="color:black" name="actionturl" required="">
                        </div>

                        <div style="padding: 15px;">
                            <label for="">End Part</label>
                            <input type="text" style="color:black" name="endpart" required="">
                        </div>

                        <div style="padding: 15px;">
                            <button type="submit" class="btn btn-success">Send Mail</button>
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