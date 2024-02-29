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


class TestController extends Controller
{
    public function index() {
        $dataBank = NganHang::all();

        $dichvu = DichVu::all();


        return view('test', compact('dataBank', 'dichvu'));
    }

    public function testjson() {

        $id1 = 1;
        $name1 = 'test1';

        $id2 = 2;
        $name2 = 'test2';

        $data = array(
            'id' => $id1,
            'name' => $name1,
        );

        return response()->json($data, 200);

    }

    public function testBank() {
        $data = NganHang::all();

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
}
