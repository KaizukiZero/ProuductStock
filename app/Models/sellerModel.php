<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerModel extends Model
{
    // Config Model
    protected $table = 'tb_seller';
    protected $primaryKey = 'fd_id';
    protected $fillable = [
        'fd_name',
        'fd_phone',
        'fd_type',
        'fd_updated_datetime',
        'fd_created_datetime'

    ];
    const CREATED_AT = 'fd_created_datetime';
    const UPDATED_AT = 'fd_updated_datetime';
    // End Config
    public function scopeCreateSeller($query,$req)
    {
        $check = $query->where('fd_phone', $req->SellerPhone)->count();
        $data = [
            'fd_name' => $req->SellerName,
            'fd_type' => $req->SellerType,
            'fd_phone' => $req->SellerPhone,
            'fd_updated_datetime' => $req->dateimport,
            'fd_created_datetime' => $req->dateimport,
        ];

        if($check != 1){
            $result = $query->insert($data);
            return $result;
        }
        return false;
    }
}
