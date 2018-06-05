<?php
    
    require_once('../../../private/initialize.php');
    require_login();
    
        if(!isset($_GET['id'])){
        redirect_to(url_for('/staff/service/index.php'));
        }
        
        $id = $_GET['id'];
        $service = Service::find_by_id($id);
        
        if($service == false){
        redirect_to(url_for('/staff/service/index.php'));
            
        }
        
        if(is_post_request()){
        $result = $service->delete();
            $session->message['The service was deleted successfully!'];
//$_SESSION['message'] = "The service was successfully deleted!";
            redirect_to(url_for('/staff/service/index.php'));
        }else{
            //show errors
        }
        ?>

<?php $page_title = 'Delete service'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/service/index.php'); ?>">Back to list</a>
    <div class="admin delete">
        <h1>Delete service</h1>
        <p> Are you sure you want to delete this service? </p>
        <p class="item"><?php echo h($service->id); ?></p>
       
        <form action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($id))); ?>" method="post">
            
            <div id="operations">
                <input type="submit" value="Delete admin" />
            </div>
        </form>
    </div>
    
</div>
    
   

<?php include(SHARED_PATH . '/staff_footer.php'); ?>