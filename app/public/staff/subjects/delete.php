<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) { 
  redirect_to('/staff/subjects/index.php');
} 
$id = $_GET['id'];

if (is_post_request()) {
  delete_subject($id);
  redirect_to('/staff/subjects/index.php');
} else {
  
  $subject = find_subject_by_id($id);
}
?>

<?php $page_title = 'Delete Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<section class="main-content">
  <div class="content-header">
    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
  </div><!-- class="content-header" -->

  <div class="subject delete">
  <h1>Delete Subject</h1>
  <p>Are you sure you want to delete this subject?</p>
  <p class="item"><?php echo h($subject['menu_name']); ?></p>

  <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id'])));?>" method="post">
    <div id="operations">
      <input type="submit" name="commit" value="Delete Subject">
    </div><!-- id="operations" -->
  </form>
  
  </div><!-- class="subject delete" -->
</section><!-- id="main-content" -->

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


