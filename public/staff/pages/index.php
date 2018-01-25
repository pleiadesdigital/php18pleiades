<?php require_once('../../../private/initialize.php'); ?>

<?php
	$pages = array(
		['id' => '1', 'subject_id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Mission'],
		['id' => '2', 'subject_id' => '1', 'position' => '2', 'visible' => '1', 'menu_name' => 'Our Team'],
		['id' => '3', 'subject_id' => '2', 'position' => '1', 'visible' => '1', 'menu_name' => 'Credit Cards'],
		['id' => '4', 'subject_id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Loans'],
	);



?>

<!-- MAIN CONTENT -->
<?php $page_title = 'Staff Pages '; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
	<section class="main-content">
		<div id="subjects listing">
			<h1>Pages</h1>
			<div class="actions">
				<a href="#">Create New Page</a>
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
				<?php foreach ($pages as $page) { ?>
					<tr>
						<td><?php echo h($page['id']); ?></td>
						<td><?php echo h($page['subject_id']); ?></td>
						<td><?php echo h($page['position']); ?></td>
						<td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
						<td><?php echo h($page['menu_name']); ?></td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id'])) . '&subject=' . h(u($page['subject_id']))); ?>">View</a></td>
						<td><a class="action" href="#">Edit</a></td>
						<td><a class="action" href="#">Delete</a></td>
					</tr>
				<?php } ?>
			</table>

		</div>


	</section>
	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
