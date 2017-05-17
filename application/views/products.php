<link rel="stylesheet" type="text/css" href="/css/products.css">
<script type="text/javascript" src="/js/products.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<div class="clear" style="width:100%;height:100px;"></div>

<div class="container">
    <h3>Products</h3>
    <header id="myCarousel" class="carousel slide">
        <div class="carousel-inner" role="listbox">
            <div class="row">
            <?php foreach ($data as $product) {?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 item">
                    <div class="panel panel-default text-center">
                        

                        <div class="panel-body">
                            <h4><?=$product['description']?></h4>
                            <p><?=$product['desc']?></p>
                            <?php
                                if ($this->session->has_userdata('username') === true) {
                                    if (intval($product['quantity']) === 0) {
                            ?>
                                <span class="label label-primary">Out of stock</span>
                                    <?php } else { ?>
                                        <a class="btn btn-primary btn-order" data-id="<?=$product['p_id']?>" href="#">Order <i class="fa fa-chevron-right" data-id="<?=$product['p_id']?>"></i></a>
                                    <?php } ?>
                                
                            <?php } else { ?>
                                <span class="label label-primary">Login to order</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </header>
</div>