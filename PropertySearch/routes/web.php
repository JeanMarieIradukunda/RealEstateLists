<?php

use Illuminate\Support\Facades\Http;

Route::get('/fetch-properties', function () {
    $response = Http::withHeaders([
        'X-RapidAPI-Host' => 'real-estate-records.p.rapidapi.com',
        'X-RapidAPI-Key' => 'ce4d0af9eemsh808dd8802dfaed1p10c978jsn8bee98fae01f',
    ])->get('https://real-estate-records.p.rapidapi.com/search/zipcode', [
        'zipcode' => '10019',
        'page' => 1,
    ]);

    $properties = $response->json();

    return view('properties', compact('properties'));
});

Route::post('/search-properties', function () {
    $zipcode = request('zipcode');

    // Perform the API request using the provided zipcode
    $response = Http::withHeaders([
        'X-RapidAPI-Host' => 'real-estate-records.p.rapidapi.com',
        'X-RapidAPI-Key' => 'ce4d0af9eemsh808dd8802dfaed1p10c978jsn8bee98fae01f',
    ])->get('https://real-estate-records.p.rapidapi.com/search/zipcode', [
        'zipcode' => $zipcode,
        'page' => 1,
    ]);

    $properties = $response->json();

    return view('properties', compact('properties'));
});

Route::post('/search-properties-by-type', function () {
    $propertyType = request('property_type');

    // Perform the API request using the provided property type
    $response = Http::withHeaders([
        'X-RapidAPI-Host' => 'real-estate-records.p.rapidapi.com',
        'X-RapidAPI-Key' => 'ce4d0af9eemsh808dd8802dfaed1p10c978jsn8bee98fae01f',
    ])->get('https://real-estate-records.p.rapidapi.com/search/propertyType', [
        'propertyType' => $propertyType,
        'page' => 1,
    ]);

    $properties = $response->json();

    return view('properties', compact('properties'));
});
