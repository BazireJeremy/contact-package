<?php

namespace Milleniumprod\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $result = 2;
        return view('contact::contact', compact('result'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request, AdminRecipients $recipient)
    {
        $contact = new Contact($request->all());
        $contact->status  = 'Untreated';

        $contact->save();

        $recipient->notify(new ContactMessage($request));

        //return back()->with('success', 'Votre demande de contact a bien été envoyé.');
    }
}
