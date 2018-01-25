<?php require_once('../../../private/initialize.php'); ?>

<?php
//$id = isset($_GET['id']) ? $_GET['id'] : '1'; // prev php7 ternary
$id = $_GET['id'] ?? '1'; // php7 new ternary operator
$subject_id = $_GET['subject_id'] ?? '1'; // php7 new ternary operator
?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<section class="main-content">
	<p><a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a></p>
	<br>
	<div class="page show">
		<?php  echo "The ID of the page is " . h($id) . " belonging to subject ID " . h($subject_id) . "."; ?>
	</div>

</section>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
