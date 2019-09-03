<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'name'        => 'required',
            'email'       =>   'required|email',
            'birthday'    => 'required',
            'company'     => 'required',
        ]);

        Contact::create([
            'name'      => request('name'),
            'email'     => request('email'),
            'birthday'  => request('birthday'),
            'company'   => request('company'),
        ]);
    }
}
