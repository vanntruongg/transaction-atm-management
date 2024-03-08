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
L.Control.geocoder().addTo(map);

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





