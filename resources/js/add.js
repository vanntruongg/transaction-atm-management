import "leaflet/dist/leaflet";
import "leaflet/dist/leaflet.css";
import "leaflet-control-geocoder/dist/Control.Geocoder.css";
import "leaflet/dist/images/marker-icon.png";

import "leaflet-control-geocoder";
import L, { marker } from "leaflet";


const divElement = document.getElementById("map");

var bankvido = document.getElementById("bankViDo");
var bankkinhdo = document.getElementById("bankKinhDo");
var bankdchi = document.getElementById("bankDiachi");
var trandchi = document.getElementById("TransactionDiachi");
var tranvido = document.getElementById("TransactionViDo");
var trankinhdo = document.getElementById("TransactionKinhDo");
var atmkinhdo = document.getElementById("ATMKinhDo");
var atmvido = document.getElementById("ATMViDo");
var atmdiachi = document.getElementById("ATMDiachi");

//lấy ID form
var bankForm = document.getElementById("bankForm");
var ATMForm = document.getElementById("TruATMForm");
var TransactionForm = document.getElementById("TransactionForm");
var addBankButton = document.getElementById("addBankButton");
var addATMButton = document.getElementById("addATMButton");
var addTransactionButton = document.getElementById("addTransactionButton");

//lấy id xaphuong
var xaphuongSelectbank = document.getElementById("XaPhuongBank");
var xaphuongSelecttransaction = document.getElementById("XaPhuongTransaction");
var xaphuongSelectatm = document.getElementById("ATMXP");
//vị trí currentmarker
var currentMarker = null;



function handleMapClick(e) {
    var latitude = e.latlng.lat;
    var longitude = e.latlng.lng;
    fetch(
        `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`
    )
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            bankdchi.value = data.display_name;
            trandchi.value = data.display_name;
            atmdiachi.value = data.display_name;

            if (
                xaphuongSelectbank &&
                xaphuongSelecttransaction &&
                xaphuongSelectatm
            ) {
                var quarterValue = data.address.quarter;

                var selects = [
                    xaphuongSelectbank,
                    xaphuongSelecttransaction,
                    xaphuongSelectatm,
                ];
                selects.forEach((select) => {
                    for (var i = 0; i < select.options.length; i++) {
                        if (select.options[i].text === quarterValue) {
                            select.value = select.options[i].value;
                            break;
                        }
                    }
                });
            }
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
    if (currentMarker) {
        // Nếu có, xóa marker cũ
        map.removeLayer(currentMarker);
    }

    map.setView([latitude, longitude], map.getMaxZoom());

    currentMarker = L.marker([latitude, longitude])
        .addTo(map)
        .bindTooltip("Bạn đã chọn vị trí này")
        .openTooltip();
    bankvido.value = latitude;
    bankkinhdo.value = longitude;
    tranvido.value = latitude;
    trankinhdo.value = longitude;
    atmvido.value = latitude;
    atmkinhdo.value = longitude;
}

function handleFormToggle(form, otherForm1, otherForm2, fetchDataFunction) {
    if (!otherForm1.classList.contains("hidden")) {
        otherForm1.classList.add("hidden");
    }
    if (!otherForm2.classList.contains("hidden")) {
        otherForm2.classList.add("hidden");
    }

    if (form.classList.contains("hidden")) {
        form.classList.remove("hidden");
        map.on("click", handleMapClick);
    } else {
        form.classList.add("hidden");
        map.off("click", handleMapClick);
        if (currentMarker) {
            map.removeLayer(currentMarker);
            currentMarker = null;
        }
        bankdchi.value = "";
        trandchi.value = "";
        atmdiachi.value = "";
        bankvido.value = "";
        bankkinhdo.value = "";
        tranvido.value = "";
        trankinhdo.value = "";
        atmvido.value = "";
        atmkinhdo.value = "";
    }

    fetchDataFunction();
}

addBankButton.addEventListener("click", function () {
    handleFormToggle(bankForm, ATMForm, TransactionForm, fetchXaPhuongBankData);
});

addATMButton.addEventListener("click", function () {
    handleFormToggle(ATMForm, bankForm, TransactionForm, function () {
        fetchXaPhuongATMData();
        fetchNganhangATMData();
    });
});

addTransactionButton.addEventListener("click", function () {
    handleFormToggle(TransactionForm, bankForm, ATMForm, function () {
        fetchBankData();
        fetchXaPhuongTransactionData();
    });
});

function fetchNganhangData(selectElementId) {
    fetch("/get-bank")
        .then((response) => response.json())
        .then((data) => {
            var selectElement = document.getElementById(selectElementId);
            selectElement.innerHTML = ""; // Xóa các option hiện có
            var defaultOption = document.createElement("option");
            selectElement.add(defaultOption);

            data.forEach(function (nganhang) {
                var option = document.createElement("option");
                option.value = nganhang.NH_Ma;
                option.text = nganhang.NH_Ten;
                selectElement.add(option);
            });
        })
        .catch((error) => console.error("Lỗi:", error));
}
function fetchBankData() {
    fetchNganhangData("TransactionBank");
}

function fetchNganhangATMData() {
    fetchNganhangData("ATMNH");
}

function fetchXaPhuongData(selectElementId) {
    fetch("/get-xp")
        .then((response) => response.json())
        .then((data) => {
            var selectElement = document.getElementById(selectElementId);
            selectElement.innerHTML = ""; // Xóa các option hiện có
            var defaultOption = document.createElement("option");
            selectElement.add(defaultOption);

            data.forEach(function (xaphuong) {
                var option = document.createElement("option");
                option.value = xaphuong.XP_Ma;
                option.text = xaphuong.XP_Ten;
                selectElement.add(option);
            });
        })
        .catch((error) => console.error("Lỗi:", error));
}

// Sử dụng hàm fetchAndPopulateXaPhuongData để tải dữ liệu và cập nhật select element tương ứng
function fetchXaPhuongBankData() {
    fetchXaPhuongData("XaPhuongBank");
}

function fetchXaPhuongTransactionData() {
    fetchXaPhuongData("XaPhuongTransaction");
}

function fetchXaPhuongATMData() {
    fetchXaPhuongData("ATMXP");
}
