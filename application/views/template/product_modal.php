
            <?php
                $attributes = array(
                    'method'    => 'post',
                    'class'     => 'register-form',
                );

                $hidden = array(
                    'mode'      => ($product === false ? 'create' : 'modify'),
                    'p_id' => $product['p_id'],
                );
                
                echo form_open('/products/register', $attributes, $hidden);

                $aData = array(
                    array(
                        'type'          =>  'text',
                        'name'          =>  'description',
                        'id'            =>  'description',
                        'placeholder'   =>  'Description',
                        'class'         =>  'form-control',
                        'value'         =>  ($product === false ? '' : $product['description'])
                    ),
                    array(
                        'type'          =>  'text',
                        'name'          =>  'quantity',
                        'id'            =>  'quantity',
                        'placeholder'   =>  'Quantity',
                        'class'         =>  'form-control',
                        'value'         =>  ($product === false ? '' : $product['quantity'])
                    ),
                    array(
                        'type'          =>  'text',
                        'name'          =>  'price',
                        'id'            =>  'price',
                        'placeholder'   =>  'Price',
                        'class'         =>  'form-control',
                        'value'         =>  ($product === false ? '' : $product['price'])
                    ),
                    
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
                        echo '<label class="pull-right form-label" for="pc_id">Category:</label>';
                    echo '</div>';
                    echo '<div class="col-xs-12 col-md-8 col-lg-8">';
                        $data = array();

                        if (count($categories) > 0) {
                            foreach ($categories as $category) {
                                $data[$category['pc_id']] = $category['description'];
                            }
                            echo form_dropdown('pc_id', $data, ($product === false ? '' : $product['pc_id']), array('id' => 'pc_id', 'class' => 'form-control'));
                        }
                        echo '</br>';
                        echo '<a href="/products/category" class="btn btn-success btn-categories">Manage Categories</a>';
                    echo '</div>';
                    
                echo '</div>';

                echo '<div class="form-group">';
                echo '<button type="submit" class="btn btn-primary form-control pull-right">Register</button>';
                echo '</div>';

                echo form_close();
            ?>
