@vite('resources/js/add.js')

<style>
#TransactionInfoForm {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-y: auto; 
        max-height: 100%; 
    }
</style>
<div id="TransactionForm" class="hidden">
    <form method="POST" id="TransactionInfoForm" action="{{ url('create-transaction') }}">
        @csrf
        <button type="button" id="closeTransaction" class="bg-white rounded-full text-red-400 hover:text-red-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <i class="fa-regular fa-circle-xmark text-2xl"></i>
        </button>
        <h1 class="text-xl font-bold text-center mb-8 px-4 py-2  text-red rounded-lg">Thêm Phòng Giao Dịch</h1>

        <label for="TransactionName" class="block mb-2">Tên Phòng Giao Dịch:</label>
        <input type="text" id="TransactionName" name="PGD_Ten" required class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg">

        <label for="TransactionDiachi" class="block mb-2">Địa Chỉ Phòng Giao Dịch:</label>
        <input type="text" id="TransactionDiachi" name="PGD_DiaChi" required readonly class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200 pointer-events-none" value="Hãy chọn vị trí trên bản đồ">

        <label for="TransactionKinhDo" class="block mb-2">Kinh Độ Phòng Giao Dịch:</label>
        <input type="number" id="TransactionKinhDo" name="PGD_KinhDo" required readonly class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200 pointer-events-none">

        <label for="TransactionViDo" class="block mb-2">Vĩ Độ Phòng Giao Dịch:</label>
        <input type="number" id="TransactionViDo" name="PGD_ViDo" required readonly class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-green-200 pointer-events-none">

        <label for="TransactionMoTa" class="block mb-2">Mô Tả Phòng Giao Dịch:</label>
        <input type="text" id="TransactionMoTa" name="PGD_MoTa" class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg">

        <label for="TransactionSDT" class="block mb-2">SĐT Phòng Giao Dịch:</label>
        <input type="tel" id="TransactionSDT" name="PGD_SDT" class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg">

        <label for="TransactionBank" class="block mb-2">Phòng Giao Dịch của Ngân Hàng:</label>
        <select id="TransactionBank" name="PGD_MaNH" required class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-white">
            <option value="">Chọn một phòng giao dịch của ngân hàng</option>
            @if (isset($nganhangs))
                @foreach($nganhangs as $nganhang)
                    <option value="{{ $nganhang->NH_Ma }}">{{ $nganhang->NH_Ten }}</option>
                @endforeach
            @endif
        </select>

        <label for="XaPhuong" class="block mb-2">Phòng Giao Dịch ở Phường:</label>
        <select id="XaPhuongTransaction" name="PGD_MaXP" required class="w-full px-3 py-2 mb-4 border border-gray-300 rounded-lg bg-white">
            <option value="">Phòng Giao Dịch ở Phường:</option>
            @if(isset($getXP))
                @foreach($getXP as $xaphuong)
                    <option value="{{ $xaphuong->XP_Ma }}">{{ $xaphuong->XP_Ten }}</option>
                @endforeach
            @endif
        </select>

        <div class="flex justify-center">
            <button type="submit" id="LuuttPDG" class="px-6 py-3 mt-4 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Lưu Thông Tin</button>
        </div>
    </form>
</div>

