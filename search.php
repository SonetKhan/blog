<?php include 'inc/header.php'; ?>

<?php 
if (!isset($_GET['search']) || $_GET['search'] == NULL) 
{
	header("Location:404.php");
}
else 
{
	$search = $_GET['search'];
}


?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php

					

					$query = "SELECT * FROM `tbl_post` WHERE `title` LIKE '%$search%' OR `body` LIKE '%$search%'";

					$post = $db ->select($query);

						if($post)
						{
							while($result = $post ->fetch_assoc())
							{



				?>
				<h2><?php echo $result['title'];  ?></h2>
				<h4><?php echo $result['date']; ?>  By 
				<?php 
						echo $result['author']; ?>
                 </h4>
				<img src="admin/upload/<?php echo $result['image']; ?>" alt="MyImage"/>

				<?php echo $result['body'] ; ?>
				

				
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 

						$catid = $result['cat'];

						$querycat = "SELECT * FROM `tbl_post` WHERE cat = '$catid' order by rand() LIMIT 6";

						$relatedpost = $db ->select($querycat);

						if($relatedpost)
						{
							while($rresult = $relatedpost ->fetch_assoc())
							{


					?>
					<a href="post.php?id=<?php echo $rresult['id'];?>">
					<img src ="admin/upload/<?php echo $rresult['image']; ?>" />
					</a>
                    <?php } } else{ echo "no post available";} 
				?>
				</div>
				<?php
						} }else{echo "sorry!your search query not found.";}
				
				?>
	</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	<?php include 'inc/footer.php'; ?>