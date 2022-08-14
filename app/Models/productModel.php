<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    // Config Model
    protected $table = 'tb_product';
    protected $primaryKey = 'fd_id';
    protected $fillable = [
        'fd_code',
        'fd_name',
        'fd_type',
        'fd_amount',
        'fd_price',
        'fd_updated_datetime',
        'fd_created_datetime'
    ];
    const CREATED_AT = 'fd_created_datetime';
    const UPDATED_AT = 'fd_updated_datetime';
    // End Config

}
