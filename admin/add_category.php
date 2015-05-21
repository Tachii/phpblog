<?php include 'includes/header.php'; ?>
 
 <?php
//Submiting actual Category
//Create DB Object
 $db = new Database();
 
if(isset($_POST['submit'])){
    //Assign Vars
    $category = mysqli_real_escape_string($db->link, $_POST['name']);
    
    //Simeple Validation
    if($category == ''){
        $error = "Please fill out all requiered fields!";
    } else{
        $query = "INSERT INTO categories (name)
                            VALUES ('$category')";
        $insert_row = $db -> insert($query);
    }
    
 }
?>
    <?php if($error): ?> 
        <div class = "alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form role="form" method="POST" action="add_category.php">
        
          <div class="form-group">
                <label>Category Name</label>
                <input name="name" type="text" class="form-control" placeholder="Enter Category">
          </div>
          
          <div>
            <input name="submit" type="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
          </div>  
          
          <br />
          
    </form>
<?php include 'includes/footer.php'; ?>