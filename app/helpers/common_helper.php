<?php
defined('BASEPATH') or exit('No direct script access allowed');

function pre($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}
