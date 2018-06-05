<?php
    
    require_once('../../../private/initialize.php');
    require_login();
    
    if(is_post_request()){
        $args = $_POST['admin'];
        $admin = new Admin($args);
        $result = $admin->save();
        
        if($result === true){
            $new_id = $admin->id;
            $session->message['The admin was created successfully!'];
//$_SESSION['message'] = "The admin was created successfully!";
            redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
        }else{
            //show errors
        }
        }else{
            $admin = new Admin;
        }
        ?>

<?php $page_title = 'Create admin'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">Back to list</a>
    <div class="admin new">
        <h1>Create admin</h1>
        <?php echo display_errors($admin->errors); ?>
        <form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">
            <?php include('form_fields.php'); ?>
            <div id="operations">
                <input type="submit" value="Create admin" />
            </div>
        </form>
    </div>
</div>
    
   

<?php include(SHARED_PATH . '/staff_footer.php'); ?>