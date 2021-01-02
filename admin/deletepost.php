<?php include '../lib/Session.php'; 

    
    Session::checkSession();
    $username = Session::get('username');
?>

<?php include '../lib/Database.php'; ?>

<?php include '../config/config.php'; ?>

<?php include '../helpers/format.php'; ?>

<?php 
    $db = new Database();
  ?>
  <?php 
   if(!$_GET['delpostid'] && $_GET['delpostid'] == NULL)

        {
            echo "<script>window.location='editpost.php'</script>";
        }

        else

        {
            $postid = $_GET['delpostid'];

            $qurey = "SELECT * FROM `tbl_post` WHERE id = '$postid'";

            $getData = $db->select($qurey);

            if( $getData)

            {
            	while($delimg = $getData ->fetch_assoc())
            	{
            		$dellink = $delimg['image'];

            		unlink($dellink);

            	}

            }
            $delquery = "DELETE FROM `tbl_post` WHERE id = '$postid'";

            $delData = $db ->delete($delquery);

            if($delData)
            {
            	echo "<script>alert('Delete data successfully')</script>";
            	 echo "<script>window.location='editpost.php'</script>";
            }
            else 
            {
            	echo "<script>alert('Delete data not successfull.')</script>";
            	 echo "<script>window.location='editpost.php'</script>";
            }
        }


  ?>