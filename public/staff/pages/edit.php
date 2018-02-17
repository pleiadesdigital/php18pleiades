<?php require_once('../../../private/initialize.php'); ?>
<?php

if (!isset($_GET['id'])) {
	redirect_to('/staff/pages/index.php');
}

$id = $_GET['id'] ?? '1';

// check submit method
if (is_post_request($_POST)) {
	$page = [];
	$page['id'] = $id;
	$page['menu_name'] = $_POST['menu_name'];
	$page['subject_id'] = $_POST['subject_id'];
	$page['position'] = $_POST['position'];
	$page['visible'] = $_POST['visible'];
	$page['content'] = $_POST['content'];

	$result = update_page($page);
	redirect_to('/staff/pages/show.php?id=' . $id);

} else {
	$page = find_page_by_id($id);

	$page_set = find_all_pages();
	$page_count = mysqli_num_rows($page_set);
	mysqli_free_result($page_set);

	$subject_set = find_all_subjects();
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
			<h1>Edit Pages</h1>
			<form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">

				<dl>
					<dt>Page Name</dt>
					<dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>"></dd>
				</dl>

				<dl>
					<dt>Subject ID</dt>
					<dd>
						<select name="subject_id" id="subject_id">
							<?php while ($subject = mysqli_fetch_array($subject_set)) { ?>
								<option value="<?php echo $subject['id']; ?>"<?php if ($subject['id'] == $page['subject_id']) { echo "selected"; } ?>><?php echo $subject['id'] . ' | ' . $subject['menu_name']; ?></option>
							<?php } ?>
						</select>				
					</dd>
				</dl>

				<dl>
					<dt>Position</dt>
					<dd>
						<select name="position">

							<?php for ($i = 1; $i <= $page_count; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if ($page['position'] == $i) { echo "selected"; } ?>><?php echo $i; ?></option>
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
					<dt>Your Message</dt>
					<dd><textarea id="content" name="content" cols="30" rows="10"><?php echo $page['content']; ?></textarea></dd>
				</dl>

				<div id="operations">
					<input type="submit" value="Edit Page" />
				</div>

			</form>
		</div><!-- id="page new" -->

	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
