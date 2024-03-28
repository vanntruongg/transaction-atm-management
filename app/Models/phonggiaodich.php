<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phonggiaodich extends Model
{
    protected $table ='phonggiaodich';
    protected $fillable = ['PGD_Ten', 'PGD_DiaChi', 'PGD_KinhDo', 'PGD_ViDo'];
    use HasFactory;
    public $timestamps = false;
}
