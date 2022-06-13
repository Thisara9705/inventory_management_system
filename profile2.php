<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Edit Profile</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
      <form  action="user.php" method="POST">
         <div class="modal-body">
<?php
      $query = "SELECT * FROM user WHERE id='{$_SESSION["userid"]}' LIMIT 1";
      $users = mysqli_query($connection, $query);


      while ($user = mysqli_fetch_assoc($users)) {
?>          
              <div class="form-group">
                <label for="exampleFormControlInput1">User Name</label>
                <input type="text" name="uname" class="form-control" value="<?php echo $user['username']; ?>" required>
              </div>
<?php  
      }
?>              
              <div class="form-group">
                <label for="exampleFormControlInput1">Current Password</label>
                <input type="password" name="cpw" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="password" name="npw" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Confirm New Password</label>
                <input type="password" name="cnpw" class="form-control" required>
              </div>
         </div>
       
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <input type="submit" name="editprofile" class="btn btn-primary" value="Save changes">
         </div>
      </form> 
       </div>
     </div>
   </div>
