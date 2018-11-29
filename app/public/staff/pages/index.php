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
					<?php $subject = find_subject_by_id($page['subject_id']); ?>
					<tr>
						<td><?php echo h($page['id']); ?></td>
						<td><?php echo h($page['subject_id']) . ' | ' . h($subject['menu_name']); ?></td>
						<td><?php echo h($page['position']); ?></td>
						<td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
						<td><?php echo h($page['menu_name']); ?></td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
					</tr>
				<?php } ?>
			</table>
			<?php mysqli_free_result($page_set); ?>
		</div>


	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>