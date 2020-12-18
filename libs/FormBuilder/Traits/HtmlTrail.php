<?php
/**
 * @author nam.quach <qhnam.67@gmail.com>
 */

namespace Libs\FormBuilder\Traits;

use Illuminate\Support\HtmlString;

trait HtmlTrail
{
    public function buildAttributes(array $attributes = [])
    {
        $result = str_replace("=", '="', http_build_query($attributes, null, '" ', PHP_QUERY_RFC3986)).'"';
        $result = urldecode($result);
        if($result === '"'){
            $result = '';
        }
        return $result;
    }

    public function mergeAttributeTag()
    {

    }

    public function toHtmlString($html)
    {
        return new HtmlString($html);
    }
}
