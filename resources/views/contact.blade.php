@extends('weblayouts.app')
@section('title', 'Contact')

@section('content')
{{--      <div class="breadcrumb-contentnhy">--}}
{{--        <div class="container">--}}
{{--          <nav aria-label="breadcrumb">--}}
{{--            <h2 class="hny-title text-center">Contact Us</h2>--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--              <li><a href="index.html">Home</a>--}}
{{--                <span class="fa fa-angle-double-right"></span></li>--}}
{{--              <li class="active">Contact</li>--}}
{{--            </ol>--}}
{{--          </nav>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--</section>--}}

<img src="{{ asset('images/cart_img.jpg') }}" style="width: 100%;height: 500px">

 <!-- contacts -->
 <section class="w3l-contacts-8">
    <div class="contacts-9 section-gap py-5">
      <div class="container py-lg-5">
        <div class="row top-map">
          <div class="col-lg-6 partners">
            <div class="cont-details">
              <h3 class="hny-title mb-0">Get in <span>touch</span></h5>
              <p class="mb-5">We're ready to lead you with your queries</p>
              <p class="margin-top"><span class="texthny">Call Us : </span> <a href="tel:+923035265690 ">0303 526 5690</a></p>
              <p> <span class="texthny">Email : </span> <a href="mailto:info@routinecare.pk">
                  info@routinecare.pk</a></p>
              <p class="margin-top"> Lahore, Pakistan </p>
            </div>
            <div class="hours">
              <h3 class="hny-title">Working <span>Hours</span></h5>
              <h6>Business Service:</h6>
              <p> Monday to Saturday 8.00 am - 6.00 pm</p>
              <p> Sunday - Closed</p>
              <h6 class="margin-top">Customer support:</h6>
              <p> Monday to Saturday 8.00 am - 6.00 pm</p>
              <p> Sunday Whatsapp avaialbe only</p>
            </div>
          </div>
          <div class="col-lg-6 map">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217759.99380853778!2d74.3343893!3d31.482940349999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc23abe6ccc7e2462!2sLahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2sae!4v1718649062476!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>




<!-- 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2895687731!2d-74.26055986835598!3d40.697668402590374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1562582305883!5m2!1sen!2sin"
              frameborder="0" style="border:0" allowfullscreen=""></iframe> -->
          </div>
        </div>
      </div>
    </div>
    <div class="map-content-9 form-bg-img">
      <div class="layer section-gap py-5">
        <div class="container py-lg-5">
          <div class="form">
            <h3 class="hny-title two text-center">Contact us</h3>
              <form action="{{ route('contact.send') }}" method="POST">
                  @csrf
              <div class="input-grids">
                <input type="text" name="name" id="w3lName" placeholder="Name">
                <input type="email" name="email" id="w3lSender" placeholder="Email" required="" />
                  <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number"
                         value="{{ old('phone_number') }}">
              </div>
              <div class="input-textarea">
                <textarea name="message" id="w3lMessage" placeholder="Message" required=""></textarea>
                  @error('message')
                  <span class="text-red-500">{{ $message }}</span>
                  @enderror
              </div>
              <button type="submit" class="btn">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //contacts -->

 @endsection
