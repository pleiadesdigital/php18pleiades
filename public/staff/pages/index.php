<?php require_once('../../../private/initialize.php'); ?>

<?php

	$page_set = find_all_pages();


?>

<!-- MAIN CONTENT -->
<?php $page_title = 'Staff Pages '; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div id="subjects listing">
			<h1>Pages</h1>
			<div class="actions">
				<a href="<?php echo url_for('/staff/pages/new.php'); ?>">Create New Page</a>
			</div>

			<table class="list">
				<tr>
					<th>ID</th>
					<th>Subject ID</th>
					<th>Position</th>
					<th>Visible</th>
					<th>Name</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php while ($page = mysqli_fetch_assoc($page_set)) { ?>
				<?php //foreach ($page_set as $page) { ?>
					<tr>
						<td><?php echo h($page['id']); ?></td>
						<td><?php echo h($page['subject_id']); ?></td>
						<td><?php echo h($page['position']); ?></td>
						<td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
						<td><?php echo h($page['menu_name']); ?></td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id'])) . '&subject=' . h(u($page['subject_id']))); ?>">View</a></td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
						<td><a class="action" href="#">Delete</a></td>
					</tr>
				<?php } ?>
			</table>
			<?php mysqli_free_result($page_set); ?>
		</div>


	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
