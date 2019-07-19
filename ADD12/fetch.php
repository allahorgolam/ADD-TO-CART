<?php
$connect = mysqli_connect("localhost", "root", "", "add to cart1");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM tbl_product 
	WHERE name LIKE '%".$search."%'
	OR image LIKE '%".$search."%'
	OR price LIKE '%".$search."%' 
	
	
	";
}
else
{
	$query = "
	SELECT * FROM tbl_product ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
						    
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		 $output .= '
            <div class="col-md-3" style="margin-top:12px;"> 
            <div class="panel panel-info">
            <div class="panel-heading">
                  '.$row["name"].'
            </div>
                   
           <div class="panel-body"><img src="images/'.$row["image"].'" class="img-responsive" /><br /></div>
                 
                  <div class="panel-heading">$ '.$row["price"] .'<button id="'.$row["id"].'" style="float:right;" class="btn btn-danger btn-xs add_to_cart">Add to cart</button></div>
                   
                  <input  type="text" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" />
                  <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
                  <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
                 
                  
            </div>
        </div>
            ';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>