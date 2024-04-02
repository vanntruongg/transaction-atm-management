import "../../node_modules/leaflet/dist/leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";

import L from "leaflet";

// const divElement = document.getElementById("map");

// //  ctu
const lat = 10.029939;
const lng = 105.76804;

// const map = L.map(divElement, {
//     center: [lat, lng],
//     zoom: 15,
// });

// L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
//     attribution:
//         '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
// }).addTo(map);

// L.marker([lat, lng]).addTo(map).bindPopup("Đại học Cần Thơ khu II").openPopup();

const pgdIcon = L.icon({
    iconUrl: "/storage/images/pgd_icon.png",
    iconSize: [64, 64],
    iconAnchor: [16, 32],
    popupAnchor: [14, -32],
});

// Tạo icon cho trụ ATM
const atmIcon = L.icon({
    iconUrl: "/storage/images/atm_icon.png",
    iconSize: [64, 64],
    iconAnchor: [16, 32],
    popupAnchor: [14, -32],
});

async function getDataFromAPI() {
    let data = fetch("http://127.0.0.1:8000/listbank")
        .then((response) => response.json())
        .then((response) => {
            console.log(response);
            response.forEach((item) => {
                const lat = item.ATM_KinhDo;
                const lng = item.ATM_ViDo;
                const name = item.ATM_DiaChi;
                L.marker([lat, lng], { icon: atmIcon })
                    .addTo(map)
                    .bindPopup(name)
                    .openPopup();
            });
        });
}

async function getPGDFromAPI() {
    let pgd = fetch("http://127.0.0.1:8000/listpgd")
        .then((response) => response.json())
        .then((response) => {
            console.log(response);
            response.forEach((item) => {
                const lat = item.PGD_KinhDo;
                const lng = item.PGD_ViDo;
                const name = item.PGD_Ten;
                L.marker([lat, lng], { icon: pgdIcon })
                    .addTo(map)
                    .bindPopup(name)
                    .openPopup();
            });
        });
}

//
function clearMap() {
    map.eachLayer(function (layer) {
        if (layer instanceof L.Marker) {
            map.removeLayer(layer);
        }
    });
}
//
document.getElementById("atmButton").addEventListener("click", function () {
    clearMap();
    getDataFromAPI();
    L.marker([lat, lng])
        .addTo(map)
        .bindPopup("Đại học Cần Thơ khu II")
        .openPopup();
});
//
document.getElementById("pgdButton").addEventListener("click", function () {
    clearMap();
    getPGDFromAPI();
    L.marker([lat, lng])
        .addTo(map)
        .bindPopup("Đại học Cần Thơ khu II")
        .openPopup();
});
