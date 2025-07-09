<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $title = 'MapBiomas Landy - Contacts';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.contacts', compact('title', 'description'));
    }
}
