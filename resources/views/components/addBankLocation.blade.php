@vite('resources/js/add.js')
<style>
  #bankInfoForm {
          max-width: 600px;
          margin: auto;
          padding: 20px;
          background-color: #fff;
          border: 1px solid #ccc;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          overflow-y: auto; 
          max-height: 90vh; 
      }
  </style>
<div id="bankForm" class="hidden">
    <form method="POST" id="bankInfoForm" action="{{ url('create-bank') }}" >
      @csrf
      <h1 class="text-xl font-bold text-center mb-8 px-4 py-2 bg-blue-500 text-white rounded-lg shadow-lg">Thêm Ngân Hàng</h1>

      <label for="bankName" class="block mb-2">Tên Ngân Hàng:</label>
      <input type="text" id="bankName" name="NH_Ten" required class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg">
      
      <label for="bankDiachi" class="block mb-2">Địa Chỉ Ngân Hàng:</label>
      <input type="text" id="bankDiachi" name="NH_DiaChi" required readonly class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200">
      
      <label for="bankSDT" class="block mb-2">SĐT Ngân Hàng:</label>
      <input type="tel" id="bankSDT" name="NH_SDT" class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg">
      
      <label for="bankKinhDo" class="block mb-2">Kinh Độ Ngân Hàng:</label>
      <input type="number" id="bankKinhDo" name="NH_KinhDo" required readonly class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200">

      <label for="bankViDo" class="block mb-2">Vĩ Độ Ngân Hàng:</label>
      <input type="number" id="bankViDo" name="NH_ViDo" required readonly class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200">

      <label for="XaPhuong" class="block mb-2">Ngân Hàng ở Phường:</label>
      <select id="XaPhuongBank" name="NH_MaXP" required class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg">
        <option value="">Ngân Hàng ở Phường:</option>
        @if (isset($getXP))
            @foreach($getXP as $xaphuong)
                <option value="{{ $xaphuong->XP_Ma }}">{{ $xaphuong->XP_Ten }}</option>
            @endforeach
        @endif
    </select>
    <button type="submit" id="Luuttbank" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700  ">Lưu Thông Tin</button>
  
  </form>
</div>
