<?php include 'inc/header.php' ?>

<?php include 'inc/sidebar.php' ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php if(isset($_GET['delcat']))
                {
                	$delid = $_GET['delcat'];

                	$query = "DELETE FROM `tbl_categorey` WHERE `id` = '$delid'";

                	$delcat = $db->delete($query);


                if( $delcat)
                {
                    echo "<span style='color:green,font-size:18px;'>Category delete successfully.</span>";


                }
                else
                {
                    echo "<span style='color:red,font-size:18px;'>Category not deleted.</span>";

                }


                } 
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM `tbl_categorey` ORDER BY `id` DESC";
						$catlist = $db-> select($query);
						if($catlist)
						{
							$i = 0;
							while($value = mysqli_fetch_array($catlist))
							{
								$i++;



							?>
						

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $value['id']; ?>">Edit</a> || <a onclick = "return confirm('Are you sure to delete data'); " href="?delcat=<?php echo $value['id']; ?>">Delete</a></td>
						</tr>
					<?php }} ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script> 
        <?php include 'inc/footer.php' ?>

