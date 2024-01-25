import "../../node_modules/leaflet/dist/leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";

import L, { icon } from "leaflet";

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
// abc
//pvcombank 10.02580439585616, 105.77510259173526

const latlng = [
    10.02580439585616, 105.77510259173526
]

L.marker(latlng).addTo(map).bindPopup("PVComBank").openPopup();
//test 10.0354,105.774
const latIng1 = [10.0354,105.774]
L.marker(latIng1).addTo(map).bindPopup("TesComBank").openPopup();
