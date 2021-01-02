<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php 

						$query = "SELECT * FROM `tbl_categorey`";

						$category = $db ->select($query);

						if($category)
						{

						 while($result = $category->fetch_assoc())
						{ 

						
						
							?>

						
						<li><a href="posts.php?category=<?php echo $result['id']; ?>"><?php echo $result['name'] ?></a></li>
					<?php } } else { ?>

						<li><a href="#">No category is created.</a></li>

					<?php } ?>
						
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>

					<?php 

					$query = "SELECT * FROM `tbl_post` LIMIT 5";

					$lasetpost = $db->select($query);

					if($lasetpost)
					{
						while($result = $lasetpost->fetch_assoc())
						{

						

					


					?>
					<div class="popular clear">
						<h3><a href="#"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
						<p> <?php echo $fm-> textShorten($result['body'],120); ?></p>	
					</div>
					
					
					<?php } ?>
				<?php } else{header("Location:404.php");} ?>
										
	
			</div>
			
		</div>