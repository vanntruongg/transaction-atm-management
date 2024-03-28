<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truatm extends Model
{
    protected $table ='truatm';
    protected $fillable = [
        'ATM_DiaChi',
        'ATM_KinhDo',
        'ATM_ViDo',
        'ATM_MaXP',
        'ATM_NganHang'
    ];
    use HasFactory;

    public $timestamps = false;
}
