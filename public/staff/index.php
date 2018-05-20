<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php $page_title = 'Staff menu'  ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div id="main-menu">
        <h2> Main menu </h2>
        <ul>
            <li> <a href="<?php echo url_for('/staff/bicycles/index.php'); ?>" > Bicycles </a> </li>
            <li> <a href="<?php echo url_for('/staff/admins/index.php'); ?>" > Admins </a> </li>
            <li> <a href="<?php echo url_for('/staff/bicycles/search.php'); ?>" > Search </a> </li>
        </ul>
    </div>    
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
