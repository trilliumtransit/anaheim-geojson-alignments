<?php

$api_output = file_get_contents('http://gtfs-api.ed-groth.com/gtfs-api/routes/by-feed/anaheim-ca-us'); 

$jsonvar = json_decode($api_output, true);

$route_alignments = Array();

foreach ($jsonvar as &$value) {

$properties = array(
'name' => $value['route_short_name'],
'route_short_name' => $value['route_short_name'],
'route_long_name' => $value['route_long_name'],
'route_id' => $value['route_id'],
'route_id' => $value['route_id'],
'agency_id' => $value['agency_id'],
'route_color' => $value['route_color']);

$new_array = array(
	'type' => 'Feature',
	'geometry' => $value['simple_n_geojson'],
	'properties' => $properties);

array_push($route_alignments, $new_array);

}

$feature_collection = array(
	'type' => 'FeatureCollection',
	'features' => $route_alignments);

echo json_encode ( $feature_collection);

?>