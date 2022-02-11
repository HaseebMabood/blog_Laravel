<!DOCTYPE html>
<html lang="en">
    @extends('layout')
    @section('title','contact')
{{-- <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Alphayo - Alphayo Blog</title>
  <!-- Css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head> --}}

<body>
  <div id="wrapper">
    <!-- sidebar -->
    {{-- <div class="sidebar">
      <span class="closeButton">&times;</span>
      <p class="brand-title"><a href="/">Alphayo Blog</a></p>

      <div class="side-links">
        <ul>
          <li><a class="active" href="/">Home</a></li>
          <li><a href="/blog">Blog</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
      </div>
      <!-- sidebar footer -->
      <footer class="sidebar-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>

        <small>&copy 2021 Alphayo Blog</small>
      </footer>
    </div> --}}
    <!-- Menu Button -->
    {{-- <div class="menuButton">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div> --}}
    <!-- main -->
    @section('main')
    <main class="container">
        <section id="contact-us">
          <h1 style="color: rgb(153, 212, 44)"><b>Get in Touch!</b></h1>
<br>
@include('include.flash-message')
<br>

          <!-- contact info -->
          <div class="container">
            <div class="contact-info">
              <div class="specific-info">
                <i class="fas fa-home"></i>
                <div>
                  <p class="title">Defence Colony, Shahbaz Garhi</p>
                  <p class="subtitle">Mardan, Pakistan</p>
                </div>
              </div>
              <div class="specific-info">
                <i class="fas fa-phone-alt"></i>
                <div>
                  <a href="">+92-3439433206 </a>
                  <br />
                  <a href="">+92-100470449</a>

                  <p class="subtitle">Mon to Fri 9am-6pm</p>
                </div>
              </div>
              <div class="specific-info">
                <i class="fas fa-envelope-open-text"></i>
                <div>
                  <a href="haseebmabood2017@gmail.com">
                    <p class="title">haseebmabood2017@gmail.com</p>
                  </a>
                  <p class="subtitle" style="color: greenyellow">Send us your query anytime!</p>
                </div>
              </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
              <form action="{{route('contact.store')}}" method="post">
                @csrf
                <!-- Name -->
                <label for="name"><span>Name</span></label>
                <input type="text" id="name" name="name" value="" />

                @error('name')
                <p style="color: red ; margin-bottom: 25px;">{{$message}}</p>
            @enderror

                <!-- Email -->
                <label for="email"><span>Email</span></label>
                <input type="text" id="email" name="email" value="" />

                @error('email')
                <p style="color: red ; margin-bottom: 25px;">{{$message}}</p>
            @enderror


                <!-- Subject -->
                <label for="subject"><span>Subject</span></label>
                <input type="text" id="Subject" name="subject" value="" />

                @error('subject')
                <p style="color: red ; margin-bottom: 25px;">{{$message}}</p>
            @enderror


                <!-- Message -->
                <label for="message"><span>Message</span></label>
                <textarea id="message" name="message"></textarea>

                @error('message')
                <p style="color: red ; margin-bottom: 25px;">{{$message}}</p>
            @enderror


                 <!-- Button -->
                <input type="submit" value="Send" />
              </form>
            </div>
          </div>
        </section>
      </main>
    @endsection

    <!-- Main footer -->
    {{-- <footer class="main-footer">
      <div>
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
      </div>
      <small>&copy 2021 Alphayo Blog</small>
    </footer> --}}
  </div>

  <!-- Click events to menu and close buttons using javaascript-->
  {{-- <script>
    document
      .querySelector(".menuButton")
      .addEventListener("click", function () {
        document.querySelector(".sidebar").style.width = "100%";
        document.querySelector(".sidebar").style.zIndex = "5";
      });

    document
      .querySelector(".closeButton")
      .addEventListener("click", function () {
        document.querySelector(".sidebar").style.width = "0";
      });

      // setTimeout(() => {alert('Welcome')}, 500);
  </script> --}}
</body>

</html>
