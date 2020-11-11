<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('search_form');
});

Route::post('/scrap', function (Request $request) {
    //$scrapHtml =  file_get_contents('http://103.247.238.92/webportal/pages/dashboard_maternal_delivery.php');
	
	//dd($request->all());
	$search_array = array(
		"year"=>$request->year,
		"month"=>$request->month,
		"division"=>$request->division,
		"district"=>$request->district,
		"upazila"=>$request->upazila,
		"Submit"=>"Search",
		
	);
	$response = Http::asForm()->post('http://103.247.238.92/webportal/pages/dashboard_maternal_delivery.php',$search_array);
	$scrapHtml = $response->body();
	preg_match_all("'var data = google.visualization.arrayToDataTable\(\[\n(.*)]\);'sU", $scrapHtml, $data);
	//preg_match_all("/,(.*)\,/", $data[0][0], $data1);
	
	$str = str_replace("\n", "", $data[0][0]);
	$str = str_replace(' ', '', $str);
	preg_match_all("/([A-Z,0-9'])\w+/", $str, $data1);
   
	//var_dump('<pre>'.print_r($data[0][0],true).'</pre>');
	

	echo "<h3> ".str_replace("'", '', $data1[0][17]).' : <h3></br>';
	$norm_del = intval(str_replace("'", '', $data1[0][19]));
	echo "Normal delivery : ".$norm_del.'</br>';
	
	$c_sec = intval(str_replace("'", '', $data1[0][21]));
	echo "C-Section : ".$c_sec.'</br>';
	echo '<a href="'.URL::to('/').'">Search again</a>';
	//dd($data1);
});

Route::get('/get_by_division', function (Request $request) {
    //$scrapHtml =  file_get_contents('http://103.247.238.92/webportal/pages/dashboard_maternal_delivery.php');
	
	//dd($request->all());
	$search_array = array(
		"division_id"=>$request->devision_id,
		
	);
	
	//dd($request->input('division_id'));
	$url = 'http://103.247.238.92/webportal/pages/ajaxDataDistrictDHIS2Dashboard.php?division_id='.$request->input('division_id');
	$response = Http::get($url);
	$scrapHtml = $response->body();
	//dd($url);
	return $scrapHtml;
	
	//dd($data1);
});


Route::get('/get_by_district', function (Request $request) {
    //$scrapHtml =  file_get_contents('http://103.247.238.92/webportal/pages/dashboard_maternal_delivery.php');
	
	//dd($request->all());
	
	//dd($request->input('division_id'));
	$url = 'http://103.247.238.92/webportal/pages/ajaxDataUpazillaDHIS2Dashboard.php?district_id='.$request->input('district_id');
	$response = Http::get($url);
	$scrapHtml = $response->body();
	//dd($url);
	return $scrapHtml;
	
	//dd($data1);
});