import "../../node_modules/leaflet/dist/leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";
import 'leaflet.locatecontrol'; // Import plugin
import 'leaflet.locatecontrol/dist/L.Control.Locate.min.css'; // Import styles
import L from "leaflet";
import 'leaflet-routing-machine';


const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);



const divElement = document.getElementById("map");

// L.control.locate().addTo(map);

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


///khu 1 10.015770249325593, 105.76574656514816
//khu 2 10.029942338590846, 105.77061485947323
//khu 3 10.033953731857725, 105.77980042434845

// const latlngs = [[10.015770249325593, 105.76574656514816],[10.029942338590846, 105.77061485947323],[10.033953731857725, 105.77980042434845]]


// const polyline = L.polyline(latlngs, {color: 'blue'}).addTo(map)

// map.fitBounds(polyline.getBounds())


const iconATMIMG = 'https://www.pngrepo.com/download/270054/atm.png'

var iconATM = L.icon({
    iconUrl: iconATMIMG,
    // shadowUrl: 'leaf-shadow.png',

    iconSize:     [30, 50], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


async function getDataFromAPI() {
    fetch('http://127.0.0.1:8000/listbank')
    .then((response) => response.json())
    .then(response => {
        //console.log(response)
        response.forEach(item => {
            const lat = item.NH_KinhDo
            const lng = item.NH_ViDo
            const name = item.NH_Ten
            L.marker([lat, lng]).addTo(map).bindPopup(name).openPopup();
        })
    })

}
getDataFromAPI() 


// L.Routing.control({
//     waypoints: [
//       L.latLng(10.015770249325593, 105.76574656514816),
//       L.latLng(10.029942338590846, 105.77061485947323)
//     ]
//   }).addTo(map)


//ngan hang chap nhan

const btnSearchATM = $('#btnSearchATM')

async function handleSearchATM() {
    const atmSelected = $('#selectBank').value
    const selectService = $('#selectService').value
    const URL = `http://127.0.0.1:8000/getListBankAccept/${selectService}/${atmSelected}`

    fetch(URL)
    .then(response => response.json())
    .then(response => {
        console.log(response)
        response.forEach(item => {
            const idBankAccept = item.NHCN_MaNHCN
            const URLATMOFBANK = `http://127.0.0.1:8000/getListATMOfBank/${idBankAccept}/${selectService}`
            console.log(idBankAccept,URLATMOFBANK)

            fetch(URLATMOFBANK)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                response.forEach(item => {
                    const lat = item.ATM_KinhDo
                    const lng = item.ATM_ViDo
                    const idATM = item.ATM_SoHieu + 'abc'

                    console.log(idATM, lat, lng)

                    L.marker([lat, lng], {icon: iconATM}).addTo(map).bindPopup(idATM).openPopup()
                })
            })
        } )
    })

}

btnSearchATM.addEventListener('click', handleSearchATM)

