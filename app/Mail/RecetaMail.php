<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecetaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Receta Electrónica';

    public $receta;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receta, $pdf)
    {
        $this->receta = $receta;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('reportes.receta')
            ->attachData($this->pdf, 'receta.pdf', ['mime' =>
            'application/pdf']);
    }
}
