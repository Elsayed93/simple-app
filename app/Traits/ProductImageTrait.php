<?php

namespace App\Traits;

trait ProductImageTrait
{
    function saveImage($request, $path)
    {
        $file_extension = $request->getClientOriginalExtension(); //to get image extension
        $file_name = time() . '.' . $file_extension;
        $request->move($path, $file_name);
        return $file_name;
    }
}
