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

        $checkproduct = productModel::where('fd_code', $request->code)->count();
        $checkexpired = expiredModel::where('fd_code', $request->code)->count();
        $checkseller = sellerModel::where('fd_phone', $request->Phseller)->count();
        $checkhistory = historyModel::where('fd_pid', $pid)->count();

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

        $createProduct = new productModel;
        $saveExpired = new expiredModel;
        $saveSeller = new sellerModel;
        $saveHistory = new historyModel;

        if ($request->action == "Create") {

            if ($checkproduct != 0 || $checkexpired != 0 || $checkseller != 0) {

                return back()->withErrors('Product or Seller or Expired is already exist')->withInput();
            } else {

                $createProduct = productModel::create([
                    'fd_code' => $request->code,
                    'fd_name' => $request->name,
                    'fd_amount' => $request->amount,
                    'fd_price' => $request->price,
                    'fd_type' => $request->type,
                    'fd_updated_datetime' => $request->dateimport,
                    'fd_created_datetime' => $request->dateimport,
                ]);

                // Create Expired
                $saveExpired = expiredModel::create([
                    'fd_code' => $request->code,
                    'fd_name' => $request->name,
                    'fd_amount' => $request->amount,
                    'fd_type' => $request->type,
                    'fd_expired_datetime' => $request->exp,
                    'fd_updated_datetime' => $request->dateimport,
                    'fd_created_datetime' => $request->dateimport,
                ]);

                // Create Seller
                $saveSeller = sellerModel::create([
                    'fd_name' => $request->SellerName,
                    'fd_type' => $request->SellerType,
                    'fd_phone' => $request->SellerPhone,
                    'fd_updated_datetime' => $request->dateimport,
                    'fd_created_datetime' => $request->dateimport,
                ]);

                // Create History
                $saveHistory = historyModel::create([
                        'fd_pid' => $pid,
                        'fd_status' => 1,
                        'fd_action' => 1,
                        'fd_code' => $request->code,
                        'fd_name' => $request->name,
                        'fd_amount' => $request->amount,
                        'fd_price' => $request->price,
                        'fd_type' => $request->type,
                        'fd_by' => $request->by,
                        'fd_exprired_datetime' => $request->exp,
                        'fd_created_datetime' => $request->dateimport,
                ]);
                return back()->with('success', 'Create Success');
            }

        }

        if($request->action == "Import"){
            // Import Product
            $this->edit($request, $request->code);
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

    public function show()
    {

    }

    public function edit(Request $request,$id)
    {

        $covert_date = strtotime($request->dateimport);
        $pid = $request->code . $request->type . $covert_date;

        // $updateProduct = productModel::where('fd_code', $id)->update([
        //     'fd_name' => $request->name,
        //     'fd_amount' => $request->amount,
        //     'fd_price' => $request->price,
        //     'fd_type' => $request->type,
        //     'fd_updated_datetime' => $request->dateimport,
        // ]);

        // $updateExpired = expiredModel::where('fd_code', $id)->update([
        //     'fd_name' => $request->name,
        //     'fd_amount' => $request->amount,
        //     'fd_type' => $request->type,
        //     'fd_expired_datetime' => $request->exp,
        //     'fd_updated_datetime' => $request->dateimport,
        // ]);

        // $updateSeller = sellerModel::where('fd_phone', $request->Phseller)->update([
        //     'fd_name' => $request->SellerName,
        //     'fd_type' => $request->SellerType,
        //     'fd_phone' => $request->SellerPhone,
        //     'fd_updated_datetime' => $request->dateimport,
        // ]);

        // $saveHistory = historyModel::create([
        //     'fd_pid' => $pid,
        //     'fd_status' => 1,
        //     'fd_action' => 2,
        //     'fd_code' => $id,
        //     'fd_name' => $request->name,
        //     'fd_amount' => $request->amount,
        //     'fd_price' => $request->price,
        //     'fd_type' => $request->type,
        //     'fd_by' => $request->by,
        //     'fd_exprired_datetime' => $request->exp,
        //     'fd_created_datetime' => $request->dateimport,
        // ]);

        $saveHistory = historyModel::HisC($pid,$request);
        // echo $pid;

        print_r($saveHistory);
 
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string',
        //     'type' => 'required|string',
        //     'amount' => 'required|integer',
        //     'price' => 'required|integer',
        //     'exp' => 'required|date',
        // ]);

        // $product->name = $request->fd_name;
        // $product->type = $request->fd_type;
        // $product->amount = $request->fd_amount;
        // $product->price = $request->fd_price;
        // $product->fd_updated_datetime = date('Y-m-d H:i:s');

        // $expired->name = $request->fd_name;
        // $expired->type = $request->fd_type;
        // $expired->amount = $request->fd_amount;
        // $expired->exp = $request->fd_expired_datetime;
        // $expired->fd_updated_datetime = date('Y-m-d H:i:s');
    }

    public function destroy($id)
    {
        $product = productModel::find($id);
        $product->delete();

        return back()->with('success', 'Product deleted!');

    }

}
