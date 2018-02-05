<?php require_once('../../../private/initialize.php'); ?>
<?php
if (!isset($_GET['id'])) {
	redirect_to('staff/subjects/index.php');
}
$id = $_GET['id'] ?? '1';
$menu_name = '';
$position = '';
$visible = '';


// check submit method
if (is_post_request($_POST)) {
	// Handle form values sent by new.phpr4
	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';
	echo "Form parameters<br>";
	echo "Subject ID: " . $id . "<br>";
	echo "Menu name: " . $menu_name . "<br>";
	echo "Position: " . $position . "<br>";
	echo "Visible: " . $visible . "<br>";
}
?>

<!-- MAIN CONTENT -->
<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div class="content-header">
		  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
		</div><!-- class="content-header" -->

		<div id="subject edit">
			<h1>Edit Subjects</h1>
			<form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">

				<dl>
					<dt>Menu Name</dt>
					<dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>"></dd>
				</dl>

				<dl>
					<dt>Position</dt>
					<dd>
						<select name="position">
							<?php for ($i=1; $i < 4; $i++) { ?>
								<option value="<?php echo $i; ?> <?php if ($position == $i) { echo ' selected'; }?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</dd>
				</dl>

				<dl>
					<dt>Visible</dt>
					<dd>
						<input type="hidden" name="visible" value="0">
						<input type="checkbox" name="visible" value="1" <?php if ($visible == 1) { echo 'checked'; } ?>>
					</dd>
				</dl>

				<div id="operations">
					<input type="submit" value="Edit Subject" />
				</div>

			</form>
		</div><!-- id="subject new" -->

	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
