<?php include 'inc/header.php' ?>

<?php include 'inc/sidebar.php' ?>
<?php
    
    if(!$_GET['catid'] && $_GET['catid'] == NULL)
    {
        echo "<script>window.location='catlist.php'</script>";
    }
    else
    {
        $id = $_GET['catid'];
    }


 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name =  $_POST['name'];

           

            $name = mysqli_real_escape_string($db ->link,$name);

            if(empty($name))
            {
                echo "<span style='color:red,font-size:18px;'>Filled must not be empty.</span>";

            }
            else
            {
                $query = "UPDATE `tbl_categorey`
                SET `name` = '$name' WHERE `id` = '$id'";

                $updatecat = $db->update($query);

                if( $updatecat)
                {
                    echo "<span style='color:green,font-size:18px;'>Category Update succssfully.</span>";


                }
                else
                {
                    echo "<span style='color:red,font-size:18px;'>Category not updated.</span>";

                }

            }

           }


                ?>
                <?php

                $query = "SELECT * FROM `tbl_categorey` WHERE id = ' $id'"; 

                $category = $db ->select($query);

                while ($result = $category -> fetch_assoc())
                {

                


                ?>
                 <form action = "" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "name"  value = <?php echo $result['name']; ?> class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php' ?>