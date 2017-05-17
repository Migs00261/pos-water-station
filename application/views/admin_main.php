<script type="text/javascript" src="/js/admin_main.js"></script>
<div>
    &nbsp;
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <button onclick="location.href='/account/all';" class="btn btn-primary btn-block">Manage Accounts</button>
        </div>
        <div class="col-lg-6">
            <button onclick="location.href='/products/all';" class="btn btn-success btn-block">Manage Products</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="panel-group col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-12">
                            <h5>Transactions</h5>
                        </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Delivery</th>
                                    <th>Staff</th>
                                    <th>Worker</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $total = 0;
                                foreach ($data as $trans) {
                                    $total = $total + floatval($trans['total']);
                            ?>
                                <tr>
                                    <td>
                                    <?php if ($trans['remarks'] == 'open') {
                                            echo '<button data-id="' . $trans['ri_id'] . '" class="btn btn-primary btn-remarks">Mark as Closed</button></td>';
                                        } else {
                                            echo '<p>Closed</p>';
                                        }
                                    ?>
                                    <td>
                                    <?php if ($trans['status'] == 'pending') {
                                            echo '<button data-id="' . $trans['ri_id'] . '" class="btn btn-success btn-status">Mark as Delivered</button>';
                                        } else {
                                            echo '<p>Delivered</p>';
                                        }
                                    ?>
                                    </td>
                                    <td><?=$trans['receive_date']?></td>
                                    <td>P<?=$trans['total']?></td>
                                    <td>P<?=$trans['payment']?></td>
                                    <td><?=$trans['delivery_date']?></td>
                                    <td><?=$trans['staff']?></td>
                                    <td><?=$trans['worker']?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php
                            if ($this->session->userdata('usertype') == 'admin') {
                        ?>
                            <div>
                                <h2><b>Total: </b>P<?=$total?></h2>
                            </div> 
                        <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>