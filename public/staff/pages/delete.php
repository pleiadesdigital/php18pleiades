<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) { 
  redirect_to('/staff/pages/index.php');
} 
$id = $_GET['id'];

if (is_post_request()) {
  delete_page($id);
  redirect_to('/staff/pages/index.php');
} else {
  $page = find_page_by_id($id);
}
?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<section class="main-content">
  <div class="content-header">
    <a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
  </div><!-- class="content-header" -->

  <div class="page delete">
  <h1>Delete Page</h1>
  <p>Are you sure you want to delete this page?</p>
  <p class="item"><?php echo h($page['menu_name']); ?></p>

  <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id'])));?>" method="post">
    <div id="operations">
      <input type="submit" name="commit" value="Delete Page">
    </div><!-- id="operations" -->
  </form>
  
  </div><!-- class="subject delete" -->
</section><!-- id="main-content" -->

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


