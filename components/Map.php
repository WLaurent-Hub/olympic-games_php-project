<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
		#map {
			height:100%;
			width: 100%;
		}
	</style>
</head>

<div id='map'></div>

<!-- PHP -->
<?php
    if (!empty($_SESSION['username'])) {
        include('../database/sql_request.php');
    } else {
        include('database/sql_request.php');
    }
?>
<!-- END PHP -->

<script type='text/javascript'>
    const map = L.map('map').setView([48.864716, 2.349014], 11);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    // Encodage de l'array en json
    var list_commerce = <?php echo json_encode($list_commerce); ?>;
    //Fonction JS qui nous permet de transformer puis d'intégrer les objets de la liste à un GeoJson
    function getGeoJSON(list_features) {
    var geoJSON = {
        "type": "FeatureCollection",
        'crs': {
                    'type': 'name',
                    'properties': {
                    'name': 'EPSG:4326',
                    }
                },
        "features": [],
    };

    // Boucle dans la liste
    for(var i = 0; i < list_features.length; i++) {
        var element = list_features[i];
        // Création de l'objet "Feature"
        var feature = {
            "type": "Feature",
            "geometry": {},
            "properties": {}
        };
        for(var key in element) {
            if(key == "geom") {
                // Récupération de la géométrie de l'objet
                feature.geometry = JSON.parse(element[key]);
                // const obj = JSON.parse(element[key]);
                // feature.geometry = obj.coordinates;
            }
            else {
                // Récupération des autres champs, et intégration dans les propriétés de l'objet
                feature.properties[key] = element[key];
            }
        }
            // Lorsque le feature est créé, ajout à la liste GeoJson
            geoJSON.features.push(feature);
        }
        // Retour du résultat
        return geoJSON;
    }

    /**
     * Fonction qui s'exécute pour chaque feature du geoJSON (permet d'afficher les infos popup lorsqu'on clique sur un feature)
     */

    function onEachFeature(feature, layer) {
		let popupContent = feature.properties.cp ? `<p>Commune : ${feature.properties.cp}</p>` : `<p>Commune n° : ${feature.properties.gid}</p>`;
        if (feature.properties.nombre_cinema) {
            popupContent += `Nombre d'hotel : ${feature.properties.nombre_commerce}</br>`;
            popupContent += `Nombre de cinéma : ${feature.properties.nombre_cinema}`;
        } else if (feature.properties.gid){
            popupContent += ``;
        }
		else {
			popupContent += `Nombre de commerce : ${feature.properties.nombre_commerce}`;
		}

		layer.bindPopup(popupContent);
	}

    // Passage de la liste à la fonction pour création du GeoJson
    // console.log('the output geojson: ');
    var list_commerce_geojson = getGeoJSON(list_commerce);

    /* global list_commerce_layer coorsField */
    const list_commerce_layer = L.geoJSON([list_commerce_geojson], {
    // style(feature) {
    //     return feature.properties && feature.properties.style;
    // },
    onEachFeature,

    pointToLayer(feature, latlng) {
        return L.circleMarker(latlng, {
            radius: 8,
            fillColor: '#ff7800',
            color: '#000',
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        });
    }
    }).addTo(map);


</script>

