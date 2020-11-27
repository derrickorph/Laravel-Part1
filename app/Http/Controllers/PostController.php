<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function  getAllPost()
    {
        $posts=DB::table('posts')->get();
        return view('posts',compact('posts'));
    }
    public function  addPost()
    {
        return view('add-post');
    }
    public function  addPostSubmit( Request $request)
    {
        DB::table('posts')->insert([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        //With() pour créer une variable de session
        return back()->with('post_created','Post has been created successfully!');
    }

    public function  getPostById($id)
    {
        $post= DB::table('posts')->where('id',$id)->first();
        return view('single-post',compact('post'));
    }
    public function  deletePost($id)
    {
        $post= DB::table('posts')->where('id',$id)->delete();
        return back()->with('post_deleted','Post has been deleted successfully!');
    }
    public function  editPost($id)
    {
        $post= DB::table('posts')->where('id',$id)->first();

        return view('edit-post',compact('post'));
    }
    public function  updatePost(Request $request)
    {
        $post= DB::table('posts')->where('id',$request->id)->update([
           'title'=>$request->title,
           'body'=>$request->body
        ]);
        return back()->with('post_updated','Post has been updated successfully!');
    }
    public function  innerJoinClause()
    {
        $request= DB::table('participants')
        ->join('posts','participants.id','=','posts.participant_id')
        ->select('participants.name','posts.title','posts.body')
        ->get();


        return $request;
    }
    public function  leftJoinClause()
    {
        $request= DB::table('participants')
        ->leftJoin('posts','participants.id','=','posts.participant_id')
        ->get();
        return $request;
    }
    public function  rightJoinClause()
    {
        $request= DB::table('participants')
        ->rightJoin('posts','participants.id','=','posts.participant_id')
        ->get();
        return $request;
    }

    public function  getAllPostsUsingModel()
    {
        $posts= Post::all();
        return $posts;
    }
}
