<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\CodeVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function Illuminate\Support\now;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validated = Validator::make($request->all(), [
            'name' => 'required|regex:/^[A-Za-z ]+$/|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'birthday' => 'required|date_format:Y-m-d',
            'nik' => 'required|int|unique:users,nik',
            'nomor_kk' => 'required|int'
        ], [
            'name.regex' => 'Invalid character input, please use alphabet only'
        ]);

        if($validated->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid Field',
                'errors' => $validated->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'birthday' => $request['birthday'],
            'nik' => $request['nik'],
            'nomor_kk' => $request['nomor_kk'],
            'role' => 'warga',
        ]);

        $otp = random_int(100000, 999999);

        dispatch(function() use($otp, $user) {
            CodeVerification::create([
            'user_id' => $user->id,
            'code' => $otp,
            'expired_at'=> now()->addMinutes(5)
        ]);

        Mail::to($user['email'])->send(new VerificationCodeMail($otp));
        })->afterResponse(true);

        return response()->json([
            'status' => 'Success',
            'message' => 'Kode verifikasi telah dikirim'
        ]);
    }


    public function verify_email(Request $request) {
        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'code' => 'required|int|digits:6'
        ]);

        if($validated->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Invalid Field',
                'errors' => $validated->errors()
            ], 422);
        }

        $user = User::where('email', $request['email'])->first();

        if(!$user) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Pengguna tidak ditemukan'
            ], 404);
        }

        if(!is_null($user->email_verified_at)) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Pengguna telah diverifikasi'
            ], 422);
        }

        $otp = CodeVerification::where('user_id', $user->id)
            ->where('code', $request['code'])
            ->where('expired_at', '>', now())->first();

        if(!$otp) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Kode verifikasi salah atau kadaluwarsa'
            ], 422);
        }

        $user->email_verified_at = now();
        $user->save();

        $otp->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Verifikasi berhasil'
        ]);
    }

    public function login(Request $request) {
        $user = User::where('email', $request['email']);

        if(!$user->exists() || !Hash::check($request['password'], $user->first()->password)) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Email atau password salah'
            ], 401);
        }

        $isVerified = $user->first()->email_verified_at;
        if(is_null($isVerified)) {
            $otp = CodeVerification::where('user_id', $user->first()->id)->first();
            $otp->delete();

            $newotp = random_int(100000, 999999);

            CodeVerification::create([
                'user_id' => $user->first()->id,
                'code' => $newotp,
                'expired_at'=> now()->addMinutes(5)
            ]);

            Mail::to($user->first()->email)->send(new VerificationCodeMail($newotp));

            return response()->json([
                'status' => 'Error',
                'message' => 'Email belum diverifikasi'
            ], 422);
        }

        $token = $user->first()->createToken('auth')->plainTextToken;
        return response()->json([
            'status' => 'Success',
            'message' => 'Login berhasil',
            'token' => $token,
            'data' => $user->first()
        ]);
    }


    public function logout(Request $request) {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Logout berhasil'
        ]);
    }
}
