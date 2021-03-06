<?php require_once('../../../private/initialize.php'); ?>

<?php
//$id = isset($_GET['id']) ? $_GET['id'] : '1'; // prev php7 ternary
$id = $_GET['id'] ?? '1'; // php7 new ternary operator
$subject_id = $_GET['subject_id'] ?? '1'; // php7 new ternary operator

$page = find_page_by_id($id);
$subject = find_subject_by_id($page['subject_id']);

?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<section class="main-content">
	<p><a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a></p>
	<br>
	<div class="page show">

		<h1>Page: <?php echo h($page['menu_name']); ?></h1>
		<div class="attributes">
			<dl>
				<dt>Page Name:</dt>
				<dd><?php echo h($page['menu_name']); ?></dd>
			</dl>
			<dl>
				<dt>Subject ID:</dt>
				<dd><?php echo h($page['subject_id']) . ' | ' . h($subject['menu_name']); ?></dd>
			</dl>
			<dl>
				<dt>Position:</dt>
				<dd><?php echo h($page['position']); ?></dd>
			</dl>
			<dl>
				<dt>Visible:</dt>
				<dd><?php echo h($page['visible']); ?></dd>
			</dl>
			<dl>
				<dt>Content:</dt>
				<dd><?php echo h($page['content']); ?></dd>
			</dl>
		</div><!-- class="attributes" -->





	</div>

</section>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
