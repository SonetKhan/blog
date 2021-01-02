<?php include 'inc/header.php'; ?>

<?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) 
{
	header("Location:404.php");
}


?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php

					$id =  $_GET['id'];

					$query = "SELECT * FROM `tbl_post` WHERE id = ".$id."";

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
				<img src="admin/<?php echo $result['image']; ?>" alt="MyImage"/>

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
					<img src ="admin/<?php echo $rresult['image']; ?>" />
					</a>
                    <?php } } else{ echo "no post available";} 
				?>
				</div>
				<?php
						} }else{header("Location:404.php");}
				
				?>
	</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	<?php include 'inc/footer.php'; ?>