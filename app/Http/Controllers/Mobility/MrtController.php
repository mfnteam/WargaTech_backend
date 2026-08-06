<?php

namespace App\Http\Controllers\Mobility;

use App\Http\Controllers\Controller;
use App\Models\MrtRoute;
use App\Models\MrtStation;
use App\Models\MrtTrains;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class MrtController extends Controller
{
    public function createMrt(Request $request) {
        $user = $request->user();

        if($user->role !== "petugas") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Akses ditolak'
            ], 403);
        }

        $validated = Validator::make($request->all(), [
            'code' => 'required',
            'departure' => 'required|date_format:H:i|after_or_equal:06:00|before_or_equal:23:00',
            'destination' => 'required|in:lebakbulus,bundaranhi'
        ], [
            'destination.in' => 'Tolong pilih antara lebakbulus atau bundaranhi'
        ]);

        if($validated->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid field',
                'errors' => $validated->errors()
            ], 422);
        }

        if($request['destination'] === "lebakbulus") {
            $statid = [];
            foreach(MrtStation::get('id') as $id) {
                $statid[] = $id->id;
            }

            $statid = array_reverse($statid);
            $mrt = MrtTrains::create([
                'code' => $request['code'],
                'departure' => $request['departure'],
                'destination' => strtolower($request['destination'])
            ]);

            route_to_lb($mrt, $statid);

            return response()->json([
                'status' => 'Success',
                'message' => 'Berhasil membuat kereta'
            ]);
        }


        if($request['destination'] === "bundaranhi") {
            $mrt = MrtTrains::create([
                'code' => $request['code'],
                'departure' => $request['departure'],
                'destination' => strtolower($request['destination'])
            ]);

            route_to_bh($mrt);

            return response()->json([
                'status' => 'Success',
                'message' => 'Berhasil membuat kereta'
            ]);
        }
    }


    public function showMrt() {
        $mrt = MrtTrains::with('MrtRoute')->get();

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil mendapatkan kereta',
            'train' => $mrt->map(function($krt) {
                $depart = Carbon::parse($krt->departure);
                return [
                    'id' => $krt->id,
                    'code' => $krt->code,
                    'departure' => date_format($depart, 'H:i'),
                    'destination' => $krt->destination,
                    'station' => MrtRoute::where('train_id', $krt->id)->join('mrt_stations', 'mrt_stations.id', '=', 'mrt_routes.station_id')->get()->map(function($st) use($depart){
                        return [
                            'station' => $st->name,
                            'time' => date_format($depart->addMinutes($st->travel_time), 'H:i')
                        ];
                    })
                ];
            })
        ]);
    }
}
