<script type="text/javascript" src="/js/product_list.js"></script>

<div>
    &nbsp;
</div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Product List</h5>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-info pull-right btn-register" data-toggle="modal" data-target="#productModal">New</button>
                    </div>
                </div>
                
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data !== false) {
                                foreach ($data as $product) {
                            ?>
                                <tr>
                                    <td><?=$product['description']?></td>
                                    <td><?=$product['price']?></td>
                                    <td><?=$product['desc']?></td>
                                    <td><?=$product['quantity']?></td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-modify" data-id="<?=$product['p_id']?>" data-toggle="modal" data-target="#productModal">Modify</a>
                                        <a href="#" data-id="<?=$product['p_id']?>" class="btn btn-warning btn-delete">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-container">
    <!-- Account modal -->
    <div id="productModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
      </div>
    </div>
</div>