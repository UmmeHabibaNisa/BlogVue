<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request)
    {

        $blog = new Blog;
        // $blog->user_id= 0;

        $blog->user_id= 1;
        // return response()->json( Auth::id());
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image =$request->image;
        $blog->save();
        return response()->json($blog);

    }
    public function index(Request $request)
    {
        $data = Blog::all();
        return response()->json($data);


    }
    public function getOne(Request $request, $id)

    {
        $blog = Blog::where('id', '=', $id)->firstOrFail();
        return response()->json($blog);

        // $data = Blog;
        // return response()->json($data);


    }
    public function fileStore(Request $request)
    {
        $upload_path = public_path('upload');
        $file_name = $request->file->getClientOriginalName();
        $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move($upload_path, $generated_new_name);

        return response()->json(['saveImage' =>  $generated_new_name]);
    }
    public function destroy(Request  $request) {

        $res=Blog::where('id',$request->id)->delete();
        return response()->json('successfully deleted');
    }
    public function update(Request $request, $id)
    {

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image =$request->image;
        $blog->update($blog);


        return response($blog);
    }


}
