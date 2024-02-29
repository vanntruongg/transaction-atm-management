<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nganhang extends Model
{
    protected $table ='nganhang';
    protected $fillable = ['NH_Ma', 'NH_Ten', 'NH_DiaChi', 'NH_SDT','NH_KinhDo','NH_ViDo','NH_MaXP'];
    use HasFactory;
    public $timestamps = false;
}
