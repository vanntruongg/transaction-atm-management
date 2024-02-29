<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonggiaodich extends Model
{
    protected $table = 'phonggiaodich';
    use HasFactory;
    protected $primaryKey = 'PGD_Ma';
    protected $fillable = [
        'PGD_Ma',
        'PGD_Ten', 
        'PGD_DiaChi', 
        'PGD_SDT', 
        'PGD_KinhDo', 
        'PGD_ViDo', 
        'PGD_MoTa',
        'PGD_MaXP',
        'PGD_MaNH'];

    public $timestamps = false;
}
