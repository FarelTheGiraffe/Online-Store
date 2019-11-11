<h2>Online Store<h2>
<?php
if (isset($_POST['submit'])) {
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($link,$email);
	$sumfinal=$_POST['sum'];

	$quan1=$_POST['quan1'];
	$quan2=$_POST['quan2'];
	$quan3=$_POST['quan3'];
	$sum=$quan1+$quan2+$quan3;
	
	if ($sum==0)
	{
		$message="You bought nothing! No e-mail was send!";
	}
	else
	{		
		

		$haeders = "From: FarelForever <no-reply@farelforever.com>\r\nMIME-Version:1.0\r\nContent-Type:text/html;charset=utf-8";
		$mail_to = $email;
		$subject="Shopping List from FarelForever";	
		$body="<style type ='text/css'>BODY { font-family: Arial; }</style>";
		$body.="<body>This e-mail was send from FarelForever.com. Here's the shopping list:<br>";
		if ($quan1>0)	$body.="<b>x$quan1</b> GameBoy Color - 59.90 $<br>";
		if ($quan2>0)	$body.="<b>x$quan2</b> Sony PSP - 12.50 $<br>";
		if ($quan3>0)	$body.="<b>x$quan3</b> Sega Nomad - 199.99 $<br>";
		
		$body.="<b>Sum:	$sumfinal	</b> <br>";
		$body.="<br>If you requested this e-mail: cool. If you didn't: emmm I don't know!<br><br>See ya!<br>";

		$wassend = mail($mail_to ,$subject ,$body, $haeders);
	}
}	

?>
<style>

.title {
  height: 60px;
  border-bottom: 1px solid #E1E8EE;
  padding: 20px 30px;
  /* color: #5E6977; */
  font-size: 18px;
  font-weight: 400;
}

.item {
  padding: 0px 30px;
  display: flex;
}



/* Product Description */
.description {
  padding-top: 28px;
  margin-right: 60px;
  width: 115px;
}

#item4 .description {
  padding-top: 0;
}



.description span {
  display: block;
  font-size: 14px;
  color: #43484D;
  font-weight: 400;
  /* margin-top: 5px; */
}




/* Product Quantity */
.quantity {
  padding-top: 20px;
  margin-right: 60px;
  width:100px;
  max-width:100%;
}
.quantity input {
  -webkit-appearance: none;
  border: none;
  text-align: center;
  width: 32px;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}

.item button {
  width: 30px;
  height: 30px;
  background-color: #E1E8EE;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}
.minus-btn img {
  margin-bottom: 3px;
}
.plus-btn img {
  margin-top: -3px;
}
button:focus,
input:focus {
  outline:0;
}

/* Total Price */
.total-price {
  width: 83px;
  padding-top: 27px;
  text-align: right;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}

#item4 .total-price {
  padding-top: 0;
}



/* Responsive */
@media (max-width: 767px) {
  .shopping-cart {
    width: 100%;
    height: auto;
    overflow: hidden;
  }
  .item {
    height: auto;
    flex-wrap: wrap;
    justify-content: center;
  }
  .image img {
    width: 50%;
  }
  .image,
  .quantity,
  .description {
    width: 100%;
    text-align: center;
    margin: 6px 0;
  }
  .buttons {
    margin-right: 20px;
  }
  
  .total-price 	{  padding-top: 10px;	padding-bottom: 14px;}
  .quantity 	{  padding-top: 0;}
		
  #item1#item2	{border-bottom: 1px solid #eee;}
  .description {  padding-top: 14px;}
  
}	

</style>
<link rel="stylesheet" href="css/shop.css" type="text/css">
<?php
if($wassend==1)
echo"<p>The e-mail was send!</p>";


?>
<form name="shoppinglist" action="proj02.htm" method="post" >
    <div class="shopping-cart">

      <!-- Product #1 -->
      <div class="item">
        <div class="description">
          <span>GameBoy Color</span>
        </div>

        <div class="quantity">
          <button class="minus-btn" type="button" name="button">
            <img src="images/minus.svg" alt="" />
          </button>
          <input id="quan1" type="text" name="quan1" value="0">
		  <button class="plus-btn" type="button" name="button">
            <img src="images/plus.svg" alt="" />
          </button>
        </div>

        <div id="price1" class="total-price">59.90 $</div>
      </div>

      <!-- Product #2 -->
      <div  class="item">
        <div class="description">
          <span>Sony PSP</span>
        </div>

        <div class="quantity">
          <button class="minus-btn" type="button" name="button">
            <img src="images/minus.svg" alt="" />
          </button>
          <input id="quan2" type="text" name="quan2" value="0">
		  <button class="plus-btn" type="button" name="button">
            <img src="images/plus.svg" alt="" />
          </button>
        </div>

        <div id="price2" class="total-price">12.50 $</div>
      </div>

      <!-- Product #3 -->
      <div  class="item">
        <div class="description">
          <span>Sega Nomad</span>
        </div>

        <div class="quantity">
          <button class="minus-btn" type="button" name="button">
            <img src="images/minus.svg" alt="" />
          </button>
          <input id="quan3" type="text" name="quan3" value="0">
		  <button class="plus-btn" type="button" name="button">
            <img src="images/plus.svg" alt="" />
          </button>
        </div>

        <div id="price3" class="total-price">199.99 $</div>
      </div>
	  <hr>
	  <!-- Suma -->
      <div id="item4" class="item">
        <div class="description">
          <span><b>Sum</b></span>
        </div>

        <div class="quantity">
          
        </div>

        <div id="sum" class="total-price">0.00 $</div>
      </div>
	  
	  
    </div>
	
	<br>
	<br>
	<h3>Send shopping list to your e-mail.</h3>
	
		<input type="email" name="email" class="task_input form-control" placeholder="Your shopping list was send to your e-mail."  style="margin-bottom:5px;" required>
		<input id="finalsum" type="hidden" name="sum" >
		<button type="submit" name="submit" id="add_btn" class="add_btn btn btn-farel" >Send</button>
		<div id="message" style = 'font-size:11px; color:#cc0000; margin-top:10px'><?php 	echo" $message";	?></div>
		
		
		
</form>

    <script type="text/javascript">
	
		var sum = function () {
		
			var $sum=	document.getElementById('sum');
			var $value1 = parseFloat(document.getElementById('quan1').value);
			var $value2 = parseFloat(document.getElementById('quan2').value);
			var $value3 = parseFloat(document.getElementById('quan3').value);
			var $price1 = document.getElementById('price1').innerHTML;
			var $price2 = document.getElementById('price2').innerHTML;
			var $price3 = document.getElementById('price3').innerHTML;
			
			$price1= parseFloat(($price1.substring(0,$price1.length-2)));
			$price2= parseFloat($price2.substring(0,$price2.length-2));
			$price3= parseFloat($price3.substring(0,$price3.length-2));
			
			var $endsum = ($value1*$price1)+($value2*$price2)+($value3*$price3)
			$sum.innerHTML=($endsum.toFixed(2))+" $";

			document.getElementById('finalsum').value=$sum.innerHTML;
		}
	
	
	
	
      $('.minus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value > 1) {
    			value = value - 1;
    		} else {
    			value = 0;
    		}
			
			$input.val(value);
			sum();
			
			
    	});

    	$('.plus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value =100;
    		}

    		$input.val(value);
			sum();
			
    	});

    </script>