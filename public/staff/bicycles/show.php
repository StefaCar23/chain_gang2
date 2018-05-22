<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>


<?php 
    $id = $_GET['id'] ?? '1';
    $bicycle = Bicycle::find_by_id($id);
?>

<?php $page_title = 'Show bicycle: ' . h($bicycle->name() ); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>" >Back to list</a>
    
    <div class="bicycle show">
        <h1>Bicycle: <?php echo h($bicycle->name()); ?> </h1>
        <div class="attributes">
            <dl>
                <dt>Brand</dt>
                <dd><?php echo h($bicycle->brand); ?></dd>
            </dl>
            <dl>
            <dt>Model</dt>
                <dd><?php echo h($bicycle->model); ?></dd>
            </dl>
             <dl>
            <dt>Year</dt>
                <dd><?php echo h($bicycle->year); ?></dd>
            </dl>
             <dl>
            <dt>Category</dt>
                <dd><?php echo h($bicycle->category); ?></dd>
            </dl>
             <dl>
            <dt>Color</dt>
                <dd><?php echo h($bicycle->color); ?></dd>
            </dl>
             <dl>
            <dt>Gender</dt>
                <dd><?php echo h($bicycle->gender); ?></dd>
            </dl>
             <dl>
            <dt>Weight</dt>
                <dd><?php echo h($bicycle->weight_kg()) . ' / ' . h($bicycle->weight_lbs()); ?></dd>
            </dl>
             <dl>
            <dt>Condition</dt>
                <dd><?php echo h($bicycle->condition()); ?></dd>
            </dl>
             <dl>
            <dt>Price</dt>
                <dd><?php echo h($bicycle->price); ?></dd>
            </dl>
             <dl>
            <dt>Description</dt>
                <dd><?php echo h($bicycle->description); ?></dd>
            </dl>
        </div>
    </div>
    <table class="list">
        <tr>
            <th>Service</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><?php echo h($bicycle->service1); ?></td>
            <td><?php echo h($bicycle->price1); ?></td>
        </tr>
        <?php if($bicycle->service2 != ""){ ?>
        <tr>
            <td><?php echo h($bicycle->service2); ?></td>
            <td><?php echo h($bicycle->price2); ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><?php echo "Total: "; ?></td>
            <td><?php echo h($bicycle->total()); ?></td>
        </tr>
    </table>
    
</div>





<?php include(SHARED_PATH . '/staff_footer.php'); ?>