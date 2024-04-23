<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\NganHang;
use App\Models\NganHangChapNhan;
use App\Models\TruATM;
use App\Models\DichVu;
use App\Models\PhongGiaoDich;


class TestController extends Controller
{
    public function index() {
        $dataBank = NganHang::all();

        $dichvu = DichVu::all();

        $range = NganHangChapNhan::max('nhcn_mucphi');
        return response()->json(['dataBank' => $dataBank, 'dichVu' => $dichvu, 'range' => $range]);
    }


    public function getListBankAccept1($dichvu, $idbank, $range) {
        $data = NganHangChapNhan::where('NHCN_MaNH', $idbank)
        ->where('NHCN_MADV', $dichvu)
        ->where('nhcn_mucphi', '<=', $range)
        ->get();

        return response()->json($data, 200);
    }

    public function getListBankAccept($dichvu , $idbank) {
        $data = NganHangChapNhan::where('NHCN_MaNH', $idbank)
        ->where('NHCN_MaDV', $dichvu)
        ->get();

        return response()->json($data, 200);
    }

    public function getListATMOfBank($id, $dichvu) {
        $data = TruATM::where('atm_manh', $id)
        ->join('dichvuatm', 'atm_sohieu', '=', 'dvatm_maatm')
        ->where('dichvuatm.dvatm_madv', $dichvu)
        ->get();
        // dd($data);

        return response()->json($data, 200);
    }



    public function getPGD($id) {

        $idBank  = (int)$id;
        
        if($id == 0) {
            $listPGD = PhongGiaoDich::all();
        } else {
            $listPGD = PhongGiaoDich::where('pgd_manh', $idBank)->get();

        }

        return response()->json(['listPGD' => $listPGD]);
    }
}
