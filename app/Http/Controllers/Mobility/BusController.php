<?php

namespace App\Http\Controllers\Mobility;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

use function Illuminate\Support\now;

class BusController extends Controller
{
    public function createBus(Request $request) {
        $user = $request->user();

        if($user->role !== "petugas") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Akses ditolak'
            ], 403);
        }

        $validated = Validator::make($request->all(), [
            'route_id' => 'required|exists:bus_routes,id',
            'departure' => 'required|date_format:H:i'
        ]);

        if($validated->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid field',
                'errors' => $validated->errors()
            ], 422);
        }

        Bus::create($validated->validated());
        return response()->json([
            'status' => 'Success',
            'message' => 'Bus berhasil dibuat'
        ], 201);
    }


    public function showBus(Request $request) {
        $corridor = $request->query('corridor');
        $departure = $request->query('departure');

        $bus = Bus::query()->join('bus_routes', 'bus_routes.id', '=', 'buses.route_id');

        if($corridor) {
            $bus->where('kode', $corridor);
        }

        if($departure) {
            $bus->where('departure', '>=', $departure);
        }

        $buses = $bus->orderBy('departure')->paginate(10);
        $curPage = $buses->currentPage();
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil mendapatkan bus',
            'page' => $curPage,
            'bus' => $buses->map(function($bis) {
                return [
                    'route_id' => $bis->route_id,
                    'code' => $bis->kode,
                    'direction' => $bis->halte_awal . " - " . $bis->halte_akhir,
                    'departure' => date_format(Carbon::parse($bis->departure), 'H:i')
                ];
            })
        ]);
    }

    public function showRoute() {
        $route = BusRoute::get();

        return response()->json([
            'status' => 'Success',
            'message' => 'Mendapatkan koridor berhasil',
            'corridor' => $route
        ]);
    }
}
