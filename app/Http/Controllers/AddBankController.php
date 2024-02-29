<?php

namespace App\Http\Controllers;
use App\Models\Phonggiaodich;
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
    public function getXP()
    {
        $getXP = Xaphuong::all();
        return response()->json($getXP);
    }

    public function createBank(Request $request)
    {
        // dd($request);
        $nganhang = new Nganhang;
        $nganhang->NH_Ten = $request->NH_Ten;
        $nganhang->NH_DiaChi = $request->NH_DiaChi;
        $nganhang->NH_SDT = $request->NH_SDT;
        $nganhang->NH_KinhDo = $request->NH_KinhDo;
        $nganhang->NH_ViDo = $request->NH_ViDo;
        $nganhang->NH_MaXP = $request->NH_MaXP;

        $nganhang->save();  

        return redirect('/');
    }
    public function createTransaction(Request $request)
    {
        $phonggiaodich = new Phonggiaodich;
        $phonggiaodich->PGD_Ten = $request->PGD_Ten;
        $phonggiaodich->PGD_DiaChi = $request->PGD_DiaChi;
        $phonggiaodich->PGD_SDT = $request->PGD_SDT;
        $phonggiaodich->PGD_KinhDo = $request->PGD_KinhDo;
        $phonggiaodich->PGD_ViDo = $request->PGD_ViDo;
        $phonggiaodich->PGD_MoTa = $request->PGD_MoTa;
        $phonggiaodich->PGD_MaXP = $request->PGD_MaXP;
        $phonggiaodich->PGD_MaNH = $request->PGD_MaNH;

        $phonggiaodich->save();

        return redirect('/');
    }
}
