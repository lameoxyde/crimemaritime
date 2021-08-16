<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Page as PageResource;
use App\Models\Page;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::all();

        $geoJSONdata = $pages->map(function ($page) {
            return [
                'type'       => 'Feature',
                'properties' => new PageResource($page),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $page->longitude,
                        $page->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
