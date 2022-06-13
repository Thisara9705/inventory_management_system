<!-- add product -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Add Product</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
         <form id="product_form" onsubmit="return false">
           <div class="modal-body">                
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date</label>
                  <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <label>Product Name</label>
                  <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
                </div>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" id="select_cat" name="select_cat"/>
                           
                </select>
              </div>
              <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price of Product" required/>
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Quantity" required/>
              </div>              
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-success">Add Product</button>
           </div>
       </form>
       </div>
     </div>
</div>

<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

<!-- manage product -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exModalLabel">Manage Product</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>            
           </button>
         </div>
         <form id="update_product_form" onsubmit="return false">
         <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="hidden" name="pid" id="pid" value=""/>
              <label>Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
            </div>
            <div class="form-group col-md-6">
              <label>Product Name</label>
              <input type="text" class="form-control" name="update_product" id="update_product" placeholder="Enter Product Name" required>
            </div>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="select_cat_update" name="select_cat_update" required/>
              
            </select>
          </div>
          <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price of Product" required/>
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Quantity" required/>
          </div>        
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success">Update Product</button>
         </div>
         </form>
       </div>
     </div>
</div>
