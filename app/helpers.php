<?php
  
function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

if (!function_exists('breadcrumb')) {
  function breadcrumb($list)
  {
      $html = '<div class="page-header"><div class="container-fluid">';

      if (@$list['title']) {
          $html .= '<h1>' . @$list['title'] . '</h1>';
          unset($list['title']);
      }
      $html .= '<ol class="breadcrumb">';
      foreach ($list as $key => $value) {
          if ($key == '#') {
              $html .= '<li class="breadcrumb-item active">' . $value . '</li>';
          } else {
              $html .= '<li class="breadcrumb-item ">';
              $html .= '<a href="' . $key . '">' . $value . '</a>';
              $html .= '</li>';
          }
      }
      $html .= '</ol>';
      $html .= '</div>';
      return $html;
  }
}
