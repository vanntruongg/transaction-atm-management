import "leaflet/dist/leaflet";
import "leaflet/dist/leaflet.css";
import "leaflet-control-geocoder/dist/Control.Geocoder.css";
import "leaflet/dist/images/marker-icon.png";

import "leaflet-control-geocoder";
import L, { marker } from "leaflet";

const divElement = document.getElementById("map");

//  ctu
const lat = 10.029939;
const lng = 105.76804;

const map = L.map(divElement, {
    center: [lat, lng],
    zoom: 15,
});

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

L.marker([lat, lng]).addTo(map).bindPopup("Đại học Cần Thơ khu II").openPopup();
var geocoder = L.Control.Geocoder.nominatim();
L.Control.geocoder({ geocoder }).addTo(map);

// menu sidebar
const menuSidebar = document.getElementById("menu-sidebar");
const sidebar = document.getElementById("sidebar");
const divMap = document.getElementById("divMap");

menuSidebar.addEventListener("click", () => {
    menuSidebar.classList.toggle("active");

    if (menuSidebar.classList.contains("active")) {
        sidebar.classList.remove("w-[5%]");
        divMap.classList.remove("w-[95%]");
        sidebar.classList.add("w-[20%]");
        divMap.classList.add("w-[80%]");
    } else {
        sidebar.classList.add("w-[5%]");
        divMap.classList.add("w-[95%]");
        sidebar.classList.remove("w-[20%]");
        divMap.classList.remove("w-[80%]");
    }
});

var bankvido = document.getElementById('bankViDo')
var bankkinhdo = document.getElementById('bankKinhDo')
var bankdchi = document.getElementById('bankDiachi')
var trandchi = document.getElementById('TransactionDiachi')
var tranvido = document.getElementById('TransactionViDo')
var trankinhdo = document.getElementById('TransactionKinhDo')
var currentMarker = null;

map.on('click' , function(e) {
    
    var latitude = e.latlng.lat; 
    var longitude = e.latlng.lng;
    fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            bankdchi.value = data.display_name;
            trandchi.value = data.display_name;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    if (currentMarker) {
        // Nếu có, xóa marker cũ
        map.removeLayer(currentMarker);
    }

    map.setView([latitude, longitude], map.getMaxZoom());

    currentMarker = L.marker([latitude, longitude]).addTo(map).bindTooltip("Bạn đã chọn vị trí này").openTooltip();
    bankvido.value = latitude;
    bankkinhdo.value = longitude; 
    tranvido.value = latitude;
    trankinhdo.value = longitude;
})

var bankForm = document.getElementById('bankForm');
var addBankButton = document.getElementById('addBankButton');

// Bắt sự kiện click trên nút "Thêm Ngân Hàng"
addBankButton.addEventListener('click', function() {
  // Ẩn form phòng giao dịch nếu đang hiển thị
  if (!TransactionForm.classList.contains('hidden')) {
    TransactionForm.classList.add('hidden');
  }
  // Nếu form đang ẩn, hiển thị nó; ngược lại, ẩn form đi
  if (bankForm.classList.contains('hidden')) {
    bankForm.classList.remove('hidden');
  } else {
    bankForm.classList.add('hidden');
  }

  fetchXaPhuongBankData();
});

var TransactionForm = document.getElementById('TransactionForm');
var addTransactionButton = document.getElementById('addTransactionButton');

// Bắt sự kiện click trên nút "Thêm Phòng Giao Dịch"
addTransactionButton.addEventListener('click', function() {
  // Ẩn form Ngân Hàng nếu đang hiển thị
  if (!bankForm.classList.contains('hidden')) {
    bankForm.classList.add('hidden');
  }
  // Nếu form đang ẩn, hiển thị nó; ngược lại, ẩn form đi
  if (TransactionForm.classList.contains('hidden')) {
    TransactionForm.classList.remove('hidden');
  } else {
    TransactionForm.classList.add('hidden');
  }

  fetchNganhangData();
  fetchXaPhuongTransactionData();

});

function fetchNganhangData() {
  fetch("/get-bank")
      .then(response => response.json())
      .then(data => {
          var selectElement = document.getElementById("TransactionBank");
          selectElement.innerHTML = ""; // Xóa các option hiện có
          var defaultOption = document.createElement("option");
          selectElement.add(defaultOption);

          data.forEach(function(nganhang) {
              var option = document.createElement("option");
              option.value = nganhang.NH_Ma;
              option.text = nganhang.NH_Ten;
              selectElement.add(option);
          });
      })
      .catch(error => console.error("Lỗi:", error));
}
function fetchXaPhuongBankData() {
  fetch("/get-xp")
      .then(response => response.json())
      .then(data => {
          var selectElement = document.getElementById("XaPhuongBank");
          selectElement.innerHTML = ""; // Xóa các option hiện có
          var defaultOption = document.createElement("option");
          selectElement.add(defaultOption);

          data.forEach(function(xaphuong) {
              var option = document.createElement("option");
              option.value = xaphuong.XP_Ma;
              option.text = xaphuong.XP_Ten;
              selectElement.add(option);
          });
      })
      .catch(error => console.error("Lỗi:", error));
}
function fetchXaPhuongTransactionData() {
  fetch("/get-xp")
      .then(response => response.json())
      .then(data => {
          var selectElement = document.getElementById("XaPhuongTransaction");
          selectElement.innerHTML = ""; // Xóa các option hiện có
          var defaultOption = document.createElement("option");
          selectElement.add(defaultOption);

          data.forEach(function(xaphuong) {
              var option = document.createElement("option");
              option.value = xaphuong.XP_Ma;
              option.text = xaphuong.XP_Ten;
              selectElement.add(option);
          });
      })
      .catch(error => console.error("Lỗi:", error));
}



