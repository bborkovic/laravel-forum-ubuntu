<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
   protected $table_name = 'ticket_details';

    public function foo() {
        echo "Ovo je druga funkcija koja to mozda i nije";
    }
}
