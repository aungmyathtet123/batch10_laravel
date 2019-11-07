<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller

{

    public function __construct()
    //except,only using both oopsite
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

        $posts=POST::orderBy('title','desc')->get();
        //$posts=POST::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
       // dd($categories);
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validation
        $request->validate([

            'title'=>'required|min:5',
            'contact'=>'required|min:10',
            'photo'=>'required|mimes:jpeg,png',
            'category'=>'required'

            ]);


//file uploade

        if($request->hasfile('photo')){
            $photo=$request->file('photo');
            $name=time().','.$photo->getClientOriginalExtension();
            //$name=$photo->getClientOriginalName();
            $photo->move(public_path().'/storage/image/',$name);
            $photo='/storage/image/'.$name;
        }else{
            $photo='';
        }
//data insert
        $post=new Post();
        $post->title=request('title');
        $post->body=request('contact');
        $post->image=$photo;
        $post->category_id=request('category');
        $post->user_id=Auth::id();
        //$post->tatus=true;

        $post->save();
        //redirect
        return redirect()->route('firstpage');


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
        // $post=POST::where('status',1)->first();

        return view('post.detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=POST::find($id);//old value
        $categories=Category::all();
        return view('post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([

            'title'=>'required|min:5',
            'contact'=>'required|min:10',
            'photo'=>'sometimes|required|mimes:jpeg,png',
            'category'=>'required'

            ]);


//file uploade

        if($request->hasfile('photo')){
            $photo=$request->file('photo');
            $name=time().','.$photo->getClientOriginalExtension();
            //$name=$photo->getClientOriginalName();
            $photo->move(public_path().'/storage/image/',$name);
            $photo='/storage/image/'.$name;
        }else{
            $photo=request('oldphoto');
        }
//data update
        //upper $id put 
        //$post=new Post($id);
        $post=Post::find($id);
        $post->title=request('title');
        $post->body=request('contact');
        $post->image=$photo;
        $post->category_id=request('category');
        $post->user_id=Auth::id();
        //$post->tatus=true;

        $post->save();
        //redirect
        return redirect()->route('firstpage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=POST::FIND($id);
        $post->delete();
        return redirect()->route('firstpage');

    }
}
