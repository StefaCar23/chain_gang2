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
        
        $args = $_POST['service'];
        $service->merge_attributes($args);
        $result = $service->save();
        
        if($result === true){
            $session->message['The service was updated successfully!'];
//$_SESSION['message'] = "The service was updated successfully!";
            redirect_to(url_for('/staff/service/show.php?id=' . $id));
        }else{
            //show errors
        }
        }else{
            //$admin = new Admin;
        }
        ?>

<?php $page_title = 'Edit service'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/service/index.php'); ?>">Back to list</a>
    <div class="admin edit">
        <h1>Edit service</h1>
        <?php echo display_errors($service->errors); ?>
        <form action="<?php echo url_for('/staff/service/edit.php?id=' . h(u($id))); ?>" method="post">
            <?php include('form_fields.php'); ?>
            <div id="operations">
                <input type="submit" value="Edit service" />
            </div>
        </form>
    </div>
</div>
    
   

<?php include(SHARED_PATH . '/staff_footer.php'); ?>