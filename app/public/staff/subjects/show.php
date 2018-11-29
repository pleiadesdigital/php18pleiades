<?php require_once('../../../private/initialize.php'); ?>

<?php
//$id = isset($_GET['id']) ? $_GET['id'] : '1'; // prev php7 ternary
$id = $_GET['id'] ?? '1'; // php7 new ternary operator

$subject = find_subject_by_id($id);

?>

<?php $page_title = 'Show Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<section class="main-content">
	<p><a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a></p>
	<br>
	<?php //echo "The ID of the page is " . h($id) . "."; ?>
	<div class="subject show">
		<h1>Subject: <?php echo h($subject['menu_name']); ?></h1>
		<div class="attributes">
			<dl>
				<dt>Menu Name:</dt>
				<dd><?php echo h($subject['menu_name']); ?></dd>
			</dl>
			<dl>
				<dt>Position:</dt>
				<dd><?php echo h($subject['position']); ?></dd>
			</dl>
			<dl>
				<dt>Visible:</dt>
				<dd><?php echo h($subject['visible'] == '1' ? 'true' : 'false'); ?></dd>
			</dl>
		</div><!-- class="attributes" -->
	
	</div><!-- class="page show" -->

</section>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
