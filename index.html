<!DOCTYPE html>
<html>
<head>
    <title>Peta Buton</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body { margin:0; padding:0; font-family:'PT Serif',serif; background:#f4f1ec; }
        #map { width:100%; height:650px; }

        /* LEGEND KECIL ESTETIK */
        .small-legend {
            position: absolute;
            left: 16px;
            bottom: 24px;
            z-index: 999;
            background: #fffcf1;
            border-radius: 6px;
            border: 1px solid #c4ccac;
            box-shadow: 1px 2px 7px #bbb;
            padding: 7px 11px 7px 13px;
            min-width: 120px;
            max-width: 170px;
            max-height: 160px;
            overflow-y: auto;
            font-family: 'Montserrat', sans-serif;
            font-size: 11px;
            color: #324c1c;
            scrollbar-color: #91b254 #fafbe7;
            scrollbar-width: thin;
        }
        .small-legend h4 {
            margin: 0 0 7px 0;
            font-size: 12px;
            font-weight: bold;
            color: #3c5e20;
            border-bottom: 1px solid #d0dfcf;
            padding-bottom: 3px;
            letter-spacing: 1px;
        }
        .small-legend img { width: 94%; max-width:120px; border-radius:3px; margin-bottom:4px; }
        .legend-label {
            color: #2a3617;
            font-size: 11px;
            margin-bottom:3px;
            display:block;
        }
        .legend-marker {
            width: 14px; height: 14px;
            border-radius: 8px;
            border: 1.5px solid #e8580b;
            background: #fff8f0;
            margin-right: 4px;
            display:inline-block;
            vertical-align:middle;
        }
    </style>
</head>

<body>
<div id="map"></div>

<!-- LEGEND CUSTOM -->
<div class="small-legend">
    <h4>Legenda</h4>

    <!-- Batas Kecamatan -->
    <img src="http://localhost:8080/geoserver/pgwebacara10/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=pgwebacara10:ADMINISTRASIKECAMATAN_AR_50K">
    <span class="legend-label">Batas Kecamatan</span>

    <!-- Jalan -->
    <img src="http://localhost:8080/geoserver/polyline/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=polyline:jalan">
    <span class="legend-label">Jalan</span>

    <!-- Titik -->
    <span class="legend-marker"></span>
    <span class="legend-label" style="display:inline;">Titik Kecamatan</span>
</div>

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
var kecamatan = L.tileLayer.wms("http://localhost:8080/geoserver/pgwebacara10/wms", {
    layers: "pgwebacara10:ADMINISTRASIKECAMATAN_AR_50K",
    format: "image/png",
    transparent: true
}).addTo(map);

var jalan = L.tileLayer.wms("http://localhost:8080/geoserver/polyline/wms", {
    layers: "polyline:jalan",
    format: "image/png",
    transparent: true
}).addTo(map);

var titikWMS = L.tileLayer.wms("http://localhost:8080/geoserver/ne/wms", {
    layers: "ne:data_perkecamatan",
    format: "image/png",
    transparent: true
});

// =======================
// TITIK KECAMATAN (GeoJSON Manual)
// =======================
// → Ganti data ini dari PHP/MySQL jika sudah tersedia
var geojson_titik = {
    "type": "FeatureCollection",
    "features": [
        {"type":"Feature","geometry":{"type":"Point","coordinates":[122.45,-5.316]},"properties":{"kecamatan":"Lasalimu"}},
        {"type":"Feature","geometry":{"type":"Point","coordinates":[122.56,-5.29]},"properties":{"kecamatan":"Lasalimu Selatan"}}
        // Tambahkan titik lain…
    ]
};

var titikMarker = L.geoJSON(geojson_titik, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, {
            radius: 6,
            fillColor: "#fff8f0",
            color: "#e8580b",
            weight: 2,
            opacity: 1,
            fillOpacity: 0.95
        }).bindPopup("Kecamatan: " + feature.properties.kecamatan);
    }
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
    "<b>Titik WMS</b> (opsional)": titikWMS,
    "<b>Titik Marker</b> (rekomendasi)": titikMarker
};

L.control.layers(baseMaps, overlayMaps).addTo(map);

</script>

</body>
</html>
