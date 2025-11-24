<!DOCTYPE html>
<html>
<head>
    <title>Peta Buton</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        #map {
            width: 100%;
            height: 650px;
        }

        .legend-box {
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            font-size: 13px;
            line-height: 18px;
        }
    </style>
</head>
<body>

<div id="map"></div>

<script>
// =======================
// MAP & BASEMAP
// =======================
var map = L.map("map").setView([-5.316, 122.45], 10);

var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19
}).addTo(map);

// =======================
// WMS LAYERS
// =======================

// Layer Kecamatan
var kecamatan = L.tileLayer.wms("http://localhost:8080/geoserver/pgwebacara10/wms", {
    layers: "pgwebacara10:ADMINISTRASIKECAMATAN_AR_50K",
    format: "image/png",
    transparent: true
}).addTo(map);

// Layer Jalan
var jalan = L.tileLayer.wms("http://localhost:8080/geoserver/polyline/wms", {
    layers: "polyline:jalan",
    format: "image/png",
    transparent: true
}).addTo(map);

// Layer Titik
var titik = L.tileLayer.wms("http://localhost:8080/geoserver/ne/wms", {
    layers: "ne:data_perkecamatan",
    format: "image/png",
    transparent: true
}).addTo(map);

// =======================
// LAYER CONTROL
// =======================
var baseMaps = {
    "OpenStreetMap": osm
};

var overlayMaps = {
    "<b>Batas Kecamatan</b>": kecamatan,
    "<b>Jalan</b>": jalan,
    "<b>Titik</b>": titik
};

L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

// =======================
// LEGEND DARI GEOSERVER
// =======================
PageTransitionEvent
// URL legend dari GeoServer:
var legendUrls = {
    kecamatan: "http://localhost:8080/geoserver/pgwebacara10/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=pgwebacara10:ADMINISTRASIKECAMATAN_AR_50K",
    jalan: "http://localhost:8080/geoserver/polyline/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=polyline:jalan",
    titik: "http://localhost:8080/geoserver/ne/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=ne:data_perkecamatan"
};

var legend = L.control({ position: "bottomright" });

legend.onAdd = function () {
    var div = L.DomUtil.create("div", "legend-box");

    div.innerHTML = `
        <b>Legenda</b><br><br>
        
        <b>Batas Kecamatan</b><br>
        <img src="${legendUrls.kecamatan}" alt="legend kecamatan"><br><br>

        <b>Jalan</b><br>
        <img src="${legendUrls.jalan}" alt="legend jalan"><br><br>

        <b>Titik</b><br>
        <img src="${legendUrls.titik}" alt="legend titik"><br>
    `;

    return div;
};

legend.addTo(map);

</script>

</body>
</html>
