<?php include 'includes/header.php'; ?>
<?php
    
    //Create DB Object
    $db = new Database();
    
	//Check URL for Category
	if(isset($_GET['category'])){
	    $category = $_GET['category'];
        //If Category is specified select all posts from selected Category
        
        
        //Create Query
        $query = "SELECT * FROM posts where category =".$category."ORDER BY id DESC";
        //Run Query
        $posts = $db->select($query);
        
	} else{
    	//Select All posts if category is not specified
    	
    	
        //Create Query
        $query = "SELECT * FROM posts ORDER BY id DESC";
        //Run Query
        $posts = $db->select($query);
        
	}	
	
	/*
	 * Select all Categories
	 * */
	 
	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
	
?>
<?php if($posts) : ?>
		<?php while ($row = $posts -> fetch_assoc()) :?>
 			<div class="blog-post">
	            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
	            <p class="blog-post-meta"><?php echo formatDate($row['date']) ?> by <a href="#"><?php echo $row['author']; ?></a></p>
					<p><?php echo shortenText($row['body']) ?></p>
	           <a class="readmore" href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
          	</div><!-- /.blog-post -->
         <?php endwhile; ?>
         
<?php else : ?>
	<p>
		There are no posts yet
	</p>
<?php endif; ?>
<?php include 'includes/footer.php' ?>
