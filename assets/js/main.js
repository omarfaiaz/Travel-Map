const map = L.map("map").setView([39.48697461389864, -95.90724482313838], 5, {
  color: "red",
});

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "© OpenStreetMap. Developed by Omar",
}).addTo(map);

stores.features.forEach((store, i) => {
  let myIcon = L.icon({
    iconUrl: `${assets.url}/images/${store.properties.type}.svg`,

    iconSize: [42, 42],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    className: "hospital-icon",
  });
  L.marker([store.geometry.coordinates[0], store.geometry.coordinates[1]], {
    icon: myIcon,
  })
    .bindPopup(
      `<div class="map-popup"><h4 class="title">${store.properties.name}</h4>
                <p> ${store.properties.desc} </p>
                <span class="tr-type">${store.properties.city} </span>
                <span class="tr-type">${store.properties.type} </span>
    </div>`
    )
    .openPopup()
    .addTo(map);
});


function generateList() {
  ul = document.querySelector(".list");
  stores.features.forEach((store, i) => {
    const li = document.createElement("li");
    const a = document.createElement("a");
    const p = document.createElement("p");
    const city = document.createElement("city");
    const type = document.createElement("span");
    const div = document.createElement("div");
    type.classList.add("tr-type");
    city.classList.add("tr-type");
    div.classList.add("list-item");
    a.classList.add("title");
    li.classList.add("location");

    a.innerHTML = store.properties.name;
    p.innerHTML = store.properties.desc;
    city.innerHTML = store.properties.city;
    type.innerHTML = store.properties.type;
    a.addEventListener("click", function () {
      flyToStore(store);
    });
    div.appendChild(a);
    div.appendChild(p);
    div.appendChild(city);
    div.appendChild(type);
    li.appendChild(div);
    ul.appendChild(li);
  });
}
generateList();

function flyToStore(store) {
  map.flyTo(
    [store.geometry.coordinates[0], store.geometry.coordinates[1]],
    14,
    {
      duration: 2,
    }
  );
}
