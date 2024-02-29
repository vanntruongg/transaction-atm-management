<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    protected $table = 'xaphuong';
    use HasFactory;
    protected $primaryKey = 'XP_Ma';
    protected $fillable = [
        'XP_Ma',
        'XP_Ten', 
        'XP_MaQH'];

    public $timestamps = false;

}
