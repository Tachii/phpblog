<?php include 'includes/header.php'; ?>
<?php
//Create DB Object
 $db = new Database();
 
//Create Query
 $query = "SELECT posts.*, categories.name FROM posts
                    INNER JOIN categories
                    ON posts.category = categories.id";
 
//Run Query
 $posts = $db->select($query);
 
//Create Query
 $query = "SELECT * FROM categories";
//Run Quer
 $categories = $db->select($query);

?>

<?php
//Submiting actual Post

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
        $query = "INSERT INTO posts 
                            (title, body, category, author, tags)
                            VALUES ('$title', '$body', '$category', '$author', '$tags')";
        $insert_row = $db -> insert($query);
    }
    
 }
?>
    <?php if($error): ?> 
        <div class = "alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form role="form" method="POST" action="add_post.php">
        
          <div class="form-group">
                <label>Post title</label>
                <input name="title" type="text" class="form-control" placeholder="Enter Title">
          </div>
          
          <div class="form-group">
                <label>Post body</label>
                <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
          </div>
          
          <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control">
                    <?php while($row = $categories -> fetch_assoc()) : ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
                    <?php endwhile; ?>
                </select>
          </div>
          
          <div class="form-group">
                <label>Post author</label>
                <input name="author" class="form-control" placeholder="Enter Author Name">
          </div>
          
          <div class="form-group">
                <label>Tags</label>
                <input name="tags" class="form-control" placeholder="Enter Tags">
          </div>

          <div>
            <input name="submit" type="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-default">Cancel</a>
          </div>  
          <br />
    </form>
<?php include 'includes/footer.php'; ?>