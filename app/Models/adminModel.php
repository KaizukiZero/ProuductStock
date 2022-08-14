<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminModel extends Model
{
    // Config Model
    protected $table = 'tb_admin';
    protected $primaryKey = 'fd_id';
    protected $fillable = [
        'fd_username',
        'fd_password',
        'fd_class',
        'fd_permission',
        'fd_created_datetime'
    ];
    const CREATED_AT = 'fd_created_datetime';
    // End Config
}
