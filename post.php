 <?php include 'includes/header.php' ?>
 <?php
	//Create DB Object
	$db = new Database();
	
	//Getting ID of the POST 
	
	$id = $_GET['id'];
	
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
 <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title'] ?></h2>
           <p class="blog-post-meta"><?php echo formatDate($post['date']) ?> by <a href="#"><?php echo $post['author']; ?></a></p>
				<p><?php echo $post['body']; ?></p>
         	</p> 
          </div><!-- /.blog-post -->
 <?php include 'includes/footer.php' ?>