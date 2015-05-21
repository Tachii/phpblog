<?php include 'includes/header.php'; ?>
 <?php
 
    //Create DB Object
    $db = new Database();
    
    //Getting ID of the POST 
    
    $id = $_GET['id'];
    
    /*
     * Select all Posts
     * */
     
    //Create Query to get all Posts
    $query = "SELECT * FROM categories where id = ". $id;
    //Run Query
    $category = $db->select($query)->fetch_assoc();
    
 ?>
 <?php
//Updating actual Post

if(isset($_POST['submit'])){
    //Assign Vars
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    //Simeple Validation
    if($name == ''){
        $error = "Please fill out all requiered fields!";
    } else{
        $query = "UPDATE categories
                        SET 
                        name = '$name'
                        WHERE id =".$id;
        $update_row = $db -> update($query);
    }
    
 }
?>

<?php 
// Deleting Category
if(isset($_POST['delete'])){
    $query = "DELETE FROM categories where id=".$id;
    $delete_row = $db -> delete($query);
}
?>
    <form role="form" method="POST" action="edit_category.php?id=<?php echo $_GET['id'] ?>">
        
          <div class="form-group">
                <label>Category Name</label>
                <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name']; ?>">
          </div>
          
          <div>
            <input name="submit" type="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input name="delete" type="submit" class="btn btn-danger" value="Delete">
          </div>  
          
          <br />
          
    </form>
<?php include 'includes/footer.php'; ?>