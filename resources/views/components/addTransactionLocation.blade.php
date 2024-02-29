<style>
    #TransactionInfoForm {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-y: auto; /* Thêm thanh cuộn dọc khi cần */
        max-height: 90vh; /* Đặt chiều cao tối đa là 80% của chiều cao của màn hình */
    }

    #TransactionInfoForm label {
        display: block;
        margin-bottom: 8px;
    }

    #TransactionInfoForm input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #TransactionInfoForm button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    #TransactionBank,
    #XaPhuongTransaction {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc; /* Change border color to highlight */
    border-radius: 4px;
    background-color: #fff; /* Ensure background color is consistent */
    box-sizing: border-box; /* Include padding and border in element's total width and height */
    transition: border-color 0.3s ease; /* Add transition effect for smoother hover */
    }
    #TransactionInfoForm button:hover {
        background-color: #0056b3;
    }

    #TransactionKinhDo,
    #TransactionViDo,
    #TransactionDiachi {
        background-color: #7ef774;
        cursor: not-allowed;
    }
</style>
  
  <div id="TransactionForm" class="hidden">
      <form method="POST" id="TransactionInfoForm" action="{{ url('create-transaction') }}">
        @csrf
        <label for="TransactionName">Tên Phòng Giao Dịch:</label>
        <input type="text" id="TransactionName" name="PGD_Ten" required>
        
        <label for="TransactionDiachi">Địa Chỉ Phòng Giao Dịch:</label>
        <input type="text" id="TransactionDiachi" name="PGD_DiaChi" required readonly>
        
        <label for="TransactionKinhDo">Kinh Độ Phòng Giao Dịch:</label>
        <input type="number" id="TransactionKinhDo" name="PGD_KinhDo" required readonly>
  
        <label for="TransactionViDo">Vĩ Độ Phòng Giao Dịch:</label>
        <input type="number" id="TransactionViDo" name="PGD_ViDo" required readonly>
  
        <label for="TransactionMoTa">Mô Tả Phòng Giao Dịch:</label>
        <input type="text" id="TransactionMoTa" name="PGD_MoTa">

        <label for="TransactionSDT">SĐT Phòng Giao Dịch:</label>
        <input type="tel" id="TransactionSDT" name="PGD_SDT" required>
        

        <label for="TransactionBank">Phòng Giao Dịch của Ngân Hàng:</label>
            <select id="TransactionBank" name="PGD_MaNH" required>
                <option value="">Chọn một phòng giao dịch của ngân hàng</option>
                @if (isset($nganhangs))
                    @foreach($nganhangs as $nganhang)
                        <option value="{{ $nganhang->NH_Ma }}" >{{ $nganhang->NH_Ten }}</option>
                    @endforeach
                @endif
            </select>

        <label for="XaPhuong">Phòng Giao Dịch ở Phường:</label>
        <select id="XaPhuongTransaction" name="PGD_MaXP" required>
            <option value="">Phòng Giao Dịch ở Phường:</option>
            @if(isset($getXP))
                @foreach($getXP as $xaphuong)
                    <option value="{{ $xaphuong->XP_Ma }}" >{{ $xaphuong->XP_Ten }}</option>
                @endforeach
            @endif
        </select>
        
    
        <button type="submit" id="Luutt">Lưu Thông Tin</button>
      </form>
    </div>