
<div id="doctor" class="page-section">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

            <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

            @foreach($doctor as $doctors)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img height="250px !important" src="doctorimage/{{$doctors->image}}" alt="">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body" style="text-transform: uppercase;">

                            <p class="text-xl mb-0">{{$doctors->name}}</p>
                            <hr>
                            <span class="text-sm text-grey"><strong>SPECIALITY:  {{$doctors->speciality}} </strong></span>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>