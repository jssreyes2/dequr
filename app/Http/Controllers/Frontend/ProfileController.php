<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PhotoImportServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('frontend.profile', ['user' => $user]);
    }

    public function updateAvatar(Request $request)
    {
        if (!$request->hasfile('avatar')) {
            return response()->json(['status' => 'fail', 'alert' => 'Seleccione una foto valida']);
        }

        $photoServices = new PhotoImportServices();
        $photoServices->importPhotoProfileUser($request);
    }


    public function updateProfile(Request $request)
    {
        $email = User::where([['email', '=', $request->get('email')], ['id', '!=', Auth::user()->id]])->get();

        if ($email instanceof User) {
            return response()->json(['status' => 'fail', 'alert' => 'El correo electrónico pertenece a otro usuario']);
        }

        $request->merge(['id' => Auth::user()->id]);
        $request->merge(['rol_id' => User::ROL_USERNAME]);
        $request->merge(['user_status' => 1]);

        User::updateUser($request);

        return response()->json(['status' => 'success', 'alert' => config('app.alert_success')]);
    }


    public function updatePassword(Request $request)
    {
        if ($request->password != $request->password_confirm) {
            return response()->json(['status' => 'fail', 'alert' => 'Las contraseñas no son iguales']);
        }

        $request->merge(['id' => Auth::user()->id]);

        User::updatePassword($request);

        return response()->json(['status' => 'success', 'alert' => config('app.alert_success')]);
    }


    public function closeAccount()
    {

        User::deleteUser(Auth::user()->id);

        return redirect()->route('logout');
    }
}
