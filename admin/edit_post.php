<?php include 'includes/header.php'; ?>
 <?php
 
    
    //Getting ID of the POST 
    
    $id = $_GET['id'];
    
    //Create DB Object
    $db = new Database();
    
    /*
     * Select all Posts
     * */
     
    //Create Query to get all Posts
    $query = "SELECT * FROM posts where id =". $id;
    //Run Query
    $post = $db->select($query)->fetch_assoc();
    
    /*
     * Select all Categories
     * */
     
    //Create Query
    $query = "SELECT * FROM categories";
    //Run Query
    $categories = $db->select($query);
    
 ?>
 
 <?php
//Updating actual Post

if(isset($_POST['submit'])){
    //Assign Vars
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
    
    //Simeple Validation
    if($title == '' || $body == ''  || $category == '' || $author == ''){
        $error = "Please fill out all requiered fields!";
    } else{
        $query = "UPDATE posts 
                        SET 
                        title = '$title',
                        body = '$body',
                        category = '$category',
                        author = '$author',
                        tags = '$tags'
                        WHERE id =".$id;
        $update_row = $db -> update($query);
    }
    
 }
?>

<?php 
// Deleting Post
if(isset($_POST['delete'])){
    $query = "DELETE FROM posts where id=".$id;
    $delete_row = $db -> delete($query);
}
?>
    <?php if($error): ?> 
        <div class = "alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form role="form" method="POST" action="edit_post.php?id=<?php echo $id ?>">
        
          <div class="form-group">
                <label>Post title</label>
                <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title'] ?>">
          </div>
          
          <div class="form-group">
                <label>Post body</label>
                <textarea name="body" class="form-control" placeholder="Enter Post Body">
                    <?php echo $post['body']; ?>
                </textarea>
          </div>
          
          <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control">
                  <?php while($row = $categories->fetch_assoc()) : ?>
                        <?php 
                            if($row['id'] == $post['category']) {
                                $selected = 'selected';
                            } else {
                                $selected = ' ';
                            }
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                  <?php endwhile ; ?>
                </select>
          </div>
          
          <div class="form-group">
                <label>Post author</label>
                <input name="author" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author']; ?> ">
          </div>
          
          <div class="form-group">
                <label>Tags</label>
                <input name="tags" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags']; ?> ">
          </div>

          <div>
            <input name="submit" type="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input name="delete" type="submit" class="btn btn-danger" value="Delete">
          </div>  
          <br />
    </form>
<?php include 'includes/footer.php'; ?>