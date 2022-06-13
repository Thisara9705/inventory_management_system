  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>
  <script type="text/javascript" src=" fontawesome/js/all.js"></script>
<!-- add user -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Add User</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
         <form id="register_form" onsubmit="return false" autocomplete="off">
           <div class="modal-body">                              
                <div class="form-group">
                  <label for="username">Full Name</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                  <small id="u_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="password1">Password</label>
                  <input type="password" name="password1" class="form-control"  id="password1" placeholder="Password">
                  <small id="p1_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="password2">Re-enter Password</label>
                  <input type="password" name="password2" class="form-control"  id="password2" placeholder="Password">
                  <small id="p2_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="usertype">Usertype</label>
                  <select name="usertype" class="form-control" id="usertype">
                    <option value="">Choose User Type</option>
                    <option value="Admin">Admin</option>
                    <option value="Other">Other</option>
                  </select>
                  <small id="t_error" class="form-text text-muted"></small>
                </div>
                              
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Add User</button>
           </div>
          </form> 
       </div>
     </div>
</div>

<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

<!-- manage user -->
<div class="modal fade" id="manage_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Manage Product</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
         <div class="modal-body">

         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
</div>