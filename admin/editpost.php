<?php include 'inc/header.php' ?>

<?php include 'inc/sidebar.php' ?>
    <div class="grid_10">
    <?php
    
        if(!$_GET['editpostid'] && $_GET['editpostid'] == NULL)

        {
            echo "<script>window.location='editpostid.php'</script>";
        }

        else

        {
            $postid = $_GET['editpostid'];
        }


 ?>
		
            <div class="box round first grid">
                <h2> Update  Post</h2>
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    

                    $title = mysqli_real_escape_string($db->link, $_POST['title']);

                

                    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

                    $author = mysqli_real_escape_string($db->link, $_POST['author']);

                    $cat = mysqli_real_escape_string($db->link, $_POST['cat']);

                    $body = mysqli_real_escape_string($db->link, $_POST['body']);

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');

                    $file_name = $_FILES['image']['name'];

                    $file_size = $_FILES['image']['size'];

                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);

                    $file_ext = strtolower(end($div));

                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;

                    $uploaded_image = "upload/".$unique_image;

                        if($title == "" || $tags == "" || $author == "" || $cat == "" || $body == "")
                        {
                            echo "<span style='color:red,font-size:18px;'>Filled must not be empty.</span>";

                        }

                        if(!empty ($file_name))
                        {


                            if ($file_size >1048567) 
                            {
                                echo "<span class='error'>Image Size should be less then 1MB!</span>";
                            } 

                            elseif (in_array($file_ext, $permited) === false) 
                            {
                             echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                            }

                            else
                            {
                                move_uploaded_file($file_temp, $uploaded_image);

                                //$query = "INSERT INTO `tbl_post` (`cat`,`title`,`body`,`image`,`author`,`tags`) VALUES('','$title','$body',' $uploaded_image','$author','$tags')";

                                $query = "UPDATE `tbl_post` 

                                SET 

                                 cat = '$cat',

                                 title = '$title',

                                 body = '$body',

                                 image = '$uploaded_image',

                                 author = '$author',

                                 tags = '$tags' WHERE  id = '$postid' ";




                                $update_row = $db->update($query);

                                    if ($update_row) 
                                    {
                                     echo "<span style='color:red,font-size:18px;'>post update successfully.</span>";
                                    }

                                    else
                                    {
                                         echo "<span style='color:red,font-size:18px;'>Post not updated.</span>";
                                    }
                         
                             }
                          }
                            else
                            {
                                    $query = "UPDATE `tbl_post` 

                                     SET 

                                 cat = '$cat',

                                 title = '$title',

                                 body = '$body',

                                

                                 author = '$author',

                                 tags = '$tags' WHERE  id = '$postid' ";




                                $update_row = $db->update($query);

                                if ($update_row) 
                                {
                                 echo "<span style='color:red,font-size:18px;'>post update successfully.</span>";
                                }

                                else
                                {
                                     echo "<span style='color:red,font-size:18px;'>Post not updated.</span>";
                                }

                            }
                    





                }

                ?>
                <?php 

                $query="SELECT * FROM `tbl_post` WHERE `id` = '$postid'";

                $editpost = $db->select($query);

                if($editpost)
                {
                    while($rresult = $editpost->fetch_assoc())
                    {

                    

                


                ?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name = "title" value = "<?php echo $rresult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                    <?php 

                    $query = "SELECT * FROM `tbl_categorey`";

                    $Category  = $db->select($query);

                    if($Category)
                    {
                        while($result = $Category->fetch_assoc())
                        {

                    


                    ?>
                    



                                    <option 
                                 <?php 
                                    if($result['id'] == $rresult['cat'])
                                    {
                                        ?>
                                        selected = "selected";

                                         <?php  } ?>



                                    value="<?php echo $result['id']; ?>">

                                    <?php echo $result['name']; ?>
                   

                                    </option>
                              
                                    <?php }} ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $rresult['image']; ?>" height="80px" 
                                width="200px" /><br>
                                <input type="file" name = "image"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name = "author" value = "<?php echo $rresult['author']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name = "tags" value = "<?php echo $rresult['tags']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name = "body">

                                    <?php echo $rresult['body']; ?>" 

                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <?php include 'inc/footer.php' ?>

