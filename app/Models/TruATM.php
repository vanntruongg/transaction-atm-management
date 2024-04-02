<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruATM extends Model
{
    protected $table = 'truatm';
    use HasFactory;
    protected $primaryKey = 'ATM_SoHieu';
    protected $fillable = [
        'ATM_SoHieu',
        'ATM_DiaChi',
        'ATM_KinhDo', 
        'ATM_ViDo', 
        'ATM_MaNH',
        'PGD_MaXP'];

    public $timestamps = false;
}
