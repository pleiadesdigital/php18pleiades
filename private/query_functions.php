<?php
/**************************
******** SUBJECTS *********
***************************/
function find_all_subjects() {
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "ORDER BY id ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_subject_by_id($id) {
  global $db;
  $sql = "SELECT * FROM subjects ";
  $sql .= "WHERE id = '" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject;
}

function insert_subject($menu_name, $position, $visible) {
  global $db;
  $sql =  "INSERT INTO subjects ";
	$sql .= "(menu_name, position, visible) ";
	$sql .= "VALUES (";
	$sql .= "'" . $menu_name . "', ";
	$sql .= "'" . $position . "', ";
	$sql .= "'" . $visible  . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);
	// For INSERT statements result is TRUE or FALSE
	if ($result) {
		return true; 
	} else {
		// INSERT failed
		echo mysqli_error($db);
		db_disconnect();
		exit;
	}
}

function update_subject($subject) {
  global $db;
  $sql = "UPDATE subjects SET ";
  $sql .= "menu_name = '" . $subject['menu_name'] . "', ";
  $sql .= "position = '" . $subject['position'] . "', ";
  $sql .= "visible = '" . $subject['visible'] . "'  "; 
  $sql .= "WHERE id = '" . $subject['id'] . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  // For INSERT statements result is TRUE or FALSE
	if ($result) {
    return true;	
  } else {
		// INSERT failed
		echo mysqli_error($db);
		db_disconnect();
		exit;
	}
}

function delete_subject($id) {
  global $db;
  $sql = "DELETE FROM subjects ";
  $sql .= "WHERE id = '" . $id . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect();
    exit;
  }
}


/**************************
********** PAGES **********
***************************/
function find_all_pages() {
  global $db;
  $sql = "SELECT * FROM pages ";
  $sql .= "ORDER BY subject_id ASC, position ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_page_by_id($id) {
  global $db;
  $sql = "SELECT * FROM pages ";
  $sql .= "WHERE id = '" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $page = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $page;
}

function insert_page($page) {
  global $db;
  $sql = "INSERT INTO pages ";
  $sql .= "(subject_id, menu_name, position, visible, content) ";
  $sql .= "VALUES (";
  $sql .= "'" . $page['subject_id'] . "', ";
  $sql .= "'" . $page['menu_name'] . "', ";
  $sql .= "'" . $page['position'] . "', ";
  $sql .= "'" . $page['visible'] . "', ";
  $sql .= "'" . $page['content'] . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // For INSERT statements result is TRUE or FALSE
  if ($result)  {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect();
    exit;
  }
}

function update_page($page) {
  global $db;
  $sql = "UPDATE pages SET ";
  $sql .= "subject_id = '" . $page['subject_id'] . "', ";
  $sql .= "menu_name = '" . $page['menu_name'] . "', ";
  $sql .= "position = '" . $page['position'] . "', ";
  $sql .= "visible = '" . $page['visible'] . "', ";
  $sql .= "content = '" . $page['content'] . "' ";
  $sql .= "WHERE id = '" . $page['id'] . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect();
  }
}

function delete_page($id) {
  global $db;
  $sql = "DELETE FROM pages ";
  $sql .= "WHERE id = '" . $id . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect();
    exit;
  }
}