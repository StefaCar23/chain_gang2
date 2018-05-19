<?php


    if(!isset($admin)){
        redirect_to(url_for('/staff/admins/index.php'));
    }
    
    
    ?>
    <?php require_once('../../../private/shared/JQ_header.php'); ?>

<dl>
    <dt>First name</dt>
    <dd> <input type="text" name="admin[first_name]" value="<?php echo h($admin->first_name); ?>" /> </dd>
</dl>
<dl>
    <dt>Last name</dt>
    <dd> <input type="text" name="admin[last_name]" value="<?php echo h($admin->last_name); ?>" /> </dd>
</dl>

<dl>
    <dt>E-mail</dt>
    <dd> <input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" /> </dd>
</dl>

<dl>
    <dt>Username</dt>
    <dd> <input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" /> </dd>
</dl>
<dl>
    <dt>Password</dt>
    <dd> <input type="text" name="admin[password]" value="<?php echo h($admin->password); ?>" /> </dd>
</dl>

<dl>
    <dt>Confirm password</dt>
    <dd> <input type="text" name="admin[confirm_password]" value="<?php echo h($admin->confirm_password); ?>" /> </dd>
</dl>

<dl>
    <dt>Date</dt>
    <dd> <input type="text" id="datepicker" name="admin[date]" value="<?php echo h($admin->date); ?>" /> </dd>
</dl>