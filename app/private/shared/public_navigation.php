
<nav class="public-nav">
  <?php $nav_subjects = find_all_subjects(); ?>
  <ul class="subjects">
    <?php while($nav_subject = mysqli_fetch_assoc($nav_subjects)) : ?>
    <li>
      <a href="<?php echo url_for('index.php'); ?>">
        <?php echo h($nav_subject['menu_name']); ?>
      </a>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php mysqli_free_result($nav_subjects); ?>
</nav>
