<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;





class AjoutProduit extends Mailable
{
    use Queueable, SerializesModels;
    public $produit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produit)
    {

        $this->produit = $produit;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Un nouveau produit sur OpenShop")->from("maketing@open-shop.com" , "Service Marketing de OpenShop")->markdown('emails.produits.ajout-produit');
    }
}
