<?php require_once('../../../private/initialize.php'); ?>
<?php
// check submit method
if (is_post_request($_POST)) {
	// Handle form values sent by new.phpr4
	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';
	echo "Form parameters<br>";
	echo "Menu name: " . $menu_name . "<br>";
	echo "Position: " . $position . "<br>";
	echo "Visible: " . $visible . "<br>";
} else {
	redirect_to('staff/subjects/new.php');
}



