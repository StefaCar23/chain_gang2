<?php
    
    require_once('../../../private/initialize.php');
    require_login();
    
        if(!isset($_GET['id'])){
        redirect_to(url_for('/staff/admins/index.php'));
        }
        
        $id = $_GET['id'];
        $admin = Admin::find_by_id($id);
        
        if($admin == false){
        redirect_to(url_for('/staff/admins/index.php'));
            
        }
        
        if(is_post_request()){
        $result = $admin->delete();
            $session->message['The admin was deleted successfully!'];
//$_SESSION['message'] = "The admin was successfully deleted!";
            redirect_to(url_for('/staff/admins/index.php'));
        }else{
            //show errors
        }
        ?>

<?php $page_title = 'Delete admin'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">Back to list</a>
    <div class="admin delete">
        <h1>Delete admin</h1>
        <p> Are you sure you want to delete this admin? </p>
        <p class="item"><?php echo h($admin->full_name()); ?></p>
       
        <form action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($id))); ?>" method="post">
            
            <div id="operations">
                <input type="submit" value="Delete admin" />
            </div>
        </form>
    </div>
    
</div>
    
   

<?php include(SHARED_PATH . '/staff_footer.php'); ?>