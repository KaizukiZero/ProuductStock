<?php

namespace App\Http\Controllers;

use App\Models\expiredModel;
use App\Models\historyModel;
use App\Models\productModel;
use App\Models\sellerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CRUDController extends Controller
{
    public function create(Request $request)
    {

        $covert_date = strtotime($request->dateimport);
        $pid = $request->code . $request->type . $covert_date;

        $validator = Validator::make($request->all(), [
            'action' => 'required|string',
            'code' => 'required|string',
            'name' => 'required|string',
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'type' => 'required|string',
            'SellerName' => 'required|string',
            'SellerType' => 'required|string',
            'SellerPhone' => 'required|string',
        ]);

        $validated = $validator->validate();

        if ($request->action == "Create") {

            $createProduct = productModel::CreateProduct($request);
            if ($createProduct != 1) {
                return back()->withErrors('Product already exist')->withInput();
            }

            $createExp = expiredModel::CreateExp($request);
            if ($createExp != 1) {
                return back()->withErrors('Product Expired already exist')->withInput();
            }

            $createHistory = historyModel::CreateHistory($pid, $request);
            if ($createHistory != 1) {
                return back()->withErrors('History already exist')->withInput();
            }

            $createSeller = sellerModel::CreateSeller($request);
            
            return back()->with('success', 'Product Craete Success!');
        }

        if ($request->action == "Import") {
            // Import Product
            $res = $this->edit($request, $request->code);
            return $res;
        }

        //Debug
        // echo $request->action . " Action<br>";
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

    }

    public function show($id)
    {
        $getProduct = productModel::where('fd_id',$id);
    }

    public function edit(Request $request, $id)
    {

        $covert_date = strtotime($request->dateimport);
        $pid = $request->code . $request->type . $covert_date;

        $check = productModel::where('fd_code', $id)->count();
        // 0 = count 1 / 1 = count 0
        if ($check != 1){
            return back()->withErrors('Product No Data')->withInput();
        }

        $getAmount = productModel::find($id)->fd_amount;
        $covert = floatval($request->amount);
        $updateAmount = $covert + $getAmount;

        $updateProduct = productModel::where('fd_code', $id)->update([
            'fd_name' => $request->name,
            'fd_amount' => $updateAmount,
            'fd_price' => $request->price,
            'fd_type' => $request->type,
            'fd_updated_datetime' => $request->dateimport,
        ]);

        $check = expiredModel::where('fd_code', $id)->count();
        
        if ($check != 1){
            return back()->withErrors('Expired No Data')->withInput();
        }

        $updateExpired = expiredModel::where('fd_code', $id)->update([
            'fd_name' => $request->name,
            'fd_amount' => $request->amount,
            'fd_type' => $request->type,
            'fd_expired_datetime' => $request->exp,
            'fd_updated_datetime' => $request->dateimport,
        ]);


        $createSeller = sellerModel::CreateSeller($request);

        $updateSeller = sellerModel::where('fd_phone', $request->SellerPhone)->update([
            'fd_name' => $request->SellerName,
            'fd_type' => $request->SellerType,
            'fd_phone' => $request->SellerPhone,
            'fd_updated_datetime' => $request->dateimport,
        ]);

        $saveHistory = historyModel::CreateHistory($pid, $request);
        if ($saveHistory != 1) {
            return back()->withErrors('Import Error')->withInput();
        }
        // echo $pid;

        // print_r($saveHistory);
        return back()->with('success', 'Import Success!');
    }

    public function destroy($id)
    {
        $product = productModel::where('fd_id',$id);
        // return $product;
        $product->update([
            'fd_status' => 0,
            'fd_updated_datetime' => date('Y-m-d H:i:s')
        ]);
        // $product->delete();

        return back()->with('success', 'Product deleted!');

    }

}
