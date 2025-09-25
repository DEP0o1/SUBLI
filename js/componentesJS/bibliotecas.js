const GEOAPIFY_API_KEY = "e938c7d8eb564dfea32db687120f4553";
const cardsContainer = document.getElementById("cardsContainer");

let map;
let userLat, userLon;

function initMap(lat, lon) {
  userLat = lat;
  userLon = lon;

  map = L.map("map").setView([lat, lon], 14);
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", { attribution: "" }).addTo(map);
  L.marker([lat, lon]).addTo(map).bindPopup("📍 Você está aqui").openPopup();

  fetchLibraries(lat, lon);
}

function fetchLibraries(lat, lon) {
  const url = `https://api.geoapify.com/v2/places?categories=education.library&filter=circle:${lon},${lat},10000&limit=50&apiKey=${GEOAPIFY_API_KEY}`;

  fetch(url)
    .then(res => res.json())
    .then(data => {
      if (!data.features || data.features.length === 0) {
        cardsContainer.innerHTML = "<p>Nenhuma biblioteca encontrada próxima.</p>";
        return;
      }

      data.features.forEach(feature => {
        const coords = feature.geometry.coordinates;
        const name = feature.properties.name || "Biblioteca";
        const address = feature.properties.address_line1 || "Endereço não disponível";
        const distance = getDistanceFromLatLonInKm(lat, lon, coords[1], coords[0]).toFixed(2);
        const image = feature.properties.photos?.[0]?.href || "https://via.placeholder.com/300x150?text=Biblioteca";
        
        L.marker([coords[1], coords[0]]).addTo(map)
          .bindPopup(`<b>${name}</b><br>${address}<br>${distance} km de você`);

      });
})
    .catch(err => console.error(err));
}

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
  const R = 6371;
  const dLat = deg2rad(lat2 - lat1);
  const dLon = deg2rad(lon2 - lon1);
  const a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  return R * c;
}
function deg2rad(deg) { return deg * (Math.PI / 180); }

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    pos => initMap(pos.coords.latitude, pos.coords.longitude),
    () => initMap(-23.9609, -46.3336) 
  );
} else {
  initMap(-23.9609, -46.3336);
}
