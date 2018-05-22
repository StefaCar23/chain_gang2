<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php
    $current_page = $_GET['page'] ?? 1;
    $per_page = 8;
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
 <?php 
 $searchq = "";
 $bicycles = [];
                
 if(isset($_POST['search'])){
     $searchq = $_POST['search'];
     $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
     
     $sql = "SELECT * FROM bicycles WHERE brand LIKE '%$searchq%'";
     //$sql .= " ";
     
     $bicycles = Bicycle::find_by_sql($sql);
     
 }                  
                
 if(isset($_POST['search1'])){
     $searchq1 = $_POST['search1'];
     $searchq1 = preg_replace("#[^0-9a-z]#i", "", $searchq1);
     $searchq2 = $_POST['search2'];
     $searchq2 = preg_replace("#[^0-9a-z]#i", "", $searchq2);
     
     
     $sql1 = "SELECT * FROM bicycles ";
     $sql1 .= "WHERE category LIKE '%$searchq1%'";
     $sql1 .= " AND gender LIKE '%$searchq2%'";
     //$sql .= " ";
     
     $bicycles = Bicycle::find_by_sql($sql1);
     
 }                  
                
          
 ?>
  
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
        
        
        <div>  
            
            <p>Search by brand</p>
            <form action="../bicycles/search.php" method="post">
                <input type="text" name="search" placeholder="Search by brand" />
                <input type="submit" value="Submit" />
            </form>
            <p>&nbsp</p>
        </div>
        <div>  
            
            <p>Search by category and color</p>
            <form action="../bicycles/search.php" method="post">
                <input type="text" name="search1" placeholder="Search by category" />
                <input type="text" name="search2" placeholder="Search by gender" />
                <input type="submit" value="Submit" />
            </form>
            <p>&nbsp</p>
        </div>
        
        <div>
        
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>