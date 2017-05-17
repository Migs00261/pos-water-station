
            <?php
                $attributes = array(
                    'method'    => 'post',
                    'class'     => 'register-form',
                );

                $hidden = array(
                    'mode'      => ($user === false ? 'create' : 'modify'),
                    'people_id' => $user['people_id'],
                );
                
                echo form_open('/account/register', $attributes, $hidden);

                $aData = array(
                    array(
                    'type'          =>  'text',
                    'name'          =>  'uname',
                    'id'            =>  'uname',
                    'placeholder'   =>  'Username',
                    'class'         =>  'form-control',
                    'value'         =>  ($user === false ? '' : $user['username'])),
                    array(
                    'type'          =>  'password',
                    'name'          =>  'pass',
                    'id'            =>  'pass',
                    'placeholder'   =>  'Password',
                    'class'         =>  'form-control'),
                    array(
                    'type'          =>  'password',
                    'name'          =>  'retype',
                    'id'            =>  'retype',
                    'placeholder'   =>  'Re-type',
                    'class'         =>  'form-control'),
                    array(
                    'value'         =>  ($user === false ? '' : $user['fname']),
                    'type'          =>  'text',
                    'name'          =>  'fName',
                    'id'            =>  'fName',
                    'placeholder'   =>  'First Name',
                    'class'         =>  'form-control'),
                    array(
                    'value'         =>  ($user === false ? '' : $user['lname']),
                    'type'          =>  'text',
                    'name'          =>  'lName',
                    'id'            =>  'lName',
                    'placeholder'   =>  'Last Name',
                    'class'         =>  'form-control'),
                    array(
                    'value'         =>  ($user === false ? '' : $user['mi']),
                    'type'          =>  'text',
                    'name'          =>  'mName',
                    'id'            =>  'mName',
                    'placeholder'   =>  'Middle Initial',
                    'class'         =>  'form-control'),
                    array(
                    'value'         =>  ($user === false ? '' : $user['contact']),
                    'type'          =>  'text',
                    'name'          =>  'contact',
                    'id'            =>  'contact',
                    'placeholder'   =>  'Contact Num:',
                    'class'         =>  'form-control'),
                    array(
                    'value'         =>  ($user === false ? '' : $user['address']),
                    'type'          =>  'text',
                    'name'          =>  'addr',
                    'id'            =>  'addr',
                    'placeholder'   =>  'Address',
                    'class'         =>  'form-control'),
                    
                    );

                foreach ($aData as $data) {
                    echo '<div class="form-group row">';
                        echo '<div class="col-xs-12 col-md-4 col-lg-4">';
                            echo '<label class="pull-right form-label" for="' . $data['id'] . '">' . $data['placeholder'] . ':</label>';
                        echo '</div>';
                        echo '<div class="col-xs-12 col-md-8 col-lg-8">';
                            echo form_input($data);
                        echo '</div>';
                    echo '</div>';
                }
                
                echo '<div class="form-group row">';
                    echo '<div class="col-xs-12 col-md-4 col-lg-4">';
                        echo '<label class="pull-right form-label" for="gender">Gender:</label>';
                    echo '</div>';
                    echo '<div class="col-xs-12 col-md-8 col-lg-8">';
                        echo form_dropdown('gender', array('male' => 'Male', 'female' => 'Female'), ($user === false ? 'customer' : $user['gender']), array('id' => 'gender', 'class' => 'form-control'));
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<div class="col-xs-12 col-md-4 col-lg-4">';
                        echo '<label class="pull-right form-label" for="bdate">Birthdate:</label>';
                    echo '</div>';
                    echo '<div class="col-xs-12 col-md-8 col-lg-8">';
                        echo '<div class="row" style="margin-left: 0px">';
                            echo '<div class="col-xs-4">';

                                $bdate = explode('-', $user['bdate']);

                                $nums = array();
                                for($i=1; $i<32; $i++) {$nums[$i] = $i;}
                                echo form_dropdown('day', $nums , ($user === false ? '0' : ($bdate[2])), array('id' => 'day', 'class' => 'form-control'));
                            echo '</div>';
                            echo '<div class="col-xs-4">';
                                $nums = array();
                                for($i=1; $i<13; $i++) {$nums[$i] = $i;}
                                echo form_dropdown('month', $nums , ($user === false ? '0' : ($bdate[1])), array('id' => 'month', 'class' => 'form-control'));
                            echo '</div>';
                            echo '<div class="col-xs-4">';
                                $nums = array();
                                for($i=1960; $i<2010; $i++) {$nums[$i] = $i;}
                                echo form_dropdown('year', $nums , ($user === false ? '20' : ($bdate[0])), array('id' => 'year', 'class' => 'form-control'));
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';
                    echo '<div class="col-xs-12 col-md-4 col-lg-4">';
                        echo '<label class="pull-right form-label" for="usertype">Type:</label>';
                    echo '</div>';
                    echo '<div class="col-xs-12 col-md-8 col-lg-8">';
                        echo form_dropdown('usertype', array('customer' => 'Customer', 'staff' => 'Staff', 'admin' => 'Admin', 'worker' => 'Worker'), ($user === false ? 'customer' : $user['usertype']), array('id' => 'gender', 'class' => 'form-control'));
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<button name="register-submit" type="submit" class="btn btn-primary form-control pull-right">Register</button>';
                echo '</div>';

                echo form_close();
            ?>
