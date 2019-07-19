<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>ALLAHUAKBAR</title>
	
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .popover
    {
        width: 100%;
        max-width: 600px;
    }
    </style>

</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
         <a href="#" class="navbar-brand">ALALHUAKBAR</a>

      </div>
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-th-list"></span>Products</a></li>
        <li style ="width: 300px;left: 10px;top:10px;"><input type="text" class="form-control" id ="search"></li>
        <li style ="top: 10px;left: 20px;"><input type="submit" class="btn btn-primary" id ="search_btn"></li>
      </ul>





   
 

    


  
<ul class="nav navbar-nav navbar-right">

     <li>
                <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
                  <span class="glyphicon glyphicon-shopping-cart"></span>
                  <span class="badge"></span>
                  <span class="total_price">$ 0.00</span>
                </a>
              </li>
    <li><a href="#"class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
          <ul class ="dropdown-menu">


            <div style="width: 300px;">
              <div class="panel-heading">Login</div>
              <div class="panel-heading">
                <label for="email">Email</label>
                <input type="email"  class="form-control" id="email" required/>
                <label for="email">Password</label>
                <input type="password" class="form-control" id="password" required/>
                <p><br/></p>
               <a href="#">Forgooten password</a>
               <input type="submit" class="btn btn-success" style="float:right;" id="Login" value="Login">
                
               
              </div>
 
               <div class="panel-footer" id="e_msg"></div>             
            </div>


          </ul>
        </li>
    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-gift"></span>Gift</a></li>
    <li></li>
     

   </ul>


<div id="popover_content_wrapper" style="display: none">
        <span id="cart_details"></span>
        <div align="right">
          <a href="#" class="btn btn-primary" id="check_out_cart">
          <span class="glyphicon glyphicon-shopping-cart"></span> Check out
          </a>
          <a href="#" class="btn btn-default" id="clear_cart">
          <span class="glyphicon glyphicon-trash"></span> Clear
          </a>
        </div>
      </div>
    </div>
  </div>
<p><br/></p>
    <p><br/></p>
    <p><br/></p>

     <p><br/></p>
    <p><br/></p>
    <p><br/></p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
          <div id="get_category">
          </div>
          <!--<div class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"><h4>Categories</h4></a></li>
            <li><a href="#">Catagories</a></li>
            <li><a href="#">Catagories</a></li>
            <li><a href="#">Catagories</a></li>
            <li><a href="#">Catagories</a></li>
          </div> -->
          <div id="get_brand">
          </div>
                <!--<div class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"><h4>Brand</h4></a></li>
            <li><a href="#">Catagories</a></li>
            <li><a href="#">Catagories</a></li>
            <li><a href="#">Catagories</a></li>
            <li><a href="#">Catagories</a></li>
          </div>-->
        </div>


        <div class="col-md-8">
          <div class="panel panel-info">
            <div class="panel-heading">Products</div>
            <div class="panel-body">
              <div id ="get_product">
                
              </div>
              <!--<div class="col-md-4">
                <div class="panel panel-info">
                  <div class="panel-heading">Samsung Glaxy</div>
                  <div class="panel-body">
                    <img src="image/image-1.jpeg" alt=""/>
                  </div>
                  <div class="panel-heading">
                    $.5000.00
                    <button style="float: right;" class="btn btn-danger btn-xs">Add to Cart</button>
                  </div>
                  
                </div>
                
                </div>-->
            
      <div id="display_item">

      </div>
            </div>
            <div class="panel-footer">&copy;2019</div>
          </div>

        </div>
        <div class="col-md-1"></div>
      </div>
    </div>





</body>
</html>


<script>  


$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"fetch.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#display_item ').html(data);
      }
    });
  }
  
  $('#search').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});





$(document).ready(function(){

  load_product();

  load_cart_data();
    
  function load_product()
  {
    $.ajax({
      url:"fetch_item.php",
      method:"POST",
      success:function(data)
      {
        $('#display_item').html(data);
      }
    });
  }

  function load_cart_data()
  {
    $.ajax({
      url:"fetch_cart.php",
      method:"POST",
      dataType:"json",
      success:function(data)
      {
        $('#cart_details').html(data.cart_details);
        $('.total_price').text(data.total_price);
        $('.badge').text(data.total_item);
      }
    });
  }

  $('#cart-popover').popover({
    html : true,
        container: 'body',
        content:function(){
          return $('#popover_content_wrapper').html();
        }
  });

  $(document).on('click', '.add_to_cart', function(){
    var product_id = $(this).attr("id");
    var product_name = $('#name'+product_id+'').val();
    var product_price = $('#price'+product_id+'').val();
    var product_quantity = $('#quantity'+product_id).val();
    var action = "add";
    if(product_quantity > 0)
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
        success:function(data)
        {
          load_cart_data();
          alert("Item has been Added into Cart");
        }
      });
    }
    else
    {
      alert("lease Enter Number of Quantity");
    }
  });

  $(document).on('click', '.delete', function(){
    var product_id = $(this).attr("id");
    var action = 'remove';
    if(confirm("Are you sure you want to remove this product?"))
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, action:action},
        success:function()
        {
          load_cart_data();
          $('#cart-popover').popover('hide');
          alert("Item has been removed from Cart");
        }
      })
    }
    else
    {
      return false;
    }
  });

  $(document).on('click', '#clear_cart', function(){
    var action = 'empty';
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{action:action},
      success:function()
      {
        load_cart_data();
        $('#cart-popover').popover('hide');
        alert("Your Cart has been clear");
      }
    });
  });
    
});

</script>