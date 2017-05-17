<!DOCTYPE html>
<html lang="en">
<head>
    <title>Water Refilling Station</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

    <link rel="stylesheet" href="/css/header-login-signup.css">

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

</head>
<body>
<?php
    //navbar highlight
    $nav = array('', '', '');

    if ($this->uri->segment(1) == 'products') {
        $nav[1] = 'class="selected"';
    } elseif ($this->uri->segment(1) == 'faq') {
        $nav[2] = 'class="selected"';
    } elseif ($this->uri->segment(1) == NULL) {
        $nav[0] = 'class="selected"';
    }
?>
    <header class="header-login-signup">
        <div class="header-limiter">
            <h1><a href="/">Water<span>Refill</span></a></h1>
            <nav>
                <a href="/" <?=$nav[0]?>>Home</a>
                <a href="/products" <?=$nav[1]?>>Products</a>
                <a href="#" <?=$nav[2]?>>FAQ</a>
            </nav>
            <ul>
            <?php if ($this->session->has_userdata('username') === true) { ?>
                <li><a href="/admin">Admin Panel</a></li>
                <li><a href="/cart">Cart</a></li>
                <li><a href="/account/logout">Logout</a></li>
            <?php } else { ?>
                <li>
                    <a class="login" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <!-- <li><a href="#">Sign up</a></li> -->
            <?php } ?>
                
            </ul>
        </div>
    </header>

<!-- Login modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <?php
                $attributes = array(
                    'class'     => 'login-form',
                    'method'    => 'post',
                );
                
                echo form_open('account/login', $attributes);

                $login = array(
                    'type'          =>  'text',
                    'name'          =>  'username',
                    'id'            =>  'username',
                    'placeholder'   =>  'Username',
                    'class'         =>  'form-control'
                );

                echo '<div class="form-group">';
                echo form_input($login);
                echo '</div>';

                $password = array(
                    'type'          =>  'password',
                    'name'          =>  'password',
                    'id'            =>  'password',
                    'placeholder'   =>  'Password',
                    'class'         =>  'form-control'
                );

                echo '<div class="form-group">';
                echo form_input($password);
                echo '</div>';

                echo '<div class="form-group">';
                echo form_submit('', 'Login', array('class' => 'btn btn-primary'));
                echo '</div>';

                echo form_close();
            ?>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>