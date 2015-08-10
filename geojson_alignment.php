<?php

$api_output = file_get_contents('http://gtfs-api.ed-groth.com/gtfs-api/routes/by-feed/anaheim-ca-us'); 

header('Content-Type: application/json');

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

if (is_null($value['shared_arcs_geojson'])) 
	{$geojson = $value['simple_00004_geojson'];}
else {$geojson = $value['shared_arcs_geojson'];}


$geojson = 

$new_array = array(
	'type' => 'Feature',
	'geometry' => $geojson,
	'properties' => $properties);

array_push($route_alignments, $new_array);

}

$feature_collection = array(
	'type' => 'FeatureCollection',
	'features' => $route_alignments);

echo json_encode ( $feature_collection);

?>