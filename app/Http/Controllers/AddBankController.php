<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nganhang;
use App\Models\Xaphuong;

class AddBankController extends Controller
{
    //AddBankController
    public function getBank()
    {
        $nganhangs = Nganhang::all(); // Lấy tất cả các dòng từ bảng nganhang
        return response()->json($nganhangs);
    }
}
