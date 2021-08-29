<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class PostController extends Controller
{

    public function __construct()
    {

            $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        //dd($posts);
       
       // var_dump($posts);
        return view('posts/index',[
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(CreateValidationRequest $request)
    //change it for validation request function
    public function store(Request $request)
    {
        // $posts =new post;
        // $posts->title=$request->input('title');
        // $posts->founded=$request->input('founded');
        // $posts->status=2;
        // $posts->user_id=2;
        // $posts->image='helloo/jdhfjdf/d.jpg';
        // $posts->description=$request->input('description');
        // $posts->save();
        // return redirect('/');
        //dd($request->all());
           // $request->validated();

           //method we usde on $request
           //guessExtension()
           //getMimeType()
           //store()
           //asStore()
           //storePublicly()
           //move()
           //getClientOriginalName()
           //getClientMimeType()
           //guessClientExtension()
           //getSize()
           //getError() if correct return 0
           //isValid return true/false
          // $test=$request->file('image')->getError();
          // dd($test);
           $request->validate([
                    'title'=>'required',
                    'founded'=>'required|integer|min:0|max:2021',
                    'description'=>'required',
                    'image'=>'required|mimes:png,jpg,jpeg|max:5048'

           ]);

           $newImageName =time().'-'.$request->title.'.'.$request->image->extension();
           
           $request->image->move(public_path('images'),$newImageName);
           //dd($test);

            // $request->validate([
            //     //'title'=>'required|unique:posts,title',
            //     'title'=>new Uppercase,
            //     'founded'=>'required|integer|min:0|max:2021',
            //     'description'=>'required'
            // ]);
            //if valid it will create a post
            //if not valid throw validation exception
        $posts=Post::create([
            'title'=>$request->input('title'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description'),
            'user_id'=>'735',
            'image'=>$newImageName,
            'status'=>'34'
        ]);
        return redirect('/posts');


        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //      'founded'=>'required|integer|min:0|max:2021',
        //      'image'=>'required|mimes:png,jpg,jpeg'

        // ]);

        // $newImageName=time().'-'.$request->name.'.'.$request->image->extension();
        // $request->image->move(public_path('images'),$newImageName);

        // $posts= Post::create([
        //     'title'=> $request->input('title'),
        //     'founded'=>$request->input('founded'),
        //     'description'=>$request->input('description'),
        //     'image_path'=>$newImageName,
        //     'user_id'=>auth()->user()->id

        // ]);
        // return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
       //var_dump($post->products);
       $products=Product::find($id);
        return view('posts.show')->with('post',$post);
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        // /var_dump($post);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {

        $request->validated();
        $posts=Post::where('id',$id)
        ->update([
            'title'=>$request->input('title'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description'),
            'user_id'=>auth()->user()->id,
            'image'=>'test.jpg',
            'status'=>'34'
        ]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function destroy(Post $post)
    {
      
        $post->delete();
        return redirect('/posts');
    }
}
