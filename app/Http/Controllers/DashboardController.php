<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Models\Polylines;
use App\Models\Polygons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->points = new Points();
        $this->polylines = new Polylines();
        $this->polygon = new Polygons();
    }

    public function index()
    {
        // Read the GeoJSON file
        $path = public_path('Jabodetabek_New.json');
        $geoJson = File::get($path);
        $geoData = json_decode($geoJson, true);

        // Count the number of polygons
        $polygonCount = 0;
        foreach ($geoData['features'] as $feature) {
            if ($feature['geometry']['type'] === 'Polygon' || $feature['geometry']['type'] === 'MultiPolygon') {
                $polygonCount++;
            }
        }

        // Prepare data for the view
        $data = [
            "title" => "Data",
            "total_points" => $this->points->count(),
            "total_polylines" => $this->polylines->count(),
            "total_polygons" => $polygonCount, // Update with the count from GeoJSON
        ];
        return view('dashboard', $data);
    }
}
