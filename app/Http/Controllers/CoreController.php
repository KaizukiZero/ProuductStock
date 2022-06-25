<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function index()

    {

        return view('index');

    }
    public function edit()

    {

        return view('edit');

    }
    public function view()

    {

        return view('view');

    }
    public function list()

    {

        return view('list');

    }

    public function history()

    {

        return view('history');

    }

    public function salercontact()

    {

        return view('salercontact');

    }

    public function create()

    {

        return view('create');

    }




}
