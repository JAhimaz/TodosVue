<?php

if (!function_exists('respond')){
  function respond($data, $status_code = 200, $headers =[]){
    return response()->json($data, $status_code, $headers);
  }
}

if (!function_exists('success')){
  function success($message = "", $status_code = 200){
    return respond($message, $status_code);
  }
}

if (!function_exists('no_content')){
  function no_content($message = "", $status_code = 204){
    return respond($message, $status_code);
  }
}

if (!function_exists('current_user')){
  function current_user(){
    return Auth::user();
  }
}
