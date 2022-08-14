<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;
use App\Models\expiredModel;
use Illuminate\Support\Facades\Validator;

class CRUDController extends Controller
{
    function create(Request $request){

        $validator = Validator::make($request->all(), [
            'fd_code' => 'required|unique:tb_product',
            'fd_name' => 'required|string',
            'fd_type' => 'required|string',
            'fd_amount' => 'required|integer',
            'fd_price' => 'required|integer',
            'fd_expired_datetime' => 'required|date',
        ]); 

        $createProduct = productModel::create([
            'fd_code' => $request->fd_code,
            'fd_name' => $request->fd_name,
            'fd_type' => $request->fd_type,
            'fd_amount' => $request->fd_amount,
            'fd_price' => $request->fd_price,
            'fd_updated_datetime' => date('Y-m-d H:i:s'),
            'fd_created_datetime' => date('Y-m-d H:i:s')
        ]);
        $saveExpriced = expiredModel::create([
            'fd_code' => $request->fd_code,
            'fd_name' => $request->fd_name,
            'fd_type' => $request->fd_type,
            'fd_amount' => $request->fd_amount,
            'fd_expired_datetime' => $request->fd_expired_datetime,
            'fd_created_datetime' => date('Y-m-d H:i:s')
        ]);

        if($createProduct AND $saveExpriced){
            return response()->json([
                'status' => 'success',
                'message' => 'Create product success'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Create product failed'
            ]);
        }
    }

    function show(){

    }

    function update(){

    }

    function destroy(){

    }



}
