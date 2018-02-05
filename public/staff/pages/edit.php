<?php require_once('../../../private/initialize.php'); ?>
<?php

if (!isset($_GET['id'])) {
	redirect_to('/staff/pages/index.php');
}

$id = $_GET['id'] ?? '1';
$subject_id = $_GET['subject_id'];
$page_name = '';
$position = '';
$visible = '';

// check submit method
if (is_post_request($_POST)) {
	// Handle form values sent by new.phpr4
	$page_name = $_POST['page_name'] ?? '';
	$subject_id = $_POST['subject_id'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';
	echo "Form parameters<br>";
	echo "Page ID: " . $id . "<br>";
	echo "Subject ID: " . $subject_id . "<br>";
	echo "Page name: " . $page_name . "<br>";
	echo "Position: " . $position . "<br>";
	echo "Visible: " . $visible . "<br>";
}
?>

<!-- MAIN CONTENT -->
<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div class="content-header">
		  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
		</div><!-- class="content-header" -->

		<div id="page edit">
			<h1>Edit Subjects</h1>
			<form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">

				<dl>
					<dt>Page Name</dt>
					<dd><input type="text" name="page_name" value="<?php echo h($page_name); ?>"></dd>
				</dl>

				<dl>
					<dt>Subject ID</dt>
					<dd><input type="text" name="subject_id" value="<?php echo h($subject_id); ?>"></dd>
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
					<input type="submit" value="Edit Page" />
				</div>

			</form>
		</div><!-- id="subject new" -->

	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
