<?php 
// echo 1;
require("../controllers/cart_controller.php");
// echo 1;
require("../controllers/customer_controller.php");
// echo 1;
session_start();

$cid = $_SESSION['customer_id'];

$count_cart = count_cart_ctrl($cid);
$every_item = every_cart_item_ctr($cid);
$total_price = total_price_ctrl($cid);
$c_email = user_email_ctrl($cid);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<h1>Summary of Items</h1>

<br>

<button type="button" onclick = "document.location= 'all_product.php'"><b>All Products</b></button>


<br><br>
    

<?php
$cart_option = select_cart_ctrl();

    
    //if ($product_option) {
        foreach($cart_option as $cart_one){
            // print_r($cart_one);
            $product_name = $cart_one['product_title'];
            // echo "$product_name";
            $product_price = $cart_one['product_price'];
            $product_desc = $cart_one['product_desc'];
            $product_image = $cart_one['product_image']; 

            //echo "<option value = $product_id>$product_name</option>";
        

    
    //else {echo "<option value = 'not available'>product not found</option>";
    
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $pid = $_POST['pid'];
        $txtbox = $_POST['cartitem'];

        $update_textbox = update_textbox_ctrl($pid, $cid, $txtbox);
        if ($update_textbox) {
          header("Location: cart.php");
      }
      else{
          return false;
      }

      }

?>

<div class="container">
  
  <div class="card-columns">
    <div class="card bg-primary">
      <!-- Image of the product-->
      <img src="<?php echo $cart_one['product_image']?>" style="width: 350px; height: 150px">
      <div class="card-body text-center">
        <p class="card-text"><?php echo $cart_one['product_title']?></p>
        <p class="card-text"><b>$<?php echo $cart_one['product_price']?></b></p>

       <p> Unit Quantity: <?php echo $cart_one['qty']?> </p>
        
        
      </div>
    </div>   
    
  </div>
</div> 
<?php }?>



<h4> Total number of items: <?php echo $count_cart[0]['SUM(qty)'] ?></h4>


<!-- <h3>Total Price: GHS <?php echo $total_price["SUM(cart.qty * products.product_price)"]?>.00</h3>
<button type="submit" onclick = "payWithPaystack()"><b>Proceed to Pay</b></button> -->

<form action="#" method="post">
<form id="paymentForm">
  <div class="form-group">
    <!-- <label for="email"><b>Email Address:</b></label><br> -->
    <input type="hidden" id="email-address" value = "<?php  echo $c_email['customer_email'] ?>" required />
  </div>
  
  <br>
  <div class="form-group">
    <label for="amount"><b>Amount (GHS):</b></label><br>
    <!-- <input type="number" id="amount" required /> -->
    <textarea name="amount" id="amount" cols="5" rows="1" readonly="readonly"><?php echo $total_price["SUM(cart.qty * products.product_price)"]?></textarea>
  </div>

  <div class="form-submit">
  <button type="submit" onclick="payWithPaystack()"> Pay </button>
  </div>
</form>

<script>
    /* const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false); */
    function payWithPaystack() {
        event.preventDefault();
        let handler = PaystackPop.setup({

            key: 'pk_test_2cacd4f2ff4601c3ac0dbcab94c51c2f9aa3d371', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            currency: 'GHS',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
            alert('Window closed.');
            },
            callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);
            // add_payment_detail_ctrl
            email = document.getElementById("email-address").value;
            amount = document.getElementById("amount").value;
            var dataString = 'email='+ email + '&amount='+ amount;
            if (response.status=='success'){
            //alert("Please Fill IN All Fields");
            
            
           
            $.ajax({
            type: "POST",
            url: "../actions/process_payment.php",
            data: dataString,
            cache: false,
            success: function(result){
            alert(result);
            window.location="payment_success.php";
            // window.location = "pay"
            }
            });
          }
          

            }
            

        });
        handler.openIframe();
    }
</script>

</body>
</html>
