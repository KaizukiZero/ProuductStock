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
        'fd_code',
        'fd_name',
        'fd_type',
        'fd_amount',
        'fd_price',
        'fd_by',
        'fd_action',
        'fd_status',
        'fd_created_datetime'
    ];
    const CREATED_AT = 'fd_created_datetime';
    // End Config
}
