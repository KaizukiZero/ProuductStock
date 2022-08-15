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

        $covert_date = strtotime($request->dateimport);
        $pid = $request->code . $request->type . $covert_date;

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
 
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $createProduct = new productModel;
        $saveExpired = new expiredModel;
        $saveSeller = new sellerModel;
        $saveHistory = new historyModel;
        
        // Create Product
        $createProduct->fd_code = $request->code;
        $createProduct->fd_name = $request->name;
        $createProduct->fd_type = $request->type;
        $createProduct->fd_amount = $request->amount;
        $createProduct->fd_price = $request->price;
        $createProduct->fd_updated_datetime = $request->dateimport;
        $createProduct->fd_created_datetime = $request->dateimport;
        
        // Save Expired
        $saveExpired->fd_code = $request->code;
        $saveExpired->fd_name = $request->name;
        $saveExpired->fd_type = $request->type;
        $saveExpired->fd_amount = $request->amount;
        $saveExpired->fd_expired_datetime = $request->exp;
        $saveExpired->fd_created_datetime = $request->dateimport;
        $saveExpired->fd_updated_datetime = $request->dateimport;

        // Save Seller
        $saveSeller->fd_name = $request->Pseller;
        $saveSeller->fd_type = $request->Ptyseller;
        $saveSeller->fd_phone = $request->Phseller;
        $saveSeller->fd_created_datetime = $request->dateimport;
        $saveSeller->fd_updated_datetime = $request->dateimport;

        // Save History
        $saveHistory->fd_pid = $pid;
        $saveHistory->fd_code = $request->code;
        $saveHistory->fd_name = $request->name;
        $saveHistory->fd_type = $request->type;
        $saveHistory->fd_amount = $request->amount;
        $saveHistory->fd_price = $request->price;
        $saveHistory->fd_by = $request->by;
        $saveHistory->fd_action = 1;
        $saveHistory->fd_status = 1;
        $saveHistory->fd_created_datetime = $request->dateimport;

        
        $checkproduct = productModel::where('fd_code',$request->code)->count();
        $checkexpired = expiredModel::where('fd_code',$request->code)->count();
        $checkseller = sellerModel::where('fd_phone',$request->Phseller)->count();
        $checkhistory = historyModel::where('fd_pid',$pid)->count();

        //Debug
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
        // echo $pid . " pid<br>";
        // echo $covert_date . " covert_date<br>";
        // echo $checkproduct . " product<br>";
        // echo $checkexpired . " expired<br>";
        // echo $checkseller . " seller<br>";
        // echo $checkhistory . " history<br>";
        //End Debug
        
        if($checkhistory == 0){
            $saveHistory->save();
        }

        if($checkproduct != 0 || $checkexpired != 0 || $checkseller != 0){
            return back()->withErrors('มีข้อมูลของ สินค้า,วันหมดอายุ และ ผู้ขายอยู่แล้ว ')->withInput()
                         ->with('success','สร้างประวัติการนำเข้าสินค้าเรียบร้อย');;
        }else{
            $createProduct->save();
            $saveExpired->save();
            $saveSeller->save();
            return back()->with('success','Data has been added');
    
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
