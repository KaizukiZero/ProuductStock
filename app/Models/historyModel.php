<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyModel extends Model
{
    // Config Model
    protected $table = 'tb_history';
    protected $primaryKey = 'fd_id';
    protected $fillable = [
        'fd_pid',
        'fd_code',
        'fd_name',
        'fd_type',
        'fd_amount',
        'fd_price',
        'fd_by',
        'fd_action',
        'fd_status',
        'fd_seller_name',
        'fd_exprired_datetime',
        'fd_created_datetime'
    ];
    const CREATED_AT = 'fd_created_datetime';
    const UPDATED_AT = null;

    

    public function scopeCreateHistory($query,$pid,$req)
    {
        $check = $query->where('fd_pid',$pid)->count();
        $data = [
            'fd_pid' => $pid,
            'fd_action' => 2,
            'fd_status' => 1,
            'fd_code' => $req->code,
            'fd_name' => $req->name,
            'fd_type' => $req->type,
            'fd_amount' => $req->amount,
            'fd_price' => $req->price,
            'fd_seller_name' => $req->SellerName,
            'fd_by' => $req->by,
            'fd_expired_datetime' => $req->exp,
            'fd_created_datetime' => $req->dateimport
        ];

        if($check != 1){
            $result = $query->insert($data);
            return $result;
        }
        return false;
    }

    // End Config
}
