<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;
use App\Models\expiredModel;
use App\Models\sellerModel;
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
        ]); 

        $createProduct = productModel::create([
            'fd_code' => $request->code,
            'fd_name' => $request->name,
            'fd_type' => $request->type,
            'fd_amount' => $request->amount,
            'fd_price' => $request->price,
            'fd_updated_datetime' => '0000-00-00 00:00:00',
            'fd_created_datetime' => $request->import_datetime,
        ]);
        $saveExpriced = expiredModel::create([
            'fd_code' => $request->code,
            'fd_name' => $request->name,
            'fd_type' => $request->type,
            'fd_amount' => $request->amount,
            'exp' => $request->exp,
            'fd_updated_datetime' => '0000-00-00 00:00:00',
            'fd_created_datetime' => $request->import_datetime,
        ]);
        $saveseller = sellerModel::create([
            'fd_name' => $request->name,
            'fd_phone' => $request->phone,
            'fd_type' => $request->type,
            'fd_updated_datetime' => '0000-00-00 00:00:00',
            'fd_created_datetime' => $request->import_datetime,
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
