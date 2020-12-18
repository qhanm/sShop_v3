<?php
namespace Libs\DataTable\Helpers;

use Illuminate\Http\Request;

class UrlHelper
{
    public static function appendUrl(string $key, string $value, Request $request){
        return $request->fullUrlWithQuery([
            $key => $value
        ]);
    }
}
