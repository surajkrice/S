<link rel="stylesheet" type="text/css" href="c.ss">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #header{
            height: 10%;
            width: 100%;
            top: 0%;
            background-color: black;
            position: fixed;
            color: white;
        }
        #left_side{
            height: 75%;
            width: 15%;
            top: 10%;
            position: fixed;
        }
        #right_side{
            height: 75%;
            width: 80%;
            background-color: whitesmoke;
            position: fixed;
            left: 17%;
            top: 21%;
            color: red;
            border: solid 1px black;
        }
        #top_span{
            top: 15%;
            width: 80%;
            left: 17%;
            position: fixed;
        }
    </style>
    <?php
        session_start();
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"sms");
    ?>
</head>

<style>
    .main {
    
    background-color: skyblue;
    position: relative;
    
}

   form{

    position: absolute;
    margin-top: 150px;
    margin-left: 40%;
    width: 50%;
    height: 300px;

   }
   label {
    text-align: center;
    font-size: 27px;
   }
   input{
    font-size: 17px;
   }
   select{
    font-size: 15px;
   }
   .box {
    padding-left: 130px;
    padding-right: 100px;
    font-size: 25px;
    text-align: center;
    background-color: #f55727;
    color: white;
    border-radius: 15px;

   }
   a {
    color: red;
   }

</style>
    <div id="header"><br>
        <center>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
        <a href="logout.php">Logout</a>
        </center>
    </div>
    <span id="top_span"><marquee>Note:- This portal is open till 31 March 2020...Plz edit your information, if wrong.</marquee></span>
<div class="main">
<form>
   <label>Name :&nbsp;&nbsp;</label> <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    <label>Roll No :</label> <input type="textbox" name="roll" id="roll" placeholder="Enter your Roll No"/><br/><br/>
    <label for="class">Select Department :</label> 
    <select id="class" name="class">
  <option value="volvo">BBA</option>
  <option value="saab">BCA</option>
  <option value="fiat">B.TECH</option>
  <option value="audi">MCA</option>
  <option value="volvo">MBA</option>
  <option value="saab">M.TECH</option>

</select><br/><br/>
    <label>Amount :</label> <input  type="textbox" name="amt" id="amt" placeholder="Enter amount"/><br/><br/><br/>
    <input class="box" type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</form>
</div>
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_UY1y7bu0apmIK4", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Teamfutuure",
                        "description": "Fee Payment",
                        "image": "tf.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>