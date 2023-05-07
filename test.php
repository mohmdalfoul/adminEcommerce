<html>
    <head>

    </head>
    <body>
      <?php
       require('class/Package.class.php');
       $gen=new General();
       $result=$gen->deleteCategory(12);
       echo $result;
      ?>
    </body>
    
</html>
<tbody>
                                <?php
                               foreach($items as $v){
                             ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['name_english']; ?></td>
                                    <td><?php echo $v['price']; ?></td>
                                    <td><?php echo $v['description_english']; ?></td>
                                    <td>
                                        <?php 
                                            $new_item=$v['new_item'];
                                            if($new_item==1){
                                                echo "<div class='new_item_true'>True</div>";
                                            } 
                                            else {
                                                echo "<div class='new_item_false'>False</div>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $available_item=$v['availability'];
                                            if($available_item==1){
                                                echo "<div class='available_item_true'>True</div>";
                                            } 
                                            else {
                                                echo "<div class='available_item_false'>False</div>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php 
                                     echo $v['category_name_english'];
                                    ?></td>
                                    <td>
                                        <button class="btn btn-outline-primary"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-outline-warning"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php
                               }
                             ?>
                            </tbody>