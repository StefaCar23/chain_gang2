<?php


    if(!isset($admin)){
        redirect_to(url_for('/staff/admins/index.php'));
    }
    
    
    ?>
    <?php require_once('../../../private/shared/JQ_header.php'); ?>

<dl>
    <dt>Bicycle id</dt>
    <dd> <input type="text" name="servicen[id]" value="<?php echo h($service->id); ?>" /> </dd>
</dl>
<dl>
    <dt>Date</dt>
    <dd> <input type="text" id="datepicker" name="service[date]" value="<?php echo h($service->date); ?>" /> </dd>
</dl>

<dl>
    <dt>Service/Price</dt>
    <dd> <input type="text" name="service[service1]]" value="<?php echo h($service->service1); ?>" /> </dd>
    <dd> <input type="text" name="service[price1]" value="<?php echo h($service->price1); ?>" /> </dd>
</dl>

<dl>
    <dt>Service/Price</dt>
    <dd> <input type="text" name="service[service2]]" value="<?php echo h($service->service2); ?>" /> </dd>
    <dd> <input type="text" name="service[price2]" value="<?php echo h($service->price2); ?>" /> </dd>
</dl>
<dl>
    <dt>Service/Price</dt>
    <dd> <input type="text" name="service[service3]]" value="<?php echo h($service->service3); ?>" /> </dd>
    <dd> <input type="text" name="service[price3]" value="<?php echo h($service->price3); ?>" /> </dd>
</dl>
<dl>
    <dt>Service/Price</dt>
    <dd> <input type="text" name="service[service4]]" value="<?php echo h($service->service4); ?>" /> </dd>
    <dd> <input type="text" name="service[price4]" value="<?php echo h($service->price4); ?>" /> </dd>
</dl>

