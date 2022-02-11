<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    {{-- tailwind cdn for pagination design properly --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{-- bootstrap cdn --}}

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    <style>
        #posts{
            text-decoration: none;
        }
    </style>
    @yield('head')
    @yield('bootlink')
  </head>
  <body>
    <div id="wrapper">
      <!-- header -->
     @yield('header')

      <!-- sidebar -->
      <div class="sidebar">
        <span class="closeButton">&times;</span>
        {{-- <p class="brand-title"><a href="{{route('welcome.index')}}" >Haseeb Blog</a></p> --}}

        <div class="side-links" style="margin-top: 90px">
          <ul>
            <li><a class="{{Request::routeIs('welcome.index') ? 'active' : ''}}" href="{{route('welcome.index')}}">Home</a></li>
            <li><a class="{{Request::routeIs('blog.index') ? 'active' : ''}}" href="{{route('blog.index')}}">Blog</a></li>
            <li><a class="{{Request::routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">About</a></li>
            <li><a class="{{Request::routeIs('contact.index') ? 'active' : ''}}" href="{{route('contact.index')}}">Contact</a></li>

            @guest
            <li><a class="{{Request::routeIs('login') ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
            <li><a class="{{Request::routeIs('register') ? 'active' : ''}}" href="{{route('register')}}">Register</a></li>
            @endguest

            @auth
            <li><a class="{{Request::routeIs('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}">Dashboard</a></li>

            @endauth
        </ul>
        </div>

        <!-- sidebar footer -->
        <footer class="sidebar-footer" >
          <div >
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
          </div>

          <small>&copy 2022 Haseeb Blog</small>
        </footer>
      </div>
      <!-- Menu Button -->
      <div class="menuButton">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <!-- main -->
    @yield('main')
      <!-- Main footer -->
      <footer class="main-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
        <small>&copy 2022 Haseeb Blog</small>
      </footer>
    </div>

    <!-- Click events to menu and close buttons using javaascript-->
    <script>
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
    </script>
    @yield('scripts')
  </body>
</html>
