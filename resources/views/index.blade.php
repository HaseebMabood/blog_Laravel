<!DOCTYPE html>
<html lang="en">
    @extends('layout')
    @section('title','welcome')
  {{-- <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Alphayo Blog</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head> --}}


  <body>
    <div id="wrapper">
      <!-- header -->
     @section('header')
     <header class="header" style="background-image: url({{asset('images/2.jpg')}})">
        <div class="header-text">
          <h1>Haseeb Blog</h1>
          <h4>Home of verified news...</h4>
        </div>
        <div class="overlay"></div>
      </header>
     @endsection

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
        <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">
            @foreach ($posts as $post)
            <div class="card-blog-content">
              <img src="{{asset($post->imagePath)}}" alt="" />
              <p>
                {{$post->created_at->diffForhumans()}}
                <span>Written By {{$post->user->name}}</span>
              </p>
              <h4>
                <a href="{{route('blog.show',$post)}}">{{$post->title}}</a>
              </h4>
            </div>
            @endforeach

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
    </script> --}}
  </body>
</html>
