<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ContactsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('backEnd.admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'phone_number' => 'required|max:10',
            'address' => 'required|max:255', 
        ]);

        Contact::create([
            'email' => request('email'),
            'phone_number' => '(+994) ' . request('phone_number'),
            'address' => request('address'),
        ]);

        Session::flash('message', 'Contact added!');
        Session::flash('status', 'success');

        return redirect()->route('contact_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);

        return view('backEnd.admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);

        return view('backEnd.admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Contact $contact, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'phone_number' => 'required|max:10',
            'address' => 'required|max:255', 
        ]);

        $contact->update([
            'email' => request('email'),
            'phone_number' => '(+994) ' . request('phone_number'),
            'address' => request('address'),
        ]);

        Session::flash('message', 'Contact updated!');
        Session::flash('status', 'success');

        return redirect()->route('contact_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function delete(Contact $contact)
    {
        $contact->delete();

        Session::flash('message', 'Contact deleted!');
        Session::flash('status', 'success');

        return redirect()->route('contact_index');
    }

}
