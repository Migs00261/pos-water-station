<script type="text/javascript" src="/js/cart.js"></script>

<div>
    &nbsp;
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-lg-12">
                            <h5>Your cart</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                        foreach ($data as $key => $cart) {
                                            $total = $total + floatval($cart['price']);
                                    ?>
                                        <tr>
                                            <td><?=$cart['description']?></td>
                                            <td><?=$cart['desc']?></td>
                                            <td><?=$cart['price']?></td>
                                            <td>
                                                <button class="btn btn-warning btn-delete" data-id="<?=$key?>">Remove</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-lg-12">
                            <h5>Your cart</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            <span class="total"><p><b>Total: </b> P<?=$total?></p></span>
                            <input type="hidden" id="total" value="<?=$total?>">
                            <input type="text" id="cash" class="form-control" placeholder="Cash">
                            <span class="change"><p><b>Change: </b> P<?=$total?></p></span>
                            <hr>
                        </div>
                        <div>
                            <label for="customer">Customer
                            <select class="form-control" name="customer" id="customer">
                                <?php
                                    foreach ($customers as $customer) {
                                        echo '<option value="' . $customer['people_id'] . '">' . $customer['fname'] . ' ' . $customer['lname'] . '</option>';
                                    }
                                ?>
                            </select>
                            </label>
                        </div>
                        <div>
                            <label for="delivery">Delivery
                            <select class="form-control" name="delivery" id="delivery">
                                <?php
                                    foreach ($workers as $worker) {
                                        echo '<option value="' . $worker['people_id'] . '">' . $worker['fname'] . ' ' . $worker['lname'] . '</option>';
                                    }
                                ?>
                            </select>
                            </label><br>
                            <button class="btn btn-primary btn-cashout">Cashout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>