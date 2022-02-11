<!DOCTYPE html>
<html lang="en">
    @extends('layout')
    @section('title','blog')
{{-- <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog - Alphayo Blog</title>

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
    <h2 class="header-title" style="color: rgb(153, 212, 44)"><b>All Blog Posts</b></h2>
    <div class="searchbar">
      <form action="">
        <input type="text" placeholder="Search..." name="search" />

        <button type="submit">
          <i class="fa fa-search"></i>
        </button>

      </form>
    </div>
    <div class="categories">
      <ul>

        @foreach ($categories as $category)
        <li><a href="{{route('blog.index',['category'=>$category->name])}}">{{$category->name}}</a></li>
        @endforeach
      </ul>
    </div>

    @include('include.flash-message')

    <section class="cards-blog latest-blog">

      @forelse ($posts as $post)
      <div class="card-blog-content">
          @auth
              @if (auth()->user()->id === $post->user->id)
              <div class="post-buttons">
                <a href="{{route('blog.edit', $post)}}" class="btn btn-success">Edit</a>
                <form action="{{route('blog.destroy', $post)}}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
              @endif
          @endauth
        <img src="{{asset($post->imagePath)}}" alt="" />
        <p>
          {{$post->created_at->diffForhumans()}}
          <span>Written By {{$post->user->name}}</span>
        </p>
        <h4>
          <a href="{{route('blog.show',$post)}}">{{$post->title}}</a>
        </h4>
      </div>
      @empty
        <h3>Sorry! there is no blog.</h3>
      @endforelse

    </section>

     <!-- pagination -->
     {{-- <div class="pagination" id="pagination">
        <a href="">&laquo;</a>
        <a class="active" href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
        <a href="">&raquo;</a>
      </div> --}}
      {{$posts->links('pagination::default')}}
      <br>
    {{-- <!-- Main footer -->
    <footer class="main-footer">
      <div>
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
      </div>
      <small>&copy 2021 Alphayo Blog</small>
    </footer> --}}
  </main>
   @endsection
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
