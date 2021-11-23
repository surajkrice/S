<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="c.ss">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style>
  		*{
  			padding: 0;
  			margin: 0;
  			box-sizing: border-box;
  		}
  		.nav{
  			width: auto;
  			height: 30px;
  			background-color: #498DF4;
  		}
  		.logo1 {
  			padding: 30px;
  			justify-content: space-around;
  			position: absolute;
  			margin-left: 400px;
  			margin-top: -500px;
  			
  		}
  		body{
  			position: relative;
  		}
        form{
            border-style: outset;
            width: 20px;
            padding: 10px;
            height: 250px;

        }
  		
  	</style>
</head>
<body>
		<img src="logo.jpg">
	<div class="nav">	
	</div>

	<style>
    .main {
    
    background-color: skyblue;
    position: relative;
    
}

   form{

    position: absolute;
    margin-top: 100px;
    margin-left: 33%;
    width: 30%;
    height: 320px;


   }
   label {
    text-align: center;
    font-size: 27px;
   }
   input{
    font-size: 15px;
    font-size: left;
   }
   select{
    font-size: 15px;
   }
   .box {
    padding-left: 100px;
    padding-right: 100px;
    font-size: 20px;
    text-align: center;
    background-color: #f55727;
    color: white;
    border-radius: 15px;
   }
   a {
    color: red;
   }
   .headline{
            background-color: #498DF4;
            width: 350px;
            padding: 10px;
            border-radius: 15px;
            margin-left: 35%;
            color: white;
            text-align: center;
            margin-top: 30px;
            position: absolute;
            border-style: outset;


    }

</style>
    <span id="top_span"><marquee>Note:- This portal is open till 31 March 2020...Plz edit your information, if wrong.</marquee></span>
        <div class="headline">
        <h3>Fill Admission Form</h3>
        </div>
<div class="main">
<center><form>
   <label>Name :&nbsp;&nbsp;</label> <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    <label>Phone No :</label> <input type="textbox" name="phone" id="phone" placeholder="Enter your Phone No"/><br/><br/>
    <label>Email ID :</label> <input type="email" name="email" id="email" placeholder="Enter your email No"/><br/><br/>
    <label for="class">Select Department :</label> 
    <select id="class" name="class">
  <option value="volvo">BBA</option>
  <option value="saab">BCA</option>
  <option value="fiat">B.TECH</option>
  <option value="audi">MCA</option>
  <option value="volvo">MBA</option>
  <option value="saab">M.TECH</option>
  
</select><br/><br/>
    <label>Amount :</label> <input  type="textbox" name="amt" id="amt" value="920" readonly><br/><br/><br/>
    <input class="box" type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>


</form></center>
</div>
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
                 jQuery.ajax({
               type:'post',
               url:'admission_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_UY1y7bu0apmIK4", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Team Future",
                        "description": "For Addmission",
                        "image": "pay_logo.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'admission_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="admission_thank_you.php";
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
</body>
</html>