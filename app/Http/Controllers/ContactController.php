<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $contacts = Contact::latest()->get();

            return view("contacts.index", compact("contacts"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string',
            'prenoms' => 'required|string',
            'email' => 'required|unique:contacts|string',
            'tel' => 'required|string|max:10',
            'adresse' => 'required|string',
            'code_postal' => 'required|string',
            'ville' => 'required|string',
            'commentaire' => 'required|string',
        ]);

        $contact = Contact::create([
            "nom" => $request->nom,
            "prenoms" => $request->prenoms,
            "email" => $request->email,
            "tel" => $request->tel,
            "adresse" => $request->adresse,
            "code_postal" => $request->code_postal,
            "ville" => $request->ville,
            "commentaire" => $request->commentaire,
        ]);
        return redirect(route("contacts.edit", ['contact' => $contact->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        if (Auth::check()) {
            return view("contacts.show", compact("contact"));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
            return view("contacts.edit", compact("contact"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'nom' => 'required|string',
            'prenoms' => 'required|string',
            'tel' => 'required|string|max:10',
            'adresse' => 'required|string',
            'code_postal' => 'required|string',
            'ville' => 'required|string',
            'commentaire' => 'required|string',
        ]);

        $contact->update([
            "nom" => $request->nom,
            "prenoms" => $request->prenoms,
            "tel" => $request->tel,
            "adresse" => $request->adresse,
            "code_postal" => $request->code_postal,
            "ville" => $request->ville,
            "commentaire" => $request->commentaire,
        ]);

        return redirect(route("contacts.edit", ['contact' => $contact->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if (Auth::check()) {
            $contact->delete();

            return redirect(route('contacts.index'));
        }
        
    }
}
