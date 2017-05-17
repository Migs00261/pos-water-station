<script type="text/javascript" src="/js/product_category.js"></script>

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
                    <div class="col-lg-6 row">
                        <div class="col-lg-10">
                            <input type="text" placeholder="Description" name="description" id="description" class="form-control pull-right">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-info pull-right btn-register">Add</button>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data !== false) {
                                foreach ($data as $product) {
                            ?>
                                <tr>
                                    <td>
                                        <span class="text"><?=$product['description']?></span>
                                        <input type="hidden" id="description" class="form-control" value="<?=$product['description']?>" data-id="<?=$product['pc_id']?>">
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-modify">Modify</a>
                                        <a href="#" data-id="<?=$product['pc_id']?>" class="btn btn-warning btn-delete">Delete</a>
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