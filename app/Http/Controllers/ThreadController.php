<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Thread;
use App\Reply;
use App\Category;

class ThreadController extends Controller
{

   public function __construct() {
      // comment
      $this->middleware('auth', ['except' => ['show']]);
   }

   public function show($thread_id) {
      $thread = Thread::find($thread_id);
      $replies = $thread->replies()->orderBy('created_at','asc')->with('user')->paginate(5);
      return view('Thread.show', ['thread' => $thread, 'replies' => $replies] );
   }

   public function showCreateForm($category_id) {
      // comment
      $category = Category::find($category_id);
      return view('Thread.create', ['category'=> $category]);
   }

   public function create(Request $request, $category_id) {
      DB::beginTransaction();
      try {
         $thread = new Thread(
            [  "name" => $request->get('inputName'),
               "user_id" => Auth::user()->getId(),
               "category_id" => $category_id,
               "replies" => 1,
            ]
         );
         $thread->save();
         $reply = new Reply(
            [  "body" => $request->get('inputBody'),
               "user_id" => Auth::user()->getId(),
               "thread_id" => $thread->id,
            ]
         );
         $reply->save();
         DB::commit();
         return redirect("/threads/$thread->id");
      } catch (\Exception $e) {
         DB::rollback();
         return "Thread was not saved";
      }
   }


}
