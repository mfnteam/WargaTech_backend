<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Medical;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

use function Illuminate\Support\now;

class ServiceController extends Controller
{
    public function booking(Request $request) {
        $user = $request->user();
        if($user->role !== "warga") {
            return response()->json([
                'status' => "Error",
                'message' => "Akses ditolak, anda harus berstatus warga"
            ], 403);
        }

        $validated = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date_format:Y-m-d|after:today',
            'book_time' => 'required|date_format:H:i'
        ], [
            'date.after' => 'Tanggal perjanjian minimal besok'
        ]);

        if($validated->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid field',
                'errors' => $validated->errors()
            ], 422);
        }

        $service = Service::find($request['service_id']);
        if(!$service) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Layanan tidak ditemukan'
            ], 404);
        }

        if($service->open_time > $request['book_time'] || $service->close_time < $request['book_time']) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Layanan saat ini sedang tutup'
            ], 422);
        }

        if(Medical::where('user_id', $user->id)->where('service_id', $request['service_id'])
                    ->where('date', $request['date'])->exists()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Kamu sudah membuat perjanjian di tanggal tersebut'
            ], 422);
        }

        Medical::create([
            'user_id' => $user->id,
            'service_id' => $request['service_id'],
            'date' => $request['date'],
            'book_time' => $request['book_time'],
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Perjanjian telah dibuat dengan ' . $service->doctor_name
        ], 201);
    }

    public function getAllService(Request $request) {
        $service = Service::query();
        $type = $request->query('type');

        if($type) {
            $service->where('type', $type);
        }

        $serv = $service->get();

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil mendapatkan layanan',
            'service' => $serv
        ]);
    }


    public function accept(Request $request, $id) {
        $user = $request->user();
        if($user->role !== "petugas") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Akses ditolak'
            ],403);
        }

        $bookId = Medical::find($id);
        if(!$bookId) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Perjanjian tidak ditemukan'
            ]);
        }

        if($bookId->status == "accepted") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Status perjanjian telah dikonfirmasi'
            ], 422);
        }

        if($bookId->status == "rejected") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Status perjanjian telah ditolak'
            ], 422);
        }

        $bookId->status = 'accepted';
        $bookId->save();
        return response()->json([
            'status' => 'Success',
            'message' => 'Perjanjian diterima'
        ]);
    }


    public function reject(Request $request, $id) {
        $user = $request->user();
        if($user->role !== "petugas") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Akses ditolak'
            ],403);
        }

        $bookId = Medical::find($id);
        if(!$bookId) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Perjanjian tidak ditemukan'
            ]);
        }

        if($bookId->status == "accepted") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Status perjanjian telah dikonfirmasi'
            ], 422);
        }

        if($bookId->status == "rejected") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Status perjanjian telah ditolak'
            ], 422);
        }

        $bookId->status = 'rejected';
        $bookId->save();
        return response()->json([
            'status' => 'Success',
            'message' => 'Perjanjian ditolak'
        ]);
    }


    public function getUserBooking(Request $request) {
        $user = $request->user();
        if($user->role !== "warga") {
            return response()->json([
                'status' => 'Error',
                'message' => 'Akses ditolak, anda harus berstatus warga'
            ], 403);
        }
        $booking = Medical::with('Service')->where('user_id', $user->id)->get();

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil mendapatkan perjanjian',
            'booking' => $booking
        ]);
    }

    public function getAllBooking(Request $request) {
        $user = $request->user();
        if($user->role !== 'petugas') {
            return response()->json([
                'status' => 'Error',
                'message' => "Akses ditolak"
            ], 403);
        }

        $book = Medical::join('users', 'users.id', '=', 'medicals.user_id')
                        ->join('services', 'services.id', '=', 'medicals.service_id')
                        ->select('medicals.*', 'users.name', 'services.type', 'services.doctor_name', 'services.location')
                        ->get();

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil mendapatkan semua perjanjian',
            'booking' => $book
        ]);
    }
}
