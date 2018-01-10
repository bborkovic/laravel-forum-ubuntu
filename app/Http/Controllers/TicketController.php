<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Http\Requests\TicketCreateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Util;

class TicketController extends Controller
{
   public function __construct() {
      $this->middleware('auth');
      $this->middleware('isCustomer');
   }

   public function index() {
      $mytickets = Ticket::where('user_id', Auth::user()->getId())->orderBy('created_at', 'desc')->get();
      return view('Ticket.index', [ 'tickets' => $mytickets ]);
      // Ovo je funkcija koja nema previse mjesta da se to vidi ili mozda i ima!!
       // Ako je tome tako onda to bas i nije to!!
   }

   public function showCreateForm() {
    //
    return view('Ticket.create');
}

   public function showEditForm($id) {
      $ticket = Ticket::findOrFail($id);
      return view('Ticket.create', ['ticket' => $ticket ]);
   }

   public function create(TicketCreateFormRequest $request) {
      $ticket = new Ticket(
         [  "title" => $request->get('inputTitle'),
            "description" => $request->get('inputDescription'),
            "user_id" => Auth::user()->getId(),
         ]
      );
      $ticket->save();
      return "Ticket saved";
   }


}
