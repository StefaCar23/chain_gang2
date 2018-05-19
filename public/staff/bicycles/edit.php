<?php require_once('../../../private/initialize.php'); 
require_login();

if(!isset($_GET['id'])){
redirect_to(url_for('/staff/bicycles/index.php'));
}

$id = $_GET['id'];
$bicycle = Bicycle::find_by_id($id);
        if($bicycle == false){
            redirect_to(url_for('/staff/bicycles/index.php'));
        }

if(is_post_request()){
    $args = $_POST['bicycle'];
    /*$args = [];
    $args['brand'] = $_POST['brand'] ?? NULL;
    $args['model'] = $_POST['model'] ?? NULL;
    $args['year'] = $_POST['year'] ?? NULL;
    $args['category'] = $_POST['category'] ?? NULL;
    $args['color'] = $_POST['color'] ?? NULL;
    $args['gender'] = $_POST['gender'] ?? NULL;
    $args['price'] = $_POST['price'] ?? NULL;
    $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
    $args['condition_id'] = $_POST['condition_id'] ?? NULL;
    $args['description'] = $_POST['description'] ?? NULL;*/
    
    $bicycle->merge_attributes($args);
    $result = $bicycle->save();
    
    
    
    if($result === true){
        $session->message['The bicycle was updated successfully!'];
//$_SESSION['message'] = 'The bicycle was updated successfully!';
        redirect_to(url_for('/staff/bicycles/show.php?id=' . $id ));
    } else{
        //show errors
    
    }
    } else{
        //display the form
        
        }
    
    ?>

    <?php $page_title = 'Edit bicycle'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" >
    <a classs="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?> "> Back to list </a>
    <div class="bicycle edit" >
        <h1> Edit bicycle </h1>
        <?php echo display_errors($bicycle->errors);  ?>
        <form action="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($id))); ?>" method="post">
            <?php include('form_fields.php'); ?>
            <div id="operations">
                <input type="submit" valuer="Edit bicycle" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>














