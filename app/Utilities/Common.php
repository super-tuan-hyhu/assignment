<?php
namespace App\Utilities;

use Carbon\Carbon;
use Illuminate\Support\Str;
class Common{
    
    public static function uploadFile($file, $path)
    {
        $file_name_original = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file_name_w = Str::replaceLast('.', $extension, '', $file_name_original);

        $str_time_now = Carbon::now()->format('ymd_his');
        $file_name = Str::slug($file_name_w) . '_' . uniqid() . '_' . $str_time_now . '.' . $extension;

        $absolute_path = public_path($path);
        $file->move($absolute_path, $file_name);

        return $file_name;
    }
}