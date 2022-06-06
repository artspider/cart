<?php

  function redirect($location) {
    header('location: ' . URLROOT . '/' . $location);
    exit;
  }