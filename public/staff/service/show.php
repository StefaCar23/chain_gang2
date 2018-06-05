<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

    $id = $_GET['id'] ?? '1';
    $admin = Admin::find_by_id($id);

?>

<?php $page_title = 'Show admin: ' . h($admin->full_name()); ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>" >Back to list</a>
    <div class="admin show" >
        <h1>Admin: <?php echo h($admin->full_name()); ?> </h1>
        <div class="attributes">
            <dl>
                <dt>First name</dt>
                <dd> <?php echo h($admin->first_name); ?> </dd>
            </dl>
            
            <dl>
                <dt>Last name</dt>
                <dd> <?php echo h($admin->last_name); ?> </dd>
            </dl>
            
            <dl>
                <dt>E-mail</dt>
                <dd> <?php echo h($admin->email); ?> </dd>
            </dl>
            
            <dl>
                <dt>Username</dt>
                <dd> <?php echo h($admin->username); ?> </dd>
            </dl>
            
            <dl>
                <dt>Date</dt>
                <dd> <?php echo h($admin->euro_date($admin->date)); ?> </dd>
            </dl>
        
        </div> 
        
    </div>
</div>

    