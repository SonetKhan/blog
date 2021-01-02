<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>



	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<?php

			if(!isset($_GET['category']) || $_GET['category'] == NULL)
			{
					header("Location:404.php");

				

			} 



		?>
			



			

			

			<div class="samepost clear">
				<?php 

					$catid = $_GET['category'];

					$query = "SELECT * FROM `tbl_post` WHERE `id` =".$catid." ";

					$post = $db ->select($query);

					if($post)
					{
						while( $result = $post->fetch_assoc())


						{

						



				?>

				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']?></a></h2>


				<h4><?php echo $result['date']; ?> By<a href="#">
					<?php 
						echo $result['author']; ?></a></h4>


				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>


				<?php echo $fm-> textShorten($result['body']); ?>

				<div class="readmore clear">

					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>

				<?php } ?> 								<!--while loop end here-->


			<?php }else{header("Location:404.php");} ?>  <!--if end here else start here-->

				</div>
		
			</div>
		</div>
		<?php include 'inc/sidebar.php'; ?>

		<?php include 'inc/footer.php' ?>
		