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
            'title' => 'Contact Factory & Co Plaisir | 01 30 96 61 52 | Yvelines 78',
            'description' => 'Contactez Factory & Co Plaisir : 01 30 96 61 52. 1170 Av. Saint-Germain, Mon Grand Plaisir, 78370. Lun-Jeu/Dim 08h-21h30, Ven-Sam 08h-23h. Terrasse, Wi-Fi.',
            'keywords' => 'contact factory co plaisir 78, adresse mon grand plaisir yvelines, téléphone restaurant plaisir, horaires factory co plaisir',
            'canonical' => route('contact'),
        ];

        return view('pages.contact', compact('openingHours', 'seo'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'sujet' => 'required|string|max:100',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'prenom.required' => 'Votre prénom est requis.',
            'nom.required' => 'Votre nom est requis.',
            'email.required' => 'Votre adresse e-mail est requise.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'sujet.required' => 'Veuillez choisir un sujet.',
            'message.required' => 'Votre message est requis.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ]);

        // TODO: Envoyer l'e-mail via Mail::to('contact@factoryandco.com')->send(new ContactMail($validated));

        return redirect()->route('contact')
            ->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons sous 4 heures.');
    }
}
