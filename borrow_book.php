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
          <td class="py-5">Category</td>
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
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Borrow BOOK</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Book Category" name="category">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter User ID" name="user"  >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <select name="ncopy">
                                    <option value="">Enter number of copies</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                </div>
        
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Current Date</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="cd"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Return Date</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="rd"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    
                                    <div class="my-2 d-flex" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="Borrow" name="borrow" required>
                                    </div>
                                    
                                </div>
                            </form>


<?php

if(isset($_POST['borrow'])){
	$id=$_POST['user'];
    $category=$_POST['category'];
    $ncopy=$_POST['copy_no'];
    $cd=$_POST['current_date'];
    $rd=$_POST['due_date'];
    
	if($id=="" || $cd=="" || $ncopy=="" || $rd=="" || $category==""  ){
		echo "All fields should be filled.Either one or many fields are empty.";
    }
    else{

      $inst2="SELECT * FROM `tbl_book` WHERE category='$category'"; 
          $data2=mysqli_query($con,$inst2);
          $row = mysqli_fetch_assoc($data2);
          $oncopy=$row['copy_no'];    
      
          
          if($oncopy!= 0){
            $inst="INSERT INTO tbl_borrow(userid,category,current_date,due_date,copy_no) VALUES('$id','$category','$cd','$rd','$ncopy')"; 
          $data=mysqli_query($con,$inst);  
            $nncopy=$oncopy-$ncopy;
              
              if($data == TRUE)
                        {
                            $inst1="UPDATE tbl_book set copy_no='$nncopy' WHERE category='$isbn' "; 
                            $dataX=mysqli_query($con,$inst1);
                            echo "<script>alert('Data updated successfully..!');</script>";   
                        }
                else{echo mysqli_error($con);}
          }
          else {
            echo "<script>alert('BOOK n=NOT Available..!');</script>";
          }
    }
}
?>











<?php include("footer.php");?>