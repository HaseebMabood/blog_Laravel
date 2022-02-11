@extends('layout')
@section('title','create-blog-post')
@section('head')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection
@section('main')
<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Update Category</h1>
        <!-- Contact Form -->
        <div class="contact-form">
            <form action="{{route('categories.update', $category)}}" method="POST" >
                @csrf
                @method('put')
                <!-- Name -->
                <label for="name"><span>Name</span></label>
                <input type="text" id="name" name="name" value="{{$category->name}}" />
                @error('name')
                    <p style="color: red ; margin-bottom: 25px;">{{$message}}</p>
                @enderror

                <!-- Button -->
                <input type="submit" value="Submit" />
            </form>
        </div>

        <div class="create-categories">
            <a href="{{route('categories.index')}}">Category List <span>&#8594;</span></a>
        </div>

    </section>
</main>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace( 'body' );
</script>
@endsection

