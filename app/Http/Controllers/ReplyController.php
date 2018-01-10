<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Thread;
use App\Reply;

class ReplyController extends Controller
{

   public function __construct() {
      // comment
      $this->middleware('auth', ['except' => ['show']]);
   }

   public function showCreateForm($thread_id) {
      // comment
      $thread = Thread::find($thread_id);
      return view('Reply.create', ['thread'=> $thread]);
   }

   public function create(Request $request, $thread_id) {
      $reply = new Reply(
         [  "body" => $request->get('inputBody'),
            "user_id" => Auth::user()->getId(),
            "thread_id" => $thread_id,
         ]
      );
      $reply->save();
      $reply->thread->increment_replies();
      return redirect("/threads/$thread_id");
   }

}
