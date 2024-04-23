import "../../node_modules/leaflet/dist/leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";

import "leaflet-control-geocoder";
import L from "leaflet";

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

export default map 
var geocoder = L.Control.Geocoder.nominatim();
L.Control.geocoder({ geocoder }).addTo(map);

// // menu sidebar
// const menuSidebar = document.getElementById("menu-sidebar");
// const sidebar = document.getElementById("sidebar");
// const divMap = document.getElementById("divMap");
// const openSidebar = document.getElementById("openSidebar");
// const closeSidebar = document.getElementById("closeSidebar");

// menuSidebar.addEventListener("click", () => {
//     menuSidebar.classList.toggle("active");

//     if (menuSidebar.classList.contains("active")) {
//         closeSidebar.classList.remove("hidden");
//         openSidebar.classList.add("hidden");
//         sidebar.classList.remove("w-[5%]");
//         divMap.classList.remove("w-[95%]");
//         sidebar.classList.add("w-[20%]");
//         divMap.classList.add("w-[80%]");
//     } else {
//         closeSidebar.classList.add("hidden");
//         openSidebar.classList.remove("hidden");
//         sidebar.classList.add("w-[5%]");
//         divMap.classList.add("w-[95%]");
//         sidebar.classList.remove("w-[20%]");
//         divMap.classList.remove("w-[80%]");
//     }
// });
