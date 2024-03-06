<style>
    #ATMInfoForm {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  #ATMInfoForm label {
    display: block;
    margin-bottom: 8px;
  }
  
  #ATMInfoForm input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  #ATMInfoForm button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    
  }
  
  #ATMInfoForm button:hover {
    background-color: #0056b3;
  }
  #ATMXP,
  #ATMNH {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      border: 1px solid #ccc; /* Change border color to highlight */
      border-radius: 4px;
      background-color: #fff; /* Ensure background color is consistent */
      box-sizing: border-box; /* Include padding and border in element's total width and height */
      transition: border-color 0.3s ease; /* Add transition effect for smoother hover */
      }
  
  #ATMKinhDo,
  #ATMViDo,
  #ATMDiachi {
        /* Đặt thuộc tính readonly cho ô input kinh độ và vĩ độ */
        background-color: #7ef774; /* Để làm nổi bật ô input readonly */
        cursor: not-allowed; /* Chỉ đọc không cho phép chỉnh sửa */
      }
  </style>
  
  <div id="TruATMForm" class="hidden">
      <!-- Form điền thông tin ngân hàng sẽ xuất hiện ở đây -->
      <!-- Ví dụ: -->
      <form method="POST" id="ATMInfoForm" action="{{ url('create-atm') }}">
        @csrf
        
        <label for="ATMDiachi">Địa Chỉ Trụ ATM:</label>
        <input type="text" id="ATMDiachi" name="ATM_DiaChi" required readonly>

        <label for="ATMKinhDo">Kinh Độ Trụ ATM:</label>
        <input type="number" id="ATMKinhDo" name="ATM_KinhDo" required readonly>
  
        <label for="ATMViDo">Vĩ Độ Trụ ATM:</label>
        <input type="number" id="ATMViDo" name="ATM_ViDo" required readonly>

        <label for="ATMNH">Trụ ATM của Ngân Hàng:</label>
        <select id="ATMNH" name="ATM_MaNH" required>
            <option value="">Trụ ATM của ngân hàng</option>
            @if (isset($nganhangs))
                @foreach($nganhangs as $nganhang)
                    <option value="{{ $nganhang->NH_Ma }}" >{{ $nganhang->NH_Ten }}</option>
                @endforeach
            @endif
        </select>
  
        <label for="ATMXP">Trụ ATM ở Phường:</label>
        <select id="ATMXP" name="ATM_MaXP" required>
          <option value="">Trụ ATM ở Phường:</option>
          @if (isset($getXP))
              @foreach($getXP as $xaphuong)
                  <option value="{{ $xaphuong->XP_Ma }}" >{{ $xaphuong->XP_Ten }}</option>
              @endforeach
          @endif
      </select>
        
    
        <button type="submit" id="Luutt">Lưu Thông Tin</button>
      </form>
    </div>