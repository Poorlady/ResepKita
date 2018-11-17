<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['search','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'ingredients'=>'required',
            'directions'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        //cover_image
        if ($request->hasFile('cover_image')) {
            //get the filename
            $fileNameFull = $request->file('cover_image')->getClientOriginalName();
            //get the Name 
            $fileName = pathinfo($fileNameFull, PATHINFO_FILENAME);
            //get the ext
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store]
            $fileNameToStore = $fileName.'_'. time().'_'.auth()->user()->id.'.'.$fileExt;
            //store
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }
        

        $ingredients = str_replace(array("\r\n"), ',', $request->input('ingredients'));
        $directions = str_replace(array("\r\n"), ',', $request->input('directions'));

        $post= new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->ingridients = $ingredients;
        $post->directions = $directions;
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //check user id
        if(auth()->user()->id !== $post->user_id){ 
            return redirect('/')->with('error','Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'ingredients'=>'required',
            'directions'=>'required'
        ]);
        $ingredients = str_replace(array("\r\n"), ',', $request->input('ingredients'));
        $directions = str_replace(array("\r\n"), ',', $request->input('directions'));

        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->ingridients = $ingredients;
        $post->directions = $directions;
        $post->save();

        return redirect('/')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //check user id
        if(auth()->user()->id !== $post->user_id){ 
            return redirect('/')->with('error','Unauthorized Page');
        }
        $post->delete();
        return redirect('/')->with('success','Post Deleted');
    }

    public function search(Request $req){
        if($req->search == ""){
            $datas = Post::paginate(9);
            return view('posts.index')->with('datas',$datas);
        }else{
            $datas = Post::where('title','LIKE','%'.$req->search.'%')->paginate(9);
            return view('posts.index')->with('datas',$datas);
        }
    }
}
