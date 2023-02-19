<?php

namespace App\Services;

use Illuminate\Http\Request;
use Tinify\Source;
use Tinify\Tinify;

class PhotoService
{
    public static function optimize(Request $request, string $method, int $width, int $height): string
    {
        $path = 'storage/'.$request->file('photo')->store('origin', 'public');
        Tinify::setKey('9vknXbc3fVnGFy1sTYJ6qr3R7gV7rdYV');
        $path_info = pathinfo($path);
        $res_pass = "storage/photos/{$path_info['filename']}.jpg";
        $source = Source::fromFile($path)->convert(["type" => "image/jpg"]);
        $source->resize([
            "method" => $method,
            "width" => $width,
            "height" => $height
        ])->toFile($res_pass);
        unlink($path);
        return $res_pass;
    }
}
