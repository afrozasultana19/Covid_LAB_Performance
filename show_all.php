<?php include("header.php");?>
<?php include("nav.php");?>
<?php require_once 'db.php';?>
<div class="container">


<?php
$sql="SELECT * from tbl_book";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
?>

<?php
if(isset($_POST['delete']))
{
    $sql2="DELETE from tbl_book WHERE book_id=".$_POST['book_id'];
    $result2=mysqli_query($con,$sql2);
    if($result2)
    {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    <span class='sr-only'>Close</span>
     </button>
     <strong>Successfully Deleted!</strong>
    </div>";
    }
    else
    {
     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
   <span aria-hidden='true'>&times;</span>
   <span class='sr-only'>Close</span>
    </button>
    <strong>ERROR!</strong>
   </div>";
    }
}
?>
<h1>Book List</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Book id</th>
            <th>Auther Name</th>
            <th>Publisher</th>
            <th>Publish Date</th>
            <th>Subject</th>
            <th>Edition No</th>
             <th>Category No</th>
              <th>Copy No</th>
              <th>Delete</th>
            
        </tr>
    </thead>
    <?php
        while($row=mysqli_fetch_array($result))
        {
            echo "<form action='' method='POST'>";
            echo"<tr>";
            echo "<input type='hidden' value='".$row['book_id']. "' name='book_id/'>";
            echo"<td>" .$row['book_id']."</td>";
            echo"<td>" .$row['name']."</td>";
            echo"<td>" .$row['pubname']."</td>";
            echo"<td>" .$row['pubdate']."</td>";
            echo"<td>" .$row['subject']."</td>";
            echo"<td>" .$row['edition']."</td>";
            echo"<td>" .$row['category']."</td>";
            echo"<td>" .$row['copy_no']."</td>";


            echo"<td> <input type='submit' name='delete' value='delete' class='btn btn-danger'> </td>";
            echo"</tr>";
            echo "</form>";
        }




    ?>
   
</table>
<?php 
}
else{
    echo"<h2>Record not found</h2>";
}


?>

</div>






<?php include("footer.php");?>