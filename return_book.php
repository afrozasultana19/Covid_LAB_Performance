<?php include("header.php");?>
<?php include("nav.php");?>
<?php require_once 'db.php';?>
<?php
          if(isset($_POST['search'])){
            $on=$_POST['bookdata'];
            $query = "SELECT * FROM tbl_book WHERE name= '$on' or pubdate='$on' or category='$on'";
            $data=mysqli_query($con,$query);
            if($data){
            $track_data = mysqli_fetch_assoc($data);
            
        ?>
        
        <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Book Information</p>
                                    </div>

    <table class="table table-bordered text-center mt-5">
      <!--<thead>
        <tr>
          <th>Process</th>
          <th>Status</th>
        </tr>
      </thead>-->
      <tbody>
      
        <tr>
          <td class="py-5">Book Name</td>
          <td class="py-5"><?php echo $track_data['name'];?></td>
        </tr>
        <tr>
          <td class="py-5">Publisher Name</td>
          <td class="py-5"><?php echo $track_data['pubname'];?></td>
        </tr>
        <tr>
          <td class="py-5">Author Name</td>
          <td class="py-5"><?php echo $track_data['pubdate'];?></td>
        </tr>
        <tr>
          <td class="py-5">ISBN</td>
          <td class="py-5"><?php echo $track_data['category'];?></td>
        </tr>
        <tr>
          <td class="py-5">Edition</td>
          <td class="py-5"><?php echo $track_data['edition'];?></td>
        </tr>
        
      </tbody>
      <?php
      //  }
      ?>
    </table>
            <?php }
            else{  ?>
    <p class="text-center">NO Order Found!</p>
   <?php } 
   }
   ?>

<form action="" method="post">
                                <div class="container box pb-3">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Return Book</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Book Category" name="category">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter User ID" name="user"  >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Returnd On</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="return_date"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Total Fine(if any)" name="fine"  >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    
                                    <div class="my-2 d-flex" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="Return" name="return" required>
                                    </div>
                                    
                                </div>
                            </form>


<?php

if(isset($_POST['return'])){
	$id=$_POST['user'];
    $category=$_POST['category'];
    $rdon=$_POST['return_date'];
    $fine=$_POST['fine'];
    
	if($id=="" || $rdon=="" || $category==""  ){
		echo "All fields should be filled.Either one or many fields are empty.";
    }
    else{

        $inst2="SELECT ncopy FROM `tbl_borrow` WHERE userid='$id' and category='$category'";
        $data2=mysqli_query($con,$inst2);
        if($data2!= TRUE){
            echo "<script>alert('You haven't borrowed this book!');</script>";
            //echo "You haven't borrowed this book!";
        }
        else{
                $row = mysqli_fetch_assoc($data2);
                $bncopy=$row['copy_no'];
                $inst1="UPDATE tbl_borrow set return_date ='$rdon', fine='$fine' where userid='$id' and category='$category' "; 
                $data1=mysqli_query($con,$inst1);
                $inst3="SELECT * FROM `tbl_book` WHERE category='$category'"; 
                $data3=mysqli_query($con,$inst3);
                $row2 = mysqli_fetch_assoc($data3);
                $ncopy=$row2['copy_no'];
                $ncopy=$ncopy+$bncopy;
                if($data1 == TRUE)
                        {
                            $instx="UPDATE tbl_book set copy_no='$ncopy' WHERE category='$category' "; 
                            $datax=mysqli_query($con,$instx);
                            echo "<script>alert('Data updated successfully..!');</script>";   
                        }
                else{echo mysqli_error($con);}
            }
            
    }
}
?>
<?php include("footer.php");?>