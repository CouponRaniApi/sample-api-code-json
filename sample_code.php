<?php
/*	
	#last updated on 05-03-2013 
	#CouponRani Development 
	#mail us at : care@couponrani.com
*/
$my_api_id="your_api_code"; 	// replace with your api id
												// if you dont have an api id register here http://www.couponrani.com/staticpages/apidoc
$json_string=file_get_contents("http://api.couponrani.com/api/data/{$my_api_id}");
$json_object=json_decode($json_string);
$coupons=$json_object->coupons->coupon; 		// you will get all the coupons as stdObjects in $coupons

foreach($coupons as $coupon ) 					// parsing through each coupon
{
	$coupon=(array)$coupon; 				// convert object to array	
	 
	$name=$coupon["Name"]; 					// Name of the coupon
	$url=$coupon["Destination URL"]; 		// Url to the store for activation of coupons
	$couponcode=$coupon["Code"]; 			// Coupon code to be applied at checkout
	$description=$coupon["Description"]; 	// A short Description of the coupon
	$expirydate=$coupon["Expiry Date"]; 	// in 2013-03-07 format
	$store=$coupon["Store Name"]; 			// Store name : Jabong, Flipkart, Goibibo etc
	$image=$coupon["Image URL"]; 			// Image for the coupon
	
	// Displaying the result 
	// here you can insert it to your database for storing coupons
	// its better to store coupons on a daily basis rather than querying everytime to our server
	// storing on your side will help pages load faster.
	// here you can write the script if you want to just display the coupon
	// for example we are now just displayig the coupon  
	
	echo 	"<div class='coupon'><h5>{$name}</h5>
			<p><img src='{$image}' />{$description}</p>
			<h5>Coupon Code: {$couponcode}</h5>
			<p>Expires on {$expirydate}</p>
			<p>Available on store :  {$store}</p>
			</div>";
	

	// HAVE ANY QUERIES? FEEL FREE TO MAIL US ON care@couponrani.com 
} 
?>
<!-- Some style to make it look good -->
<style>
div.coupon 
{
margin-left: 10px;
margin-top: 10px;
float:left;
background-color: #ffffff;
border: 3px solid #f0f1f2;
border-radius: 6px 6px 6px 6px;
color: #636363;
padding: 4px;
spacing: 4px;
position: relative;
width: 350px;
height: 230px;
}
div.coupon  p img
{ float:left;margin-left:10px;margin-right:10px;border:#f0f1f2 2px solid; width:100px; }
</style>
<!-- Some style to make it look good -->