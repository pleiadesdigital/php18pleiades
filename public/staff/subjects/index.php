<?php require_once('../../../private/initialize.php'); ?>

<?php
	$result_set = find_all_subjects();
?>

<!-- MAIN CONTENT -->
<?php $page_title = 'Staff Subjects'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div id="subjects listing">
			<h1>Subjects</h1>
			<div class="actions">
				<a href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
			</div>

			<table class="list">
				<tr>
					<th>ID</th>
					<th>Position</th>
					<th>Visible</th>
					<th>Name</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php while ($subject = mysqli_fetch_assoc($result_set)) { ?>
					<tr>
						<td><?php echo h($subject['position']); ?></td>
						<td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
						<td><?php echo h($subject['menu_name']); ?></td>
						<td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
						<td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
						<td><a class="action" href="#">Delete</a></td>
					</tr>
				<?php } ?>
			</table>
			<?php mysqli_free_result($result_set); ?>
		</div>


	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
