<!-- add category -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Add Category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
         <form id="category_form" onsubmit="return false">
           <div class="modal-body">                
             <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name">
                <small id="cat_error" class="form-text text-muted"></small>
              </div>            
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
           </div>
       </form>
       </div>
     </div>
</div>

<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

<!-- manage category -->
<div class="modal fade" id="form_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Manage Category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
         <form id="update_category_form" onsubmit="return false">
           <div class="modal-body">                
             <div class="form-group">
                <label>Category Name</label>
                <input type="hidden" name="cid" id="cid" value=""/>
                <input type="text" class="form-control" name="update_category" id="update_category">
                <small id="cat_error" class="form-text text-muted"></small>
            </div>            
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Update Category</button>
           </div>
       </form>
       </div>
     </div>
</div>