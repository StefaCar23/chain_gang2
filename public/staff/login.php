<?php  

    require_once('../../private/initialize.php');
   
    $errors = [];
    $username = '';
    $password = '';
    
    if(is_post_request()){
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        //validation
        if(is_blank($username)){
            $errors[] = 'Username cannot be blank!';
        }
        if(is_blank($password)){
            $errors[] = 'The password cannot be blank!';
        }
        
        //start login
        if(empty($errors)){
            $admin = Admin::find_by_username($username);
            if($admin != false && $admin->verify_password($password)){
                //sada vidimo da je user ulogovan
                $session->login($admin);
                redirect_to(url_for('/staff/index.php'));
            }else{
                //nismo nasli username
                $errors[] = 'Login was unsuccessful!';
            }
        }       
    }
    
    ?>

<?php $page_title = 'Login'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id='content'>
    <h1>Login</h1>
    <?php echo display_errors($errors); ?>
    <form action="login.php" method="post" >
        Username: <br />
        <input type="text" name="username" value="<?php echo h($username); ?>" /> <br />
        Password: <br />
        <input type="password" name="password" value="" /> <br /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>