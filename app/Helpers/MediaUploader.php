<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaUploader
{
    public static function uploadMutil($files)
    {
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, config('fa_shopify.media_upload_type'));
            if (!$check) {
                return false;
            }
        }
        $names = [];
        foreach ($files as $media) {
            $filename = $media->store('medias');
            $names[] = $filename;
        }

        return $names;
    }

    public static function upload($file)
    {
        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension, config('fa_shopify.media_upload_type'));
        if (!$check) {
            return false;
        }
        $filename = $file->store('medias');

        return $filename;
    }

    /**
     * Upload file to Amazon Simple Storage Service (S3)
     *
     * @param string $pathFile Path File
     * @param string $pathS3   Path S3
     *
     * @return boolean
     */
    public static function saveToS3($pathFile, $pathS3)
    {
        $amazonS3 = \Storage::disk('s3');
        $file = '';
        if (is_string($pathFile)) {
            // $file = file_get_contents($pathFile);
            $file = fopen($pathFile, 'r+');
        } else {
            $file = $pathFile;
        }
        return $amazonS3->put($pathS3, $file, 'public');
    }

    public static function uploadImage($file, $folder = 'admin_new', $fileName = '')
    {
        try {
            if (empty($file)) {
                return ['status' => false, 'message' => "empty file upload "];
            }
            $originFileName = date('Ymdhis') . '_' . md5(uniqid(rand(), true));
            if (!File::isDirectory(Storage::disk()->path($folder))) {
                File::makeDirectory(Storage::disk()->path($folder), 0777, true, true);
            }

            if (empty($fileName)) {
                $fileName =  $originFileName . '.' . $file->getClientOriginalExtension();
            } else {
                $fileName = $fileName . '.' . $file->getClientOriginalExtension();
            }

            $file->storeAs($folder, $fileName);
            return [

                'status' => true,
                'data' => [
                    'url' => $folder . '/' . $fileName,
                    'name' => $file->getClientOriginalName()
                ]


            ];
        } catch (\Exception $ex) {
            return [
                'status' => false,
                'data' => [],
                'message' => $ex->getMessage()
            ];
        }
    }

    /**
     * Delete file in Amazon Simple Storage Service (S3)
     *
     * @param type $pathFile Path File
     *
     * @return boolean
     */
    public static function deleteFileFromS3($pathFile)
    {
        $amazonS3 = \Storage::disk('s3');
        // If url
        if (filter_var($pathFile, FILTER_VALIDATE_URL)) {
            $explode = explode(env('AWS_BUCKET') . "/", $pathFile);
            $pathFile = end($explode);
        }
        if ($amazonS3->has($pathFile)) {
            $amazonS3->delete($pathFile);
        }
    }

    public static function getSrcFromS3($pathFile)
    {
        if (\Storage::disk('s3')->exists($pathFile)) {
            return \Storage::disk('s3')->url($pathFile);
        }
        return null;
    }
}
