import "leaflet/dist/leaflet";
import "leaflet/dist/leaflet.css";
import "leaflet-control-geocoder/dist/Control.Geocoder.css";
import "leaflet/dist/images/marker-icon.png";

import "leaflet-control-geocoder";
import L, { marker } from "leaflet";
import map from './index.js';



// L.marker([lat, lng]).addTo(map).bindPopup("Đại học Cần Thơ khu II").openPopup();
// L.Control.geocoder().addTo(map);

//lấy id input bank
var bankvido = document.getElementById('bankViDo');
var bankkinhdo = document.getElementById('bankKinhDo');
var bankdchi = document.getElementById('bankDiachi');
//lấy id input phonggiaodich
var trandchi = document.getElementById('TransactionDiachi');
var tranvido = document.getElementById('TransactionViDo');
var trankinhdo = document.getElementById('TransactionKinhDo');
//lấy id input ATM
var atmkinhdo = document.getElementById('ATMKinhDo');
var atmvido = document.getElementById('ATMViDo');
var atmdiachi = document.getElementById('ATMDiachi');

//lấy ID form
var bankForm = document.getElementById('bankForm');
var ATMForm = document.getElementById('TruATMForm');
var TransactionForm = document.getElementById('TransactionForm');
var addBankButton = document.getElementById('addBankButton');
var addATMButton = document.getElementById('addATMButton');
var addTransactionButton = document.getElementById('addTransactionButton');

//lấy ID closeForm
var closeATM = document.getElementById('closeATM');
var closeBank = document.getElementById('closeBank');
var closeTransaction = document.getElementById('closeTransaction');

//lấy id xaphuong
var xaphuongSelectbank = document.getElementById('XaPhuongBank');
var xaphuongSelecttransaction = document.getElementById('XaPhuongTransaction');
var xaphuongSelectatm = document.getElementById('ATMXP');
//vị trí currentmarker
var currentMarker = null;

// Bấm vị trí trên bản đồ
function handleMapClick(e) {
  const { lat, lng } = e.latlng;
  const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

  fetch(url)
      .then(response => response.json())
      .then(data => {
          const displayName = data.display_name;
          [bankdchi.value, trandchi.value, atmdiachi.value] = [displayName, displayName, displayName];
          const quarterValue = data.address.quarter;

          const selects = [xaphuongSelectbank, xaphuongSelecttransaction, xaphuongSelectatm];
          selects.forEach(select => {
              Array.from(select.options).forEach(option => {
                  if (option.text === quarterValue) {
                      select.value = option.value;
                      return;
                  }
              });
          });
      })
      .catch(error => console.error('Error fetching data:', error));

  if (currentMarker) map.removeLayer(currentMarker);
  map.flyTo([lat, lng], map.getMaxZoom(), { animate: true, duration: 1 });

  const customIcon = L.divIcon({
      className: 'custom-icon',
      html: '<i class="fa-solid fa-map-pin fa-3x"></i>',
      iconSize: [20, 20],
      iconAnchor: [10, 35]
  });

  currentMarker = L.marker([lat, lng], { icon: customIcon }).addTo(map)
      .bindTooltip("Bạn đã chọn vị trí này", {
          permanent: true,
          className: "custom-tooltip",
          direction: "top",
          offset: [0, -30]
      })
      .openTooltip();

  [bankvido.value, bankkinhdo.value, tranvido.value, trankinhdo.value, atmvido.value, atmkinhdo.value] = [lat, lng, lat, lng, lat, lng];
}

// Hàm Đóng Mở form
function handleFormToggle(form, otherForm1, otherForm2, fetchDataFunction) {
  if (!otherForm1.classList.contains('hidden')) {
    otherForm1.classList.add('hidden');
  }
  if (!otherForm2.classList.contains('hidden')) {
    otherForm2.classList.add('hidden');
  }

  if (form.classList.contains('hidden')) {
    form.classList.remove('hidden');
    if (currentMarker) {
      map.removeLayer(currentMarker);
      currentMarker = null;
    }
    map.on('click', handleMapClick);
    form.querySelectorAll('input, select').forEach(function(element) {
      const defaultText = 'Hãy chọn vị trí trên bản đồ';
      element.value = '';
      [bankdchi, trandchi, atmdiachi].forEach(input => {
        input.value = defaultText;
      });
    });
  } else {
    form.classList.add('hidden');
    map.off('click', handleMapClick);
    if (currentMarker) {
      map.removeLayer(currentMarker);
      currentMarker = null;
    }
  }
  fetchDataFunction();
}

addBankButton.addEventListener('click', function() {
  handleFormToggle(bankForm, ATMForm, TransactionForm, fetchXaPhuongBankData);
});

addATMButton.addEventListener('click', function() {
  handleFormToggle(ATMForm, bankForm, TransactionForm, function() {
    fetchXaPhuongATMData();
    fetchNganhangATMData();
  });
});

addTransactionButton.addEventListener('click', function() {
  handleFormToggle(TransactionForm, bankForm, ATMForm, function() {
    fetchBankData();
    fetchXaPhuongTransactionData();
  });
});


//Lấy Data Ngân Hàng
function fetchNganhangData(selectElementId) {
    fetch("/get-bank")
        .then(response => response.json())
        .then(data => {
            var selectElement = document.getElementById(selectElementId);
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
function fetchBankData() {
    fetchNganhangData("TransactionBank");
}

function fetchNganhangATMData() {
    fetchNganhangData("ATMNH");
}

function fetchXaPhuongData(selectElementId) {
    fetch("/get-xp")
        .then(response => response.json())
        .then(data => {
            var selectElement = document.getElementById(selectElementId);
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

function fetchXaPhuongBankData() {
    fetchXaPhuongData("XaPhuongBank");
}

function fetchXaPhuongTransactionData() {
    fetchXaPhuongData("XaPhuongTransaction");
}

function fetchXaPhuongATMData() {
    fetchXaPhuongData("ATMXP");
}

//Hàm Đóng Form
function closeForm(button, form) {
  button.addEventListener('click', function() {
      form.classList.add('hidden');
      map.off('click', handleMapClick);
    if (currentMarker) {
      map.removeLayer(currentMarker);
      currentMarker = null;
    }
    
    form.querySelectorAll('input, select').forEach(function(element) {
        element.value = '';
      });
    });
    
}


closeForm(closeATM, ATMForm); 
closeForm(closeBank, bankForm); 
closeForm(closeTransaction, TransactionForm); 

