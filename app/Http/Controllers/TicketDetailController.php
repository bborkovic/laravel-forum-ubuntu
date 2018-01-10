<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\TicketDetail;

class TicketDetailController extends Controller {

   public function __construct() {
      $this->middleware('auth');
   }

   public function index($ticket_id) {
      $user_id = Auth::user()->getId();
      $ticket_details = DB::table('ticket_details')
            ->join('users', 'users.id', '=', 'ticket_details.user_id')
            ->select('ticket_details.*', 'users.email')
            ->where( [['user_id','=',$user_id],['ticket_id','=',intval($ticket_id)]] )
            ->get();
      return view('TicketDetail.index', [ 'ticket_details' => $ticket_details, 'ticket_id' => $ticket_id ]);
      // dd($ticket_details);

   }

   public function showCreateForm($ticket_id) {
      return view('TicketDetail.create', [ 'ticket_id' => $ticket_id ]);
   }

   public function create(Request $request, $ticket_id) {
      $ticketDetail = new TicketDetail();
      $ticketDetail->ticket_id = $ticket_id;
      $ticketDetail->user_id = Auth::user()->getId();
      $ticketDetail->action = $request->get('inputAction');
      $ticketDetail->action_description = $request->get('inputDescription');
      $ticketDetail->save();
      return redirect()->action( 'TicketDetailController@index', ['ticket_id' => $ticket_id])->with('status', 'Action Saved!');
   }

}
