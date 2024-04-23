@vite('resources/js/add.js')
<div id="TruATMForm" class="hidden">
  <form method="POST" id="ATMInfoForm" action="{{ url('create-atm') }}" class="max-w-2xl mx-auto p-4 bg-white border border-gray-300 rounded-lg shadow-md">
      @csrf
      <h1 class="text-xl font-bold text-center mb-8 px-4 py-2 bg-blue-500 text-white rounded-lg shadow-lg">Thêm Trụ ATM</h1>
      
      <label for="ATMDiachi" class="block mb-2">Địa Chỉ Trụ ATM:</label>
      <input type="text" id="ATMDiachi" name="ATM_DiaChi" required readonly class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200">
      
      <label for="ATMKinhDo" class="block mb-2">Kinh Độ Trụ ATM:</label>
      <input type="number" id="ATMKinhDo" name="ATM_KinhDo" required readonly class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200">
      
      <label for="ATMViDo" class="block mb-2">Vĩ Độ Trụ ATM:</label>
      <input type="number" id="ATMViDo" name="ATM_ViDo" required readonly class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200">
      
      <label for="ATMNH" class="block mb-2">Trụ ATM của Ngân Hàng:</label>
      <select id="ATMNH" name="ATM_MaNH" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg">
          <option value="">Trụ ATM của ngân hàng</option>
          
          @if (isset($nganhangs))
              @foreach($nganhangs as $nganhang)
                  <option value="{{ $nganhang->NH_Ma }}">{{ $nganhang->NH_Ten }}</option>
              @endforeach
          @endif

      </select>
      
      <label for="ATMXP" class="block mb-2">Trụ ATM ở Phường:</label>
      <select id="ATMXP" name="ATM_MaXP" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg">
          <option value="">Trụ ATM ở Phường:</option>
          @if (isset($getXP))
              @foreach($getXP as $xaphuong)
                  <option value="{{ $xaphuong->XP_Ma }}">{{ $xaphuong->XP_Ten }}</option>
              @endforeach
          @endif
      </select>
      
      <div class="flex justify-center">
          <button type="submit" id="LuuttATM" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Lưu Thông Tin</button>
      </div>
  </form>
</div>
