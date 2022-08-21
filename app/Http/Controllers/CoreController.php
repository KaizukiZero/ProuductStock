<?php

namespace App\Http\Controllers;

use App\Models\historyModel;
use App\Models\productModel;

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
    function list() {

        $loadProduct = productModel::all();
        return view('list', compact('loadProduct'));

    }

    public function history()
    {

        return view('history');

    }

    public function sellercontact()
    {

        return view('sellercontact');

    }

    public function create()
    {

        return view('create');

    }

}
