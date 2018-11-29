<?php

/* All functions test for true or false */

// checks if field is blank
function is_blank($value) {
  return !isset($value) || trim($value) === '';
}

// checks if field has presence (reverse of is_blank())
function has_presence($value) {
  return !is_blank($value);
}

// has length greater than a number. 2 arguments
function has_length_greater_than($value, $min) {
  $length = strlen($value);
  return $length > $min;
}

// has length less than a number. 2 arguments
function has_length_less_than($value, $max) {
  $length = strlen($value);
  return $length < $max;
}

// has length exactly. 2 arguments
function has_length_exactly($value, $exact) {
  $length = strlen($value);
  return $length == $exact;
}

// combines the three previous functions. 2 arguments, 1 is array
function has_length($value, $options) {
  if (isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
    return false;
  } elseif (isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
    return false;
  } elseif (isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
    return false;
  } else {
    return true;
  }
}

// if value is within a range of set. 2 arguments 1 is array
function has_inclusion_of($value, $set) {
  return in_array($value, $set);
}

// if value is NOT within a range of set. 2 arguments 1 is array
function has_exclusion_of($value, $set) {
  return !in_array($value, $set);
}

// validates inclusion of characters (ex. '.com')
function has_string($value, $required_string) {
  return strpos($value, $required_string) !== false;
}

// checks email format
function has_valid_email_format($value) {
  $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
  return preg_match($email_regex, $value) === 1;
}

// check if page name is unique
 function has_unique_page_menu_name($menu_name, $current_id="0") {
  global $db;

  $sql = "SELECT * FROM pages ";
  $sql .= "WHERE menu_name = '" . db_escape($db, $menu_name) . "' ";
  $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

  $page_set = mysqli_query($db, $sql);
  $page_count = mysqli_num_rows($page_set);
  mysqli_free_result($page_set);

  return $page_count === 0; // returns false if finds one match
}
