<?php

//fetch_item.php

include('database_connection.php');

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
      $result = $statement->fetchAll();
      $output = '';
      foreach($result as $row)
      {
            $output .= '
            <div class="col-md-3" style="margin-top:12px;"> 
            <div class="panel panel-info">
            <div class="panel-heading">
                  '.$row["name"].'
            </div>
                   
           <div class="panel-body"><img src="images/'.$row["image"].'" class="img-responsive" /><br /></div>

                 
                  <div class="panel-heading">$ '.$row["price"] .'<button id="'.$row["id"].'" style="float:right;" class="btn btn-danger btn-xs add_to_cart">Add to cart</button></div>
                   
                 <input type="text" name="lname" placeholder="Last name" id="quantity' . $row["id"] .'" class="form-control" value="1">
                  <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
                  <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
                 
                  
            </div>
        </div>
            ';
      }
      echo $output;
}


?>