<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;
use App\Models\expiredModel;
use App\Models\sellerModel;
use App\Models\historyModel;
use Illuminate\Support\Facades\Validator;

class CRUDController extends Controller
{
    function create(Request $request){

        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'name' => 'required|string',
            'type' => 'required|string',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'exp' => 'required|date',
            'Pseller' => 'required|string',
            'Ptyseller' => 'required|string',
            'Phseller' => 'required|string'
        ]); 

        // echo $request->code . " code<br>";
        // echo $request->name . " name<br>";
        // echo $request->type . " type<br>";
        // echo $request->amount . " amount<br>";
        // echo $request->price . " price<br>";
        // echo $request->exp . " exp<br>";
        // echo $request->Pseller . " Pseller<br>";
        // echo $request->Ptyseller . "Ptyseller<br>";
        // echo $request->Phseller . "Phseller<br>";
        // echo $request->dateimport . "dateimport<br>";

        $createProduct = productModel::create([
            'fd_code' => $request->code,
            'fd_name' => $request->name,
            'fd_type' => $request->type,
            'fd_amount' => $request->amount,
            'fd_price' => $request->price,
            'fd_created_datetime' => $request->dateimport,
            'fd_updated_datetime' => $request->dateimport,
        ]);
        $saveExpriced = expiredModel::create([
            'fd_code' => $request->code,
            'fd_name' => $request->name,
            'fd_type' => $request->type,
            'fd_amount' => $request->amount,
            'fd_expired_datetime' => $request->exp,
            'fd_created_datetime' => $request->dateimport,
            'fd_updated_datetime' => $request->dateimport,
        ]);
        $saveseller = sellerModel::create([
            'fd_name' => $request->Pseller,
            'fd_phone' => $request->Phseller,
            'fd_type' => $request->Ptyseller,
            'fd_created_datetime' => $request->dateimport,
            'fd_updated_datetime' => $request->dateimport,
        ]);
        $saveHistory = historyModel::create([
            'fd_code' => $request->code,
            'fd_name' => $request->name,
            'fd_type' => $request->type,
            'fd_amount' => $request->amount,
            'fd_price' => $request->price,
            'fd_by' => $request->by,
            'fd_action' => 1,
            'fd_status' => 1,
            'fd_created_datetime' => $request->dateimport,
        ]);
        
        if($validator->fails()){
            return redirect('create')->withErrors($validator)->withInput();
        }

        if($createProduct && $saveExpriced && $saveseller && $saveHistory){
            return redirect('create')->with('success', 'Create Success');
        }


    }

    function show(){

    }

    function update($code, Request $request){
        $product = productModel::where('code', $code)->first();
        $expired = expiredModel::where('code', $code);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'exp' => 'required|date',
        ]);

        $product->name = $request->fd_name;
        $product->type = $request->fd_type;
        $product->amount = $request->fd_amount;
        $product->price = $request->fd_price;
        $product->fd_updated_datetime = date('Y-m-d H:i:s');

        $expired->name = $request->fd_name;
        $expired->type = $request->fd_type;
        $expired->amount = $request->fd_amount;
        $expired->exp = $request->fd_expired_datetime;
        $expired->fd_updated_datetime = date('Y-m-d H:i:s');
    } 

    function destroy($code){
        $product = productModel::find($code);
        $product->delete();

        return redirect('index')->with('success', 'Product deleted!');

    }



}
