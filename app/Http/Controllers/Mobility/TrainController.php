<?php

namespace App\Http\Controllers\Mobility;

use App\Http\Controllers\Controller;
use App\Models\RouteOrder;
use App\Models\Trackway;
use App\Models\Train;
use App\Models\TrainRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TrainController extends Controller
{
    public function createTrain(Request $request) {
        $user = $request->user();
        if($user->role !== "petugas") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Akses ditolak'
            ], 403);
        }

        $validated = Validator::make($request->all(), [
            'code' => 'required',
            'departure' => 'required|date_format:H:i',
            'line' => 'required|in:redline,greenline,blueline,purpleline,brownline',
            'stasiun_awal' => 'required',
            'stasiun_akhir' => 'required'
        ]);

        if($validated->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid Field',
                'errors' => $validated->errors()
            ], 422);
        }

        $train = Train::create([
            'code' => $request['code'],
            'departure' => $request['departure']
        ]);

        $track = Trackway::get();

        //redline
        if($request['line'] === "redline") {
            $redlinetrack = strtolower($request['stasiun_awal']) . strtolower($request['stasiun_akhir']);
            if($redlinetrack === "bogorjakartakota") {
                $route = TrainRoute::create([
                    'train_id' => $train->id,
                    'name' => $request['line'],
                    'direction' => strtolower($request['stasiun_awal']) . "-" . strtolower($request['stasiun_akhir'])
                ]);

                $bogorjakarta = $track[0];
                track_maker($bogorjakarta, $route);

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Kereta berhasil dibuat'
                ], 201);
            }

            if($redlinetrack === "jakartakotabogor") {
                $route = TrainRoute::create([
                    'train_id' => $train->id,
                    'name' => $request['line'],
                    'direction' => strtolower($request['stasiun_awal']) . "-" . strtolower($request['stasiun_akhir'])
                ]);

                $bogorjakarta = $track[0];
                reverse_track_maker($bogorjakarta, $route);

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Kereta berhasil dibuat'
                ], 201);
            }

            if($redlinetrack === "nambojakartakota") {
                $route = TrainRoute::create([
                    'train_id' => $train->id,
                    'name' => $request['line'],
                    'direction' => strtolower($request['stasiun_awal']) . "-" . strtolower($request['stasiun_akhir'])
                ]);

                $nambojakarta = $track[1];
                track_maker($nambojakarta, $route);

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Kereta berhasil dibuat'
                ], 201);
            }

            if($redlinetrack === "jakartakotanambo") {
                $route = TrainRoute::create([
                    'train_id' => $train->id,
                    'name' => $request['line'],
                    'direction' => strtolower($request['stasiun_awal']) . "-" . strtolower($request['stasiun_akhir'])
                ]);

                $nambojakarta = $track[1];
                reverse_track_maker($nambojakarta, $route);

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Kereta berhasil dibuat'
                ], 201);
            }
        }


        //blue line
        if($request['line'] === "blueline") {

        }


        //greenline
        if($request['line'] === "greenline") {
            
        }


        //purpleline
        if($request['line'] === "purpleline") {
            
        }


        //brownline
        if($request['line'] === "brownline") {
            
        }

        return response()->json([
            'status' => 'Error',
            'message' => 'Unknown Route'
        ], 404);
    }


    public function listTrain(Request $request) {
        $train = Train::with('Route')->get();

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil mendapatkan kereta',
            'train' => $train->map(function($train) {
                return [
                    'id' => $train->id,
                    'code' => $train->code,
                    'line' => $train->route[0]->name,
                    'direction' => $train->route[0]->direction,
                    'departure' => date_format(Carbon::parse($train->departure), 'H:i')
                ];
            })
        ]);
    }

    public function detailTrain($id) {
        $train = Train::find($id);
        if(!$train) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Kereta tidak ditemukan'
            ], 404);
        }

        $route = TrainRoute::where('train_id', $id)->first();
        $order = RouteOrder::where('route_id', $route->id)
                            ->join('train_stations', 'train_stations.id', '=', 'route_orders.station_id')
                            ->get();

        $departure = Carbon::parse($train->departure);
        $result = [];

        foreach($order as $routes) {
            $departure->addMinutes($routes->travel_time);

            $result[] = [
                'station' => $routes->name,
                'time' => $departure->format('H:i')
            ];
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Mendapatkan detail kereta berhasil',
            'code' => $train->code,
            'direction' => $route->direction,
            'station' => $result
        ]);
    }
}
