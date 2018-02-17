<?php require_once('../../../private/initialize.php'); ?>
<?php

// check submit method
if (is_post_request()) {
	// Handle form values sent by new.php
	$page = [];
	$page['subject_id'] = $_POST['subject_id'] ?? '';
	$page['menu_name'] = $_POST['menu_name'] ?? '';
	$page['position'] = $_POST['position'] ?? '';
	$page['visible'] = $_POST['visible'] ?? '';
	$page['content'] = $_POST['content'] ?? '';

	$result = insert_page($page);
	$new_id = mysqli_insert_id($db);
	redirect_to('/staff/pages/show.php?id=' . $new_id);
} else {
	$page = [];
	$page['subject_id'] = '';
	$page['menu_name'] = '';
	$page['position'] = '';
	$page['visible'] = '';
	$page['content'] = '';

	$page_set = find_all_pages();
	$page_count = mysqli_num_rows($page_set) + 1;
	mysqli_free_result($page_set);

	$subject_set = find_all_subjects();

}
?>



<!-- MAIN CONTENT -->
<?php $page_title = 'New Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div class="content-header">
		  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php') ?>">&laquo; Back to List</a>
		</div><!-- class="content-header" -->

		<div id="page new">
			<h1>Create Pages</h1>

			<form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">

				<dl>
					<dt>Subject ID</dt>
					<select name="subject_id" id="subject_id">
						<?php while ($subject = mysqli_fetch_array($subject_set)) { ?>
							<option value="<?php echo $subject['id']; ?>"<?php if ($page['subject_id'] == $subject['id']) { echo " selected"; } ?>><?php echo $subject['id'] . ' | ' . $subject['menu_name']; ?></option>
						<?php } ?>
						<?php mysqli_free_result($subject_set); ?> 
					</select>
				</dl>

				<dl>
					<dt>Page Name</dt>
					<dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>"></dd>
				</dl>

				<dl>
					<dt>Position</dt>
					<dd>
					<select name="position">
						<?php for ($i = 1; $i <= $page_count; $i++) { ?>
							<option value="<?php echo $i; ?>"<?php if ($page['position'] == $i) { echo " selected"; }?>><?php echo $i; ?></option> 
						<?php } ?>
						</select>
					</dd>
				</dl>

				<dl>
					<dt>Visible</dt>
					<dd>
						<input type="hidden" name="visible" value="0">
						<input type="checkbox" name="visible" value="1" <?php if ($page['visible'] == 1) { echo 'checked'; } ?>>
					</dd>
				</dl>
				
				<dl>
					<dt>Content</dt>
					<dd>
						<textarea name="content" id="content" cols="30" rows="5"><?php echo $page['content']; ?></textarea>
					</dd>
				</dl>

				<div id="operations">
					<input type="submit" value="Create Page" />
				</div>

			</form>
		</div><!-- id="subject new" -->

	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
