<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php 
    if(is_post_request()){
        //kreiramo record pomocu post parametara
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
        
        
        $bicycle = new Bicycle($args);
        $result = $bicycle->save();
        
        
        if($result === true){
            $new_id = $bicycle->id;
           $session->message['The bicycle was created successfully!'];
//$_SESSION['message'] = 'The bicycle was created succeffully!';
            redirect_to(url_for('/staff/bicycles/show.php?id=' . $new_id));
        }else{
            //ovo je else za eror
        }
        }
        else{
            //ovim radimo display forme
            $bicycle = new Bicycle;
        }
    
?>

<?php $page_title = 'Create bicycle'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>">Back to list</a>
    
    <div class="bicycle new">
        <h1> Create bicycle </h1>
        <?php echo display_errors($bicycle->errors);  ?>
        <form action="<?php echo url_for('/staff/bicycles/new.php'); ?>" method="post" >
            <?php include('form_fields.php'); ?>
            <div id="operations">
                <input type="submit" value="Create bicycle" />
            </div>
        </form>
    </div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>