<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {

        $comments = Comment::all()->load('posts');
        return view('admin.comment.index', compact('comments'));


    }

    public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id){
            flash()->info('Info', 'You cannot change a comment that is not yours');
            return redirect()->back();
        }
        $comm = $comment->delete();
        if($comm){
            flash()->success('Success', 'Comment deleted');
        }else{
            flash()->error('Failed', 'Comment couldnt deleted');
        }
        return redirect()->route('admin.comment.index');

    }
}
