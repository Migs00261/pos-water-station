<script type="text/javascript" src="/js/account_list.js"></script>
<div>
    &nbsp;
</div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>User Accounts</h5>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-info pull-right btn-register" data-toggle="modal" data-target="#accountModal">Register</button>
                    </div>
                </div>
                
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if ($data !== false) {
                                foreach ($data as $user) {
                        ?>
                                <tr>
                                    <td><?=$user['fname'] . ' ' . $user['lname']?></td>
                                    <td><?=$user['username']?></td>
                                    <td><?=$user['contact']?></td>
                                    <td><?=$user['address']?></td>
                                    <td><?=ucwords($user['usertype'])?></td>
                                    <td>
                                    <a href="#" class="btn btn-success btn-modify" data-id="<?=$user['people_id']?>" data-toggle="modal" data-target="#accountModal">Modify</a>
                                    <a href="#" data-id="<?=$user['people_id']?>" class="btn btn-warning btn-delete">Delete</a>
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
    <div id="accountModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
      </div>
    </div>
</div>