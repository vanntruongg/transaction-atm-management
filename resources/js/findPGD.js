import L from "leaflet";
import map from './index.js';
import "leaflet/dist/leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";
// import "leaflet.locatecontrol"; // Import plugin
// import "leaflet.locatecontrol/dist/L.Control.Locate.min.css"; // Import styles
// import 'leaflet-routing-machine';


import axios from "axios";


const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const searchBoxPGD = $('#searchBoxPGD')
const selectBankPGD = $('#selectBankPGD')
const btnSearchPGD = $('#btnSearchPGD')
const btnCloseSearchBoxPGD = $('#btnCloseSearchBoxPGD')
const findPGD = $('#findPGD')
const btnShowSearchPGD = $('#btnShowSearchPGD')
const divElement = document.getElementById("divMap")

//  ctu
const lat = 10.029939;
const lng = 105.76804;

const pgdIcon = L.icon({
    iconUrl: "/storage/images/iconPGD.jpg",
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [14, -32],
});

const clearMap = () => {
    map.eachLayer((layer) => {
        if(layer instanceof L.Marker) 
            map.removeLayer(layer);
    })

    const containers = $$(".leaflet-routing-container")
    containers.forEach(con => con.remove())

    routingControls.forEach(routingControl => {
        map.removeControl(routingControl)
    })
}

const initData = () => {
    axios.get('/get-bank')
    .then(response => {
        const banks = response.data

        const htmlBanksOption = banks.map(bank => {
            return `<option value="${bank.NH_Ma}">${bank.NH_Ten}</option>`
        }).join('')
        selectBankPGD.innerHTML += htmlBanksOption
    })
    .catch(error => console.log(error))
}
initData()

btnCloseSearchBoxPGD.addEventListener('click', function () {
    findPGD.classList.add('hidden')
    divElement.classList.remove('-z-10')
})


btnShowSearchPGD.addEventListener('click', function () {
    console.log(12345)
    findPGD.classList.remove('hidden')
    divElement.classList.add('-z-10')
})

var routingControls = []


async function handleSearchPGD () {

    clearMap()

    const idBank = selectBankPGD.value
    axios.get(`/getPGD/${idBank}`)
    .then(response => {
        const listPGD = response.data.listPGD

        listPGD.forEach(pgd => {

            const latPGD = pgd.PGD_KinhDo
            const lngPGD = pgd.PGD_ViDo
            const namePGD = pgd.PGD_Ten
            console.log(latPGD, lngPGD, namePGD);

            L.marker([latPGD, lngPGD], {icon: pgdIcon}).addTo(map).bindPopup(namePGD).openPopup()

            const Lcontrol = L.Routing.control({
                waypoints: [
                L.latLng(lat, lng),
                L.latLng(latPGD, lngPGD)
                ],
                createMarker: function() { return null; }
            }).addTo(map)
            
            routingControls.push(Lcontrol)
        })

    })
    .catch(error => console.log(error))

    findPGD.classList.add('hidden')
    divElement.classList.remove('-z-10')
}

btnSearchPGD.addEventListener('click', handleSearchPGD)






