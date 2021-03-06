<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php
    $current_page = $_GET['page'] ?? 1;
    $per_page = 2;
    $total_count = Bicycle::count_all();
    
    $pagination = new Pagination($current_page, $per_page, $total_count);

    //find all bicycles
    //$bicycles = Bicycle::find_all();
    //pisemo sql zahtev za manji broj elemenata
    $sql = "SELECT * FROM bicycles ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $bicycles = Bicycle::find_by_sql($sql);
    
    
?>

<?php $page_title = 'Bicycles'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="bicycles listing">
        <h1> Bicycles </h1>
        <div class="actions">
            <a class="action" href="<?php echo url_for('/staff/bicycles/new.php'); ?>">Add bicycle</a>
        </div>
        <table class="list">
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Category</th>
                <th>Gender</th>
                <th>Color</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($bicycles as $bicycle){ ?>
            <tr>
                
                <td><?php echo h($bicycle->id); ?></td>
                <td><?php echo h($bicycle->brand); ?></td>
                <td><?php echo h($bicycle->model); ?></td>
                <td><?php echo h($bicycle->year); ?></td>
                <td><?php echo h($bicycle->category); ?></td>
                <td><?php echo h($bicycle->gender); ?></td>
                <td><?php echo h($bicycle->color); ?></td>
                <td><?php echo h($bicycle->price); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/bicycles/show.php?id=' . h(u($bicycle->id))); ?>">View</a>  </td>
                <td><a class="action" href="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($bicycle->id))); ?>">Edit</a>  </td>
                <td><a class="action" href="<?php echo url_for('/staff/bicycles/delete.php?id=' . h(u($bicycle->id))); ?>">Delete</a>  </td>
            </tr>
            <?php } ?>
        </table>
        
        <?php 
            
           
                $url = url_for('/staff/bicycles/index.php');
                echo $pagination->page_links($url);
                
        
        ?>
        
        <?php
            $sql = "SELECT SUM(price1) AS Total FROM bicycles";
            $result = $database->query($sql);
            
           //print_r($result);
            $num = $result->fetch_assoc();
            
            //print_r($num);
            foreach($num as $number){
                echo "Total price is: " . $number . "euro";
                  }
        $kty = 0;
       /* moze i uz opmoc while() petlje da se prikaze
        while($num=$result->fetch_assoc()){
            $kty += $num['Total'];
        }
        echo $kty;
        */
            
        ?>
        
        <div>
        
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>