<?php include("header.php");?>
<?php include("nav.php");?>
<?php require_once 'db.php';

          if(isset($_POST['search'])){
            $on=$_POST['bookdata'];
            $query = "SELECT * FROM tbl_book WHERE name= '$on' or pbdate='$on' or category='$on'";
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
          <td class="py-5">Category No</td>
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






<?php include("footer.php");?>