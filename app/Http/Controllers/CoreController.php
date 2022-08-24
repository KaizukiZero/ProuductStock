<?php

namespace App\Http\Controllers;

use App\Models\historyModel;
use App\Models\productModel;
use Illuminate\Pagination\Paginator;

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
        $result = productModel::where('fd_status', '=', 1)->orderBy('fd_created_datetime', 'desc')->paginate(10);
        $check = $result->count();

        return view('list', compact('result','check'));
    }

    public function history()
    {
        Paginator::useBootstrapFive();
        $result = historyModel::where('fd_status', '=', 1)->orderBy('fd_created_datetime', 'desc')->paginate(10);
        $check = $result->count();
        
        return view('history', compact('result','check'));
        

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
