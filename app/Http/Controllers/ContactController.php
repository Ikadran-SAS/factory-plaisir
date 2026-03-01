<?php

namespace App\Http\Controllers;

use App\Models\OpeningHour;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $seo = [
            'title'       => 'Contact – Factory & Co Toulouse-Blagnac | Aéroport Hall C',
            'description' => 'Contactez Factory & Co Toulouse-Blagnac. Adresse : Aéroport Toulouse-Blagnac, Zone réservée Hall C, Portes 30-36, 31700 Blagnac. Ouvert 7j/7 de 07h00 à 22h30.',
            'keywords'    => 'contact factory and co toulouse, adresse factory co blagnac, téléphone restaurant aéroport toulouse',
            'canonical'   => route('contact'),
        ];

        return view('pages.contact', compact('openingHours', 'seo'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'prenom'  => 'required|string|max:100',
            'nom'     => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'sujet'   => 'required|string|max:100',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'prenom.required'  => 'Votre prénom est requis.',
            'nom.required'     => 'Votre nom est requis.',
            'email.required'   => 'Votre adresse e-mail est requise.',
            'email.email'      => 'Veuillez saisir une adresse e-mail valide.',
            'sujet.required'   => 'Veuillez choisir un sujet.',
            'message.required' => 'Votre message est requis.',
            'message.min'      => 'Votre message doit contenir au moins 10 caractères.',
        ]);

        // TODO: Envoyer l'e-mail via Mail::to('contact@factoryandco.com')->send(new ContactMail($validated));

        return redirect()->route('contact')
            ->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons sous 4 heures.');
    }
}
