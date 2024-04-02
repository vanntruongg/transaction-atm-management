<?php

namespace App\Http\Controllers;
use App\Models\truatm;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\phonggiaodich;
use App\Models\nganhang;
use Illuminate\Support\Facades\DB;
class TruATMController extends Controller
{
    public function getallATMPGD(){
        $dataATM = nganhang::all();
        $dataPGD = pgd::all();
        return view('components.buttonfilter',compact('dataATM', 'dataPGD'));
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
}
