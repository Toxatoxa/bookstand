<?php

namespace App\Http\Controllers;

use App\WorldEvent;
use Carbon\Carbon;
use Laravel\Lumen\Routing\Controller as BaseController;

class WorldEventController extends BaseController
{

    public function index()
    {
        $worldEvents = WorldEvent::select(['id', 'title', 'lat', 'lng'])
            ->today()
            ->get();

        return $worldEvents;
    }

    public function show($id)
    {
        $worldEvent = WorldEvent::with('stands', 'stands.company')->find($id);

        if (!$worldEvent) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        return $worldEvent;
    }
}
