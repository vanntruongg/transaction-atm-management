import map from './index.js';
import "leaflet/dist/leaflet";
import L from "leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";
import "leaflet.locatecontrol"; // Import plugin
import "leaflet.locatecontrol/dist/L.Control.Locate.min.css"; // Import styles
import 'leaflet-routing-machine';

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const inputRange = $('.inputRange')
const selectBank = $('#selectBank')
const selectService = $('#selectService')
const selectRange = $('#selectRange')
const btnSearchATM = $("#btnSearchATM");
var routingControls = [];


const atmIcon = L.icon({
    iconUrl: "/storage/images/atm-icon.png",
    iconSize: [64, 64],
    iconAnchor: [16, 32],
    popupAnchor: [14, -32],
});


async function initMap() {
    fetch('http://127.0.0.1:8000/getdataInit')
    .then((response) => response.json())
    .then((response) => {
        

        const dataBank = response.dataBank
        const dichVu = response.dichVu
        const range = response.range

        const htmlDataBank = dataBank.map(bank => {
            return `<option value="${bank.NH_Ma}">${bank.NH_Ten}</option>`
        }).join('')

        const htmlDataService = dichVu.map(dv => {
            return `<option value="${dv.DV_Ma}">${dv.DV_Ten}</option>`
        }).join('')



        selectBank.innerHTML = htmlDataBank
        selectService.innerHTML = htmlDataService
        selectRange.max = range
        

        console.log(response,dataBank, dichVu, range, htmlDataBank);
    })
    .catch((error) => console.error(error))

}

initMap()

const divElement = document.getElementById("divMap");


//  ctu
const lat = 10.029939;
const lng = 105.76804;


// L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
//     attribution:
//         '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
// }).addTo(map);

L.marker([lat, lng]).addTo(map).bindPopup("Đại học Cần Thơ khu II").openPopup();



// async function getDataFromAPI() {
//     fetch("http://127.0.0.1:8000/listbank")
//         .then((response) => response.json())
//         .then((response) => {
//             //console.log(response)
//             response.forEach((item) => {
//                 const lat = item.NH_KinhDo;
//                 const lng = item.NH_ViDo;
//                 const name = item.NH_Ten;
//                 L.marker([lat, lng]).addTo(map).bindPopup(name).openPopup();
//             });
//         });
// }

//change range

const handleChangeRange = (e) => {
    e.target.nextSibling.innerHTML = e.target.value
}

inputRange.addEventListener('change', handleChangeRange)


//clear map

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


//ngan hang chap nhan



async function handleSearchATM() {
    let range = inputRange.value
    const atmSelected = $('#selectBank').value
    const selectService = $('#selectService').value
    const URL = range == 0?`http://127.0.0.1:8000/getListBankAccept/${selectService}/${atmSelected}`:`http://127.0.0.1:8000/getListBankAccept/${selectService}/${atmSelected}/${range}`

    console.log(inputRange.value,URL)
    clearMap()

    fetch(URL)
    .then(response => response.json())
    .then(response => {
        console.log(response)
        response.forEach(itembank => {
            const idBankAccept = itembank.NHCN_MaNHCN
            const URLATMOFBANK = `http://127.0.0.1:8000/getListATMOfBank/${idBankAccept}/${selectService}`
            //console.log(idBankAccept,URLATMOFBANK)

            fetch(URLATMOFBANK)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                response.forEach(item => {
                    const latATM = item.ATM_KinhDo
                    const lngATM = item.ATM_ViDo
                    const idATM = item.ATM_SoHieu + 'abc'

                    console.log(idATM, latATM, lngATM)

                    L.marker([latATM, lngATM], {icon: atmIcon}).addTo(map).bindPopup(idATM).openPopup();



                    const routingControl = L.Routing.control({
                        waypoints: [
                        L.latLng(lat, lng),
                        L.latLng(latATM, lngATM)
                        ],
                        createMarker: function() { return null; },
                        show: false
                    }).addTo(map)

                    routingControls.push(routingControl)
                })
            })
        } )
    })


    searchBox.classList.add('hidden')
    divElement.classList.remove('-z-10')
}

console.log(L);

btnSearchATM.addEventListener('click', handleSearchATM)

//hien thi component search

const btnShowSearch = $('#btnShowSearch')
const searchBox = $('#findATM')
const btnCloseSearchBox = $('#btnCloseSearchBox')


btnCloseSearchBox.addEventListener('click', () => {

    searchBox.classList.add('hidden')
    divElement.classList.remove('-z-10')
})



btnShowSearch.addEventListener('click', () => {
    console.log(12345)
    searchBox.classList.remove('hidden')
    divElement.classList.add('-z-10')
})






