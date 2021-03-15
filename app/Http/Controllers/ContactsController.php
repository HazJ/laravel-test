<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\ContactRole;
use App\Http\Requests\CreateContact;
use App\Http\Requests\CreateContactAddress;
use App\Http\Requests\UpdateContact;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(20);
        // $contacts = Contact::with(['company', 'contactRole'])->paginate(20);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact;
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.create', compact('contact', 'companies', 'contactRoles'));
    }

    public function store(CreateContact $request)
    {
        $contact = Contact::create($request->only(['first_name', 'last_name', 'company_id', 'contact_role_id']));
        $contact->address()->create($request->only(['door', 'street', 'city', 'postcode'])); // See comments below

        return redirect('contacts')->with('alert', 'Contact created!');
    }

    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.edit', compact('contact', 'companies', 'contactRoles'));
    }

    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect('contacts')->with('alert', 'Contact updated!');
    }

    // Also possible to keep $request->all() and remove new address columns from the form request
    // and add them here, the contact address would then be $this->contactAddressRules
    // Adding another form request fails currently, since Laravel throws a redirect on success
    // Validator? Not in this Laravel version :(
    // I think this is fine for now though
    // It is also possible to do some magic but that would require knowing where the elements start and end
    // which can get messy so best to keep it simple for now
    public function contactAddressRules(): array
    {
        return [
            'door'     => 'required',
            'street'   => 'required',
            'city'     => 'required',
            'postcode' => 'required',
        ];
    }
}
