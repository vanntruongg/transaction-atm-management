import "../../node_modules/leaflet/dist/leaflet";
import "../../node_modules/leaflet/dist/leaflet.css";

import L from "leaflet";
import map from "./index.js"

import axios from "axios";
// //  ctu
// const divElement = document.getElementById("map")


//  ctu
const lat = 10.029939;
const lng = 105.76804;

// const map = L.map(divElement, {
//     center: [lat, lng],
//     zoom: 15,
// });

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

L.marker([lat, lng]).addTo(map).bindPopup("Đại học Cần Thơ khu II").openPopup();


const pgdIcon = L.icon({
    iconUrl: "/storage/images/pgd_icon.png",
    iconSize: [64, 64],
    iconAnchor: [16, 32],
    popupAnchor: [14, -32],
});

// Tạo icon 
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

//cls
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
// dropdown
// Dropdown ATM
const atmButton = document.getElementById('atmButton');
const atmDropdown = document.getElementById('atmDropdown');

let atmTimer;

atmButton.addEventListener('mouseenter', function() {
    clearTimeout(atmTimer);
    atmDropdown.classList.remove('hidden');
});

atmButton.addEventListener('mouseleave', function() {
    atmTimer = setTimeout(function() {
        atmDropdown.classList.add('hidden');
    }, 200);
});

atmDropdown.addEventListener('mouseenter', function() {
    clearTimeout(atmTimer);
});

atmDropdown.addEventListener('mouseleave', function() {
    atmTimer = setTimeout(function() {
        atmDropdown.classList.add('hidden');
    }, 200); 
});

// Dropdown PGD
const pgdButton = document.getElementById('pgdButton');
const pgdDropdown = document.getElementById('pgdDropdown');

let pgdTimer;

pgdButton.addEventListener('mouseenter', function() {
    clearTimeout(pgdTimer);
    pgdDropdown.classList.remove('hidden');
});

pgdButton.addEventListener('mouseleave', function() {
    pgdTimer = setTimeout(function() {
        pgdDropdown.classList.add('hidden');
    }, 200); 
});

pgdDropdown.addEventListener('mouseenter', function() {
    clearTimeout(pgdTimer);
});

pgdDropdown.addEventListener('mouseleave', function() {
    pgdTimer = setTimeout(function() {
        pgdDropdown.classList.add('hidden');
    }, 200); 
});



const handleInitData = () => {

    axios.get('/baseData')
    .then(response => {
        const dataATM = response.data.dataATM
        const dataPGD = response.data.dataPGD

        const htmlATMDropDown = dataATM.map(atm => {
            return `<a  class="bank block px-4 py-2 text-gray-800 hover:bg-gray-200" data-key="${atm.NH_Ma}">${atm.NH_Ten}</a>`
        }).join('')

        atmDropdown.innerHTML = htmlATMDropDown
        

        const htmlpgdDropdown = dataPGD.map(pgd => {
            return `<a  class="pgd block px-4 py-2 text-gray-800 hover:bg-gray-200" data-key="${pgd.PGD_Ma}">${pgd.NH_Ten}</a>`
        }).join('')
        pgdDropdown.innerHTML = htmlpgdDropdown
        console.log(dataATM, dataPGD)
    })
    .catch(err => console.log(err))

}

handleInitData()

const handleShowATMOfBank = (e) => {
    const id = e.target.getAttribute('data-key')
    
    clearMap();
    L.marker([lat, lng])
    .addTo(map)
    .bindPopup("Đại học Cần Thơ khu II")
    .openPopup();

    axios.get(`/listatm/${id}`)
    .then(response => {
        
        const list = response.data.ATMOfBank

        list.forEach(atm => {
            const lat = atm.ATM_KinhDo;
            const lng = atm.ATM_ViDo;
            const name = atm.ATM_DiaChi;
            L.marker([lat, lng], { icon: atmIcon })
                .addTo(map)
                .bindPopup(name)
                .openPopup();

        })


    })
    .catch(err => console.log(err))


}
const handleShowPGDOfBank = (e) => {
    const id = e.target.getAttribute('data-key')
    
    clearMap();
    L.marker([lat, lng])
    .addTo(map)
    .bindPopup("Đại học Cần Thơ khu II")
    .openPopup();

    axios.get(`/listpgd/${id}`)
    .then(response => {
        
        const list = response.data.PGDOfBank

        list.forEach(pgd => {
            const lat = pgd.PGD_KinhDo;
            const lng = pgd.PGD_ViDo;
            const name = pgd.PGD_DiaChi;
            L.marker([lat, lng], { icon: pgdIcon })
                .addTo(map)
                .bindPopup(name)
                .openPopup();

        })


    })
    .catch(err => console.log(err))


}


setTimeout(() => {
    const banks = document.querySelectorAll('.bank')
    const pgds = document.querySelectorAll('.pgd')
    console.log(banks, pgds)

    banks.forEach(bank => {
        bank.addEventListener('click', handleShowATMOfBank)
    })

    pgds.forEach(pgd => {
        pgd.addEventListener('click', handleShowPGDOfBank)
    })
}, 3000)



