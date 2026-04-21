<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $seo = [
            'title' => 'Contact Factory & Co Plaisir 78 | 01 30 96 61 52',
            'description' => 'Contactez Factory & Co Plaisir : 01 30 96 61 52. 1170 Av. Saint-Germain, Mon Grand Plaisir, 78370. Ouvert 7j/7 dès 8h. Réponse sous 4h.',
            'keywords' => 'contact factory co plaisir 78, adresse mon grand plaisir yvelines, téléphone restaurant plaisir, horaires factory co plaisir',
            'canonical' => route('contact'),
        ];

        return view('pages.contact', compact('openingHours', 'seo'));
    }

    public function send(Request $request)
    {
        // Honeypot: si ce champ est rempli, c'est un bot
        if ($request->filled('website')) {
            return redirect()->route('contact')
                ->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons sous 4 heures.');
        }

        $validated = $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'sujet' => ['required', Rule::in(['allergenes', 'recrutement', 'franchise', 'avis', 'autre'])],
            'message' => 'required|string|min:10|max:2000',
        ], [
            'prenom.required' => 'Votre prénom est requis.',
            'nom.required' => 'Votre nom est requis.',
            'email.required' => 'Votre adresse e-mail est requise.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'sujet.required' => 'Veuillez choisir un sujet.',
            'sujet.in' => 'Le sujet sélectionné est invalide.',
            'message.required' => 'Votre message est requis.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ]);

        try {
            Mail::to('contact@factoryandco.com')->send(new ContactMail($validated));
        } catch (\Throwable $e) {
            Log::error('Contact form email error: '.$e->getMessage());

            return redirect()->route('contact')
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi. Merci de réessayer ou de nous appeler au 01 30 96 61 52.');
        }

        return redirect()->route('contact')
            ->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons sous 4 heures.');
    }
}
