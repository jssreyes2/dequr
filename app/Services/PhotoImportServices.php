<?php

namespace App\Services;

use App\Models\Busines;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use ZipArchive;

class PhotoImportServices
{

    public function importPhotoProfileUser($request)
    {
        $user = Auth::user();

        if ($user->avatar) {
            $filePrevious = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'photo_users' . DIRECTORY_SEPARATOR . $user->avatar);
            if (is_file($filePrevious)) {
                unlink($filePrevious);
            }
        }


        $file = $request->file('avatar');
        $ext = strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION));
        $nameDocument = $user->id . '-' . mb_strtolower($user->firstname) . '.' . $ext;

        $fileNew = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'photo_users' . DIRECTORY_SEPARATOR . $nameDocument);

        $image = Image::make($file->getRealPath());

        $image->resize(config('image.logo_profile_x'), config('image.logo_profile_y'), null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($fileNew);

        $user->avatar = $user->id . '-' . mb_strtolower($user->firstname) . '.' . $ext;
        $user->save();

        return $nameDocument;
    }


    public function importPhotoBusines(Busines $busines, $request)
    {
        if ($busines->logo) {
            $filePrevious = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'photo_busines' . DIRECTORY_SEPARATOR . $busines->logo);
            if (is_file($filePrevious)) {
                unlink($filePrevious);
            }
        }

        $file = $request->file('photo');
        $ext = strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION));
        $nameDocument = $busines->id . '-' . mb_strtolower($busines->slug) . '.' . $ext;

        $fileNew = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'photo_busines' . DIRECTORY_SEPARATOR . $nameDocument);

        $image = Image::make($file->getRealPath());

        $image->resize(config('image.logo_profile_x'), config('image.logo_profile_y'), null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($fileNew);

        $busines->logo = $nameDocument;
        $busines->save();

        return $nameDocument;
    }


    public function importFileComplaint(Complaint $complaint, $request)
    {
        $files = $request->file('file');

        $path = storage_path('app/public/complaint_files/' . $complaint->id);

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $i = 1;
        $nameDocumentJsonImg = [];
        $nameDocumentJson = [];

        foreach ($files as $item) {

            $ext = strtolower(pathinfo($item->getClientOriginalName(), PATHINFO_EXTENSION));
            $nameDocument = $i . '-' . $complaint->slug . '.' . $ext;

            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {

                $nameDocumentJsonImg[] .= $nameDocument;

                $image = Image::make($item->getRealPath());

                $image->resize(config('image.logo_profile_x'), config('image.logo_profile_y'), null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $fileNew = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaint->id . DIRECTORY_SEPARATOR . $nameDocument);

                $image->save($fileNew);
            } else {

                $nameDocumentJson[] .= $nameDocument;

                $fileNew = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaint->id);
                $item->move($fileNew, $nameDocument);

                $complaint->file = json_encode($nameDocumentJson);
                $complaint->save();
            }

            $i++;
        }

        if ($nameDocumentJsonImg) {
            $complaint->file_img = json_encode($nameDocumentJsonImg);
            $complaint->save();
        }

        if ($nameDocumentJson) {
            $complaint->file = json_encode($nameDocumentJson);
            $complaint->save();
        }

    }


    public function deletePhotoBusines(Busines $busines)
    {
        if ($busines->logo) {
            $filePrevious = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'photo_busines' . DIRECTORY_SEPARATOR . $busines->logo);
            if (is_file($filePrevious)) {
                unlink($filePrevious);
            }
        }
    }


    public function downloadFileComplaint(Complaint $complaints)
    {
        $zip = new \ZipArchive();
        $fileName = $complaints->slug . '.zip';

        if ($zip->open(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaints->id . DIRECTORY_SEPARATOR . $fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaints->id));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'complaint_files' . DIRECTORY_SEPARATOR . $complaints->id . DIRECTORY_SEPARATOR . $fileName));


    }


    public function fileCopyAvatar(User $user){

        $urlFolderUser = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'photo_users'.DIRECTORY_SEPARATOR);

        File::copy(asset('asset/frontend/assets/img/avatar-user.png'), $urlFolderUser.'avatar-user-'.$user->id.'.png');

        $user->avatar = 'avatar-user-'.$user->id.'.png';
        $user->save();
    }



}
