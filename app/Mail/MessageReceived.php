<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Impresion de tarjetas de presentacion";
    protected $archivos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($archivos)
    {
        $this->archivos = $archivos;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-received')->attach('http://socasesores.com/material/public/archivos/tarjetas/'.$this->archivos["tarjeta"])->attach('http://socasesores.com/material/public/archivos/tarjetas/'.$this->archivos["pago"]);
    }
    
    
}
