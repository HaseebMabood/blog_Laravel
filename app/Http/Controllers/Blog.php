<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;

class Blog extends Controller
{

    // middleware function is used to authorize/secure all the function that is supposed to be secured from unauthorize user
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index(Request $request){
        if ($request->search) {
            $posts = Post::where('title','like','%' . $request->search . '%')->
            orWhere('body','like','%' . $request->search . '%')->latest()->paginate(4);
        }
        elseif ($request->category) {
            $posts = Category::where('name',$request->category)->firstOrFail()->posts()->paginate(4)->withQueryString();
        }

        else
        {
            $posts = Post::latest()->paginate(4);
        }

        $categories = Category::all();
        return view('blog-post.blog', compact('posts','categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('blog-post.create-blog-post',compact('categories'));
    }


    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required',
            'category_id'=> 'required'
        ]);

        $title = $request->input('title');
        $category_id = $request->input('category_id');

        if (Post::latest()->first()!==null) {
            $postid = Post::latest()->first()->id+1;
        }
        else{
            $postid = 1;
        }

        $slug = Str::slug($title , '-'). '-' . $postid;

        $user_id = Auth::user()->id;
        $body = $request->input('body');

        $imagePath = 'storage/' . $request->file('image')->store('postsimages' , 'public');

        // now storing data

        $data = new Post();

        $data->title = $title;
        $data->category_id = $category_id;
        $data->slug = $slug;
        $data->user_id = $user_id;
        $data->body = $body;
        $data->imagePath = $imagePath;
        $data->save();

        return redirect()->back()->with('success' , 'Post submitted successfully!');
    }


    public function show(Post $post){ //this is route binding in which we use the model and a variable which we have adding in this->>  Route::get('/blog/{post:slug}', [Blog::class,'show'])->name('blog.show');
        $category = $post->category;

        $relatedPosts = $category->posts()->where('id','!=',$post->id)->latest()->take(3)->get();
        return view('blog-post.show',compact('post', 'relatedPosts'));
    }


    public function edit(Post $post){

        if (auth()->user()->id !== $post->user->id) {
            abort(403);
        }

    return view('blog-post.edit-blog-post',compact('post'));
}


public function update(Request $request,Post $post){

    $request->validate([
        'title' => 'required',
        'image' => 'required | image',
        'body' => 'required'
    ]);

    $title = $request->input('title');

    $postid = $post->id;
    $slug = Str::slug($title , '-'). '-' . $postid;

    $body = $request->input('body');

    $imagePath = 'storage/' . $request->file('image')->store('postsimages' , 'public');

    // now updating data

    $post->title = $title;
    $post->slug = $slug;
    $post->body = $body;
    $post->imagePath = $imagePath;
    $post->save();

    return redirect()->back()->with('success' , 'Post Updated successfully!');
}


        public function destroy(Post $post){

           $post->delete();

           return redirect()->back()->with('success' , 'Post Deleted successfully!');
        }


}
