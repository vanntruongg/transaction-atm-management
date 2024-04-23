<aside class="bg-white h-full p-4 flex justify-center">
  <div class="flex flex-col gap-4 cursor-pointer">
    <div id="openSidebar" class="text-center text-lg">
        <i class="fa-solid fa-bars"></i>
      </div>
      <div id="closeSidebar" class="text-end text-lg hidden">
        <i id="closeSidebar" class="fa-solid fa-xmark"></i>
      </div>

    {{-- add --}}
    <div class="bg-gray-100 self-center p-3 text-18 rounded-full relative group">
      <i class="fa-solid fa-plus"></i>
      <div class="absolute bg-white p-2 flex flex-col text-nowrap text-xs rounded-md shadow-sm z-[999] invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-300 origin-top-left scale-0 group-hover:scale-100">
        <button id="addBankButton" class="border border-blue-500 rounded-md bg-blue-500 text-white px-3 py-2 hover:bg-blue-600 transition-all duration-300 bg-center">Thêm Ngân Hàng</button>
        <button id="addTransactionButton" class="border border-blue-500 rounded-md bg-blue-500 text-white px-3 py-2 mt-2 hover:bg-blue-600 transition-all duration-300 bg-center">Thêm Phòng Giao Dịch</button>
        <button id="addATMButton" class="border border-blue-500 rounded-md bg-blue-500 text-white px-3 py-2 mt-2 hover:bg-blue-600 transition-all duration-300 bg-center">Thêm Trụ ATM</button>
      </div>
    </div>

    {{-- filter --}}
    <div class="bg-gray-100 self-center p-3 text-18 rounded-full relative group">
      <i class="fa-solid fa-filter"></i>
      <div class="absolute bg-white p-2 flex flex-col text-nowrap text-xs rounded-md shadow-sm z-[999] invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-300 origin-top-left scale-0 group-hover:scale-100">
        <div class="relative group">
          <button id="atmButton" class="border border-blue-500 rounded-md bg-blue-500 text-white px-[42px] py-2 hover:bg-blue-600 transition-all duration-300 bg-center">
            Trụ ATM
          </button>
          <div class="absolute mt-9 left-[148px] rounded-md -top-[44px] bg-white shadow-md py-2 w-80" id="atmDropdown">
            
          </div>
        </div>
        <div class="relative">
          <button id="pgdButton" class="border border-blue-500 rounded-md bg-blue-500 text-white px-5 py-2 mt-2 hover:bg-blue-600 transition-all duration-300 bg-center ">
            Phòng Giao Dịch
          </button>
          <div class="absolute bg-white left-[148px] rounded-md -top-[42px] shadow-md py-2 w-72" id="pgdDropdown">
           
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="mt-10">
    <button class="px-4 py-2 bg-slate-300 border" id="btnShowSearch">Tìm Kiếm</button>
  </div>
</aside>
