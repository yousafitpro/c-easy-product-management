<?php


if (! function_exists('uc_lib_get_widget')) {
    function  uc_lib_get_widget($user_id=0) {
        ///asdasdsdasdas
       return view('UcPhotoLib::widget',['user_id'=>$user_id]);
    }
}

if (! function_exists('uc_lib_get_modal')) {
    function  uc_lib_get_modal($user_id) {
        ///asdasdsdasdasadasdasd
       return view('UcPhotoLib::gallery_modal',['user_id'=>$user_id]);
    }
}
if ( ! function_exists('app_encrypt')){
    function app_encrypt($number)
    {
        return ($number * 91378264);
    }
}
if ( ! function_exists('app_decrypt')){
    function app_decrypt($number)
    {
        return ($number / 91378264);
    }
}
function saveImageAjax($img, $path, $name = null)
{
    $name = $name ?: rand(1000, 9999) . time() . '.' . $img->getClientOriginalExtension();
    $img->storeAs($path,$name,'public');

   // $file = $img->file->store('public/documents');
    return $name;
}
//asdasd
