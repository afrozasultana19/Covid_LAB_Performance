<?php include("header.php"); ?>
<?php include("nav.php");?>
<?php require_once 'db.php'; ?>
<?php

if(isset($_POST["submit"])){
   $book_id = $_POST['book_id'];
   $name=$_POST['name'];
   $publisher = $_POST['publisher'];
   $pubdate = $_POST['pubdate'];
    $subject = $_POST['subject'];
    $edition = $_POST['edition'];
    $category = $_POST['category'];
    $cpyno = $_POST['copy_no'];
    $sql = "INSERT INTO tbl_book (book_id,name,publisher,pubdate,subject,edition,category,copy_no) VALUES ('$book_id',' $name','$publisher','$pubdate','$subject','$edition','$category','$cpyno')";
 $result = mysqli_query($con,$sql);
 if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Successfull!</strong>
</div>';
 }
    else
     {
        echo("Error".mysqli_error($con));
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
     <span aria-hidden='true'>&times;</span>
      <span class='sr-only'>Close</span>
   </button>
   <strong>Error!</strong>fill up the fields.
  </div>";

     }
    /*if( empty($subject)||empty($title) || empty($name) || empty($publisher) || empty($cpywrite) ||empty($edition) || empty($page)||empty($category)||empty($cpyno) ||empty($library)||empty($shell))
   {

       // echo("Error".mysqli_error($con));
    /*echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
     <span aria-hidden='true'>&times;</span>
      <span class='sr-only'>Close</span>
   </button>
   <strong>Error!</strong>fill up the fields.
  </div>";
   }*/
     
 
 

}



 ?>
<!doctype html>
<html lang="en">
  <h1> <center>ADD BOOK DETAILS</center></h1>
  
  <body>
      
   <div class="container">
       <div class="col-md-3"></div>
       <div class="col-md-6">
           <form action="" method="POST">
              <input type="hidden">
           <div class="form-group">
             <label for="book_id">The Book Subject</label>
             <input type="text"
               class="form-control" name="book_id" id="book_id"  placeholder="Book id" autocomplete="off">
           </div> 
            <div class="form-group">
               <label for="name">The Name Of The Author(s)</label>
               <input type="text"
               class="form-control" name="name" id="name"  placeholder="The Name Of The Author(s)" autocomplete="off">
            </div>
            <div class="form-group">
               <label for="publisher">The Name of the publisher</label>
               <input type="text"
               class="form-control" name="publisher" id="publisher"  placeholder="The Name of the publisher" autocomplete="off">
            </div>
           <div class="form-group">
             <label for="pubdate">Publish Date</label>
             <input type="text"
               class="form-control" name="pubdate" id="pubdate"  placeholder="pubdate" autocomplete="off">
           </div>
           <div class="form-group">
             <label for="subject">Subject of the Book</label>
             <input type="text"
               class="form-control" name="subject" id="subject"  placeholder="Subject of the book" autocomplete="off">
             </div>
           <div class="form-group">
             <label for="edition">The Edition Number</label>
             <input type="text"
               class="form-control" name="edition" id="edition"  placeholder="The Edition Number" autocomplete="off">
             </div>
           <div class="form-group">
             <label for="Category of the books">Category of the books</label>
             <input type="text"
               class="form-control" name="category" id="category"  placeholder="Category of the books" autocomplete="off">
           </div>
           <div class="form-group">
             <label for="The number of copies">The number of copies</label>
             <input type="text"
               class="form-control" name="copy_no" id="copy_no"  placeholder="The number of copies" autocomplete="off">
           </div>
           <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
           </form>
         </div>
         <div class="col-md-3"></div> 
   </div>
    
  </body>
</html>
<?php include("footer.php"); ?>