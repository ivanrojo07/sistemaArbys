<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Transaction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCotizacion extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction, $pdf)
    {
        $this->transaction = $transaction;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->transaction->cliente->vendedor->empleado->email)
                    ->markdown('mail.transaction')
                    ->attachData($this->pdf->output(), 'cotizacion'.date('d-m-Y')." ". $this->transaction->cliente->tipo == "Moral" ? $this->transaction->cliente->razon:$this->transaction->cliente->nombre.'.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
