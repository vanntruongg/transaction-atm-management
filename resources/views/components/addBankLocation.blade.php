<style>
  #bankInfoForm {
  max-width: 600px;
  margin: auto;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#bankInfoForm label {
  display: block;
  margin-bottom: 8px;
}

#bankInfoForm input {
  width: 100%;
  padding: 8px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

#bankInfoForm button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}

#bankInfoForm button:hover {
  background-color: #0056b3;
}
#XaPhuongBank {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc; /* Change border color to highlight */
    border-radius: 4px;
    background-color: #fff; /* Ensure background color is consistent */
    box-sizing: border-box; /* Include padding and border in element's total width and height */
    transition: border-color 0.3s ease; /* Add transition effect for smoother hover */
    }

#bankKinhDo,
#bankViDo,
#bankDiachi {
      /* Đặt thuộc tính readonly cho ô input kinh độ và vĩ độ */
      background-color: #7ef774; /* Để làm nổi bật ô input readonly */
      cursor: not-allowed; /* Chỉ đọc không cho phép chỉnh sửa */
    }
</style>

<div id="bankForm" class="hidden">
    <!-- Form điền thông tin ngân hàng sẽ xuất hiện ở đây -->
    <!-- Ví dụ: -->
    <form method="POST" id="bankInfoForm" action="{{ url('create-bank') }}">
      @csrf
      <label for="bankName">Tên Ngân Hàng:</label>
      <input type="text" id="bankName" name="NH_Ten" required>
      
      <label for="bankDiachi">Địa Chỉ Ngân Hàng:</label>
      <input type="text" id="bankDiachi" name="NH_DiaChi" required readonly>
      
      <label for="bankSDT">SĐT Ngân Hàng:</label>
      <input type="tel" id="bankSDT" name="NH_SDT" required>
      
      <label for="bankKinhDo">Kinh Độ Ngân Hàng:</label>
      <input type="number" id="bankKinhDo" name="NH_KinhDo" required readonly>

      <label for="bankViDo">Vĩ Độ Ngân Hàng:</label>
      <input type="number" id="bankViDo" name="NH_ViDo" required readonly>

      <label for="XaPhuong">Ngân Hàng ở Phường:</label>
      <select id="XaPhuongBank" name="NH_MaXP" required>
        <option value="">Ngân Hàng ờ Phường:</option>
        @if (isset($getXP))
            @foreach($getXP as $xaphuong)
                <option value="{{ $xaphuong->XP_Ma }}" >{{ $xaphuong->XP_Ten }}</option>
            @endforeach
        @endif
    </select>
      
  
      <button type="submit" id="Luutt">Lưu Thông Tin</button>
    </form>
  </div>