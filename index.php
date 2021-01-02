

<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>



	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<!--Pagination-->

				<?php 

						$perpage = 3;

						if (isset($_GET['page']))
						 {
							$page = $_GET['page'];
						}
						else
						{
							$page = 1;
						}

						$start_form = ($page-1) * $perpage;



				?>



			<!--Pagination-->


			<?php
				$query = "SELECT * FROM `tbl_post` LIMIT $start_form,$perpage";

				$post = $db ->select($query);

				if($post)
				{
					while($result = $post ->fetch_assoc())
					{

					






			?>

			<div class="samepost clear">

				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']?></a></h2>


				<h4><?php echo $result['date']; ?> By<a href="#">
					<?php 
						echo $result['author']; ?></a></h4>


			<a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

			<!--<span><?php echo $result['image']; ?></span>-->




				<?php echo $fm-> textShorten($result['body']); ?>

				<div class="readmore clear">

					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
				<?php } ?> <!--End While Loop-->

				<!--Pagination-->

				<?php 

					$query = "SELECT * FROM `tbl_post`";

					$result = $db->select($query);

					$total_rows = mysqli_num_rows($result);

					$total_pages = ceil($total_rows/$perpage);





				echo "<span class= 'pagination'><a href='index.php?page= 1'>".'Firstpage'."</a>"?>;
					<?php
						for($i = 1; $i <= $total_pages; $i++ )
						{
						 echo "<a href='index.php?page=".$i."'>".$i."</a>";

						}

					 echo "<a href='index.php?page= $total_pages'>".'Last page'."</a></span>"; ?>


				<!--Pagination-->
			<?php }else 
			{
				header ("Location: 404.php");

			} 
			?>
			</div>
			
			

		</div>
		<?php include 'inc/sidebar.php'; ?>

		<?php include 'inc/footer.php' ?>
		
	