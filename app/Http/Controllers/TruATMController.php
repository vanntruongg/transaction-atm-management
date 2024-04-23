<?php

namespace App\Http\Controllers;
use App\Models\truatm;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\phonggiaodich;
use App\Models\nganhang;
use App\Models\TruATM as ModelsTruATM;
use Illuminate\Support\Facades\DB;
class TruATMController extends Controller
{

    public function baseData() {
        $dataATM = nganhang::all();
        $dataPGD = DB::table('phonggiaodich')
        ->join('nganhang','phonggiaodich.PGD_MaNH','=','nganhang.NH_Ma')
        ->get();

        return response()->json(['dataATM' => $dataATM, 'dataPGD' => $dataPGD]);
    }
    public function getATM() {
        // $data = truatm::all();
        $data = DB::table('truatm')
        ->join('nganhang','truatm.ATM_MaNH','=','NH_Ma')
        ->select('truatm.*','nganhang.NH_Ten')
        ->get();
        return response()->json($data,200);
        
    }

    public function getPGD() {
        // $pgd = phonggiaodich::all();
        $pgd = DB::table('phonggiaodich')
        ->join('nganhang','phonggiaodich.PGD_MaNH','=','NH_Ma')
        ->select('phonggiaodich.*','nganhang.NH_Ten')
        ->get();
        return response()->json($pgd,200);
    }

    public function getATMOfBank($id) {

        $ATMOfBank = ModelsTruATM::where('atm_manh', $id)->get();
        return response()->json(['ATMOfBank' => $ATMOfBank]);

    }

    public function getPGDOfBank($id){
        $PGDOfBank = phonggiaodich::where('PGD_MaNH', $id)->get();
        return response()->json(['PGDOfBank' => $PGDOfBank]);
    }
}