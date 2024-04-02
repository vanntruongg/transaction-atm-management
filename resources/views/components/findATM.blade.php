<div id="searchBox" class="w-1/2 h-[200px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 fixed bg-slate-100 text-center  rounded-md">
    <label for="" class="block py-2">Ngân Hàng: 
        <select name="selectBank" id="selectBank" class="px-2 py-1 outline-none rounded-md ml-2 border focus:border-green-400 ">
            {{-- @foreach($dataBank as $key => $item)
                <option value="{{$item->NH_Ma}}">{{$item->NH_Ten}}</option>
            @endforeach --}}
        </select>
    </label>    
    <label for="" class="block py-2">Dịch Vụ: 
        <select name="selectService" id="selectService" class="px-2 py-1 outline-none rounded-md ml-2 border focus:border-green-400 ">
            {{-- @foreach($dichvu as $key => $item)
                <option value="{{$item->DV_Ma}}">{{$item->DV_Ten}}</option>
            @endforeach --}}
        </select>
    </label>

    <label for="" class="block py-2">Khoảng Phí: 
        <label for=""><input id="selectRange" type="range" class="inputRange mr-2" min="0" max="100000" ><output>0</output></label>
        
    </label>
    <button id="btnSearchATM" class="px-2 py-1 border border-red-300 bg-slate-300 mt-5">Tìm Kiếm</button>

    <i class="fa-solid fa-circle-xmark absolute right-2 top-2 cursor-pointer" id="btnCloseSearchBox"></i>
</div>