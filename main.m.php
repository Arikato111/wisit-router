<?php
/*  * Copyright (c) 2022 ณวสันต์ วิศิษฏ์ศิงขร
    *
    * This source code is licensed under the MIT license found in the
    * LICENSE file in the root directory of this source tree.
*/
function getPath()
{
    $link = "$_SERVER[REQUEST_URI]";
    $path = "/";
    $str_len = strlen($link);
    for ($i = 1; $i < $str_len; $i++) {
        if ($link[$i] == '?') {
            break;
        } else {
            $path = $path . $link[$i];
        }
    }
    return $path;
};



function Route($path, $callBackFunc)
{
    if ($path == '*') return $callBackFunc;
    $getPath = explode('/', getPath());
    $Route_path = explode('/', $path);

    if (sizeof($getPath) != sizeof($Route_path)) return;
    for ($i = 0; $i < sizeof($Route_path); $i++) {
        if ($getPath[$i] != $Route_path[$i] && $Route_path[$i] != ':') return;
    }
    return $callBackFunc;
};

function SwitchPath(...$Route)
{
    foreach ($Route as $value) {
        if ($value) {
            $content = $value();
            if ($content) return $content;
        }
    }
};


function getParams($position = -1)
{
    $params = explode('/', substr(getPath(), 1));
    if (!empty($params)) {
        if ($position > -1) {
            return str_replace("%20", " ", $params[$position]);
        }
        return str_replace("%20", " ", $params[sizeof($params) - 1]);
    }
};

function title($title)
{
    $GLOBALS['title'] = $title;
};
