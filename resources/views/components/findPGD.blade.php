<div id="searchBoxPGD" class="w-1/2 h-[200px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 fixed bg-slate-100 text-center  rounded-md">
    <label for="" class="block py-2">Ngân Hàng: 
        <select name="selectBank" id="selectBankPGD" class="px-2 py-1 outline-none rounded-md ml-2 border focus:border-green-400 ">
            <option value="0" selected>--Tất cả phòng giao dịch--</option>
            {{-- @foreach($dataBank as $key => $item)
                <option value="{{$item->NH_Ma}}">{{$item->NH_Ten}}</option>
            @endforeach --}}
        </select>
    </label>    

    <button id="btnSearchPGD" class="px-2 py-1 border border-red-300 bg-slate-300 mt-5">Tìm Kiếm</button>

    <i class="fa-solid fa-circle-xmark absolute right-2 top-2 cursor-pointer" id="btnCloseSearchBoxPGD"></i>
</div>