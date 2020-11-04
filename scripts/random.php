<?php

function randomID()
{
  require '../settings.php';
  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $let = array();
  $alphaLength = strlen($alphabet) - 1;
  for ($i = 0; $i < $long; $i++) {
    $n = rand(0, $alphaLength);
    $let[] = $alphabet[$n];
  }
  return implode($let);
}