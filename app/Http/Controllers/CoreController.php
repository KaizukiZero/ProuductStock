<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
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

        Paginator::useBootstrapFive();
        $check = productModel::paginate()->getOptions();
        $result = productModel::where('fd_status', '=',1)->orderBy('fd_created_datetime', 'desc')->paginate(10);
        // return $check;
        

        return view('list', compact('result'));
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
