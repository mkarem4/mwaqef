<?php


function file_found($file = null)
{
    return $file && is_file('uploads/' . $file) ? true : false;
}

function image($image = null)
{
    return file_found($image) ? $image : 'no-photo.jpg';
}

function unique_file($fileName)
{
    return time() . uniqid().'-'.$fileName;
}