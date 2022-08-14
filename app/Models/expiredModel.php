<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expiredModel extends Model
{
    // Config Model
    protected $table = 'tb_expired';
    protected $primaryKey = 'fd_id';
    protected $fillable = [
        'fd_code',
        'fd_name',
        'fd_type',
        'fd_amount',
        'fd_expired_datetime',
        'fd_created_datetime'
    ];
    const CREATED_AT = 'fd_created_datetime';
    // End Config
}
