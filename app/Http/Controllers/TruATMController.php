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
    public function getPageFilter() {
        $data = nganhang::all();

        return view('filter',compact('data'));
    }
    
    // public function getATMs()
    // {
    //     $atms = truatm::select('ATM_SoHieu', 'ATM_DiaChi', 'ATM_KinhDo','ATM_ViDo')->get();
    //     $phonggiaodich = phonggiaodich::select('PGD_Ten', 'PGD_DiaChi', 'PGD_KinhDo', 'PGD_ViDo')->get();
    //     return view('filter', compact('atms','phonggiaodich'));
    // }
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
        ->join('nganhang','phonggiaodich.PGD_MaNH','=','NH_MaNH')
        ->select('phonggiaodich.*','nganhang.NH_Ten')
        ->get();
        return response()->json($pgd,200);
    }

    public function getBank() {
        
        
    }
}
