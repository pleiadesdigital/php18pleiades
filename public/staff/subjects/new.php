<?php require_once('../../../private/initialize.php'); ?>
<?php
$id = $_GET['id'] ?? '1';
$menu_name = '';
$position = '';
$visible = '';

// check submit method
if (is_post_request($_POST)) {
	// Handle form values sent by new.php
	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';
	
	$result = insert_subject($menu_name, $position, $visible);
	$new_id = mysqli_insert_id($db);
	redirect_to('/staff/subjects/show.php?id=' . $new_id);
} else {
	$subject_set = find_all_subjects();
	$subject_count = mysqli_num_rows($subject_set) + 1;
	$subject = [];
	$subject['position'] = $subject_count;
	mysqli_free_result($subject_set); 
}
?>


<!-- MAIN CONTENT -->
<?php $page_title = 'New Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div class="content-header">
		  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php') ?>">&laquo; Back to List</a>
		</div><!-- class="content-header" -->
		
		<div id="subject new">
			<h1>Create Subjects</h1>
			<form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="POST">

				<dl>
					<dt>Menu Name</dt>
					<dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>"></dd>
				</dl>

				<dl>
					<dt>Position</dt>
					<dd>
						<select name="position">
							<?php for ($i = 1; $i <= $subject_count; $i++) { ?>
								<option value="<?php echo $i; ?>"<?php if ($subject['position'] == $i) { echo " selected"; }?>><?php echo $i; ?></option> 
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
					<input type="submit" value="Create Subject" />
				</div>

			</form>
		</div><!-- id="subject new" -->

	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
