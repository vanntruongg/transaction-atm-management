<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NganHang extends Model
{
    protected $table = 'nganhang';
    use HasFactory;
    protected $primaryKey = 'NH_Ma';
    protected $fillable = [
        'NH_Ma',
        'NH_DiaChi',
        'NH_SDT', 
        'NH_KinhDo', 
        'NH_ViDo',
        'NH_MaXP'];

    public $timestamps = false;
}
