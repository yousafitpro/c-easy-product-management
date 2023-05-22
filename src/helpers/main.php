<?php
if (!function_exists('epm_layout')) {
    function  epm_layout() {
        ///asdasdsdasdas
        return 'layout.master';
    }
}
function emp_save_image($img, $path, $name = null)
{
    $name = $name ?: rand(1000, 9999) . time() . '.' . $img->getClientOriginalExtension();
    $img->storeAs($path,$name,'public');

    // $file = $img->file->store('public/documents');
    return $name;
}
?>
