<?php

namespace App\Http\Controllers;

use App\Blog;
/*for upload file*/
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
/*for upload file*/
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       /*$blog = new Blog();

       $data = array('id'=>5);
       $pppp  = $blog->getDataByid($data);

        echo "<pre>";
        print_r($pppp->all());
        echo "</pre>";
        die('__');*/
        /*$user = Auth::user();

        echo $user->id; echo "<br>";
        echo $user->user_type; echo "<br>";
        
        echo "<pre>";
        print_r($user);
        echo "</pre>";
        die("@@");*/

        
        $blog = Blog::latest()->paginate(10);
        return view('blog.index',compact('blog'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //die("pppp");
        return view('blog.create');
    }


    public function search(Request $request)
    {
        
        $id  = $request->get('id');

        $search  = $request->get('search');


        if (!empty($id)) {
            $blog = DB::table('blogs')->where('id', $id)->paginate(15);
        }else{
            $blog = DB::table('blogs')->where('title', 'like', '%'.$search.'%')->paginate(3);
        }

        return view('blog.index',compact('blog'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        //Blog::create($request->all());


        /**/

        //upload file
        $cover = $request->file('bookcover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        //upload file

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;

        $blog->status = "aa";
        /*$blog->category_ids = "aa";
        $blog->tag_ids = "aa";
        $blog->comment_status = "aa";*/

        /*$blog->mime = "aa";
        $blog->original_filename = "aa";
        $blog->filename = "aa";*/


        //upload file
        $blog->mime = $cover->getClientMimeType();
        $blog->original_filename = $cover->getClientOriginalName();
        $blog->filename = $cover->getFilename().'.'.$extension;
        //upload file

        $blog->save();
        /**/

        return redirect()->route('blog.index')
                        ->with('success','Blog created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
       return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        //upload file
        $cover = $request->file('bookcover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        //upload file

        /**/
        //$blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;

        //upload file
        $blog->mime = $cover->getClientMimeType();
        $blog->original_filename = $cover->getClientOriginalName();
        $blog->filename = $cover->getFilename().'.'.$extension;
        //upload file

        $blog->update();
        /**/

        //$blog->update($request->all());


        return redirect()->route('blog.index')
                        ->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route('blog.index')
                        ->with('success','Blog deleted successfully');
    }
}
