<?php

require_once "./class/order.php";
require_once "./class/order_item.php";
require_once "./class/medicine.php";
// require_once '../Controller/DBController.php';
require_once './Controller/conn.php' ;
// echo "done";
// require_once './header.php';
require_once 'class/Appointment.php';

$database=Database::getInstance();
if(isset($_SESSION)==false)
session_start();
// print_r($_SESSION);

$obj;
if(isset($_SESSION['order'])==null){
  $obj= Order::getInstance();
  $obj->setOrder_id(5);
$_SESSION['order']=$obj;

  }  $order= Order::getInstance();
if (isset($_POST['add_to_cart'])) {
  
 
   
   $medicine=new Medcine;
   $medicine->setDescription($_POST['description']);
   $medicine->setMedcine_id((int)$_POST['id']);
   $medicine->setPrice((float)$_POST['price']);
   $medicine->setTitle($_POST['title']);
   
    $count=$_POST['quantity'];
    $order_item=new OrderItem;
    $order_item->setMedcine($medicine);
  //  echo $order_item->getMedcine();
    $order_item->setCount($count);
   
     $new_name=  $_SESSION['order']; 
    $new_name->addItem($order_item);
    //$order->print();
    $_SESSION['order']=$new_name;
    $obj=$new_name;
    $_POST['add_to_cart']="yes";
    
} 
if(isset($_POST['card'])){
		$database->query = "
		SELECT * FROM patient_table 
		WHERE patient_id = '".$_SESSION["patient_id"]."'
		";
        
		$patient_data = $database->get_result();
        $data = array(
            
            ':patient_id'				=>	$_SESSION['patient_id'],
           ':date'				=>	date('y-m-d'),
           ':cost'				=>	$_SESSION['order']->getTotal(),
           
            
            
        );
        
	$database->query=	"
    INSERT INTO doctor_appointment.order_table (date, cost, patient_id) VALUES (:date, :cost, :patient_id)
    ";
   $database->execute($data);
   $database->query=	"
    INSERT INTO doctor_appointment.medicinorder (count, order_id, medicine_id) VALUES (:count, :order_id, :medicine_id)
    ";
   $order_id= $database->connect->lastInsertId();
    foreach ($_SESSION['order']->getItems() as $item){
        $data = array(
            
            ':count'				=>	$item->getCount(),
           ':order_id'				=>	$order_id,
           ':medicine_id'				=>	$item->getMedcine()->getMedcine_id(),
           
            
            
        );
        
   $database->execute($data);
    }
    $_SESSION['order']=null;
  header('location:./index.php',true);


		

		
	

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Digital Healthcare Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- ME ICON -->
    <script src="https://kit.fontawesome.com/1477233ace.js" crossorigin="anonymous"></script>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./css/sb-admin-2.css" rel="stylesheet">
    <link href="./css/cart.css" rel="stylesheet">

</head>

<body>

    <?php 
    include("navbar.php");
    
    ?>
    <main id="main">


        <!-- ======= medicine section ======- -->
        <section id="medicine" class="medicine">

            <div class="both medicine">
                <div class="section-title">
                    <h2>Medicine</h2>
                    <p>The easiest way to order and follow up with your monthly medications.</p>
                </div>
            </div>
            <!-- ME ADD  -->
            <div class="container mt-5 p-3 rounded cart">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="product-details mr-2">
                            <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span
                                    class="ml-2">Continue Shopping</span></div>
                            <hr>
                            <h6 class="mb-0">Shopping cart</h6>
                            <?php
                    echo '<div class="d-flex justify-content-between"><span>You have '.count($_SESSION['order']->getItems()).' items in your cart</span>
                    <div class="d-flex flex-row align-ites-center"><span class="text-black-50">Sort by:</span>
                        <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i></div>
                    </div>
                </div>';
               
                    foreach($_SESSION['order']->getItems() as $item){
                  $med = $item->getMedcine();
                    echo '<div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="assets\img\medical-icon-png-33.png" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block">'.$med->getTitle().'</span><span class="spec">'.$med->getDescription().'</span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block">'.$item->getCount()." x ".$item->getMedcine()-> getPrice().'</span><span class="d-block ml-5 font-weight-bold">'.$item->getTotal().'</span><i class="fa fa-trash-o ml-3 text-black-50"></i></div>
                </div>';
                    } 
                    ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <form action="medicine.php" method="post" id="cart_form" >
                        <div class="payment-info">
                            <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img
                                    class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span
                                class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio"
                                    name="card" value="payment" checked> <span><img width="30"
                                        src="https://img.icons8.com/color/48/000000/mastercard.png" /></span> </label>

                            <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                        src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>

                            <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                        src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>


                            <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                        src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
                            <div><label class="credit-card-label">Name on card</label><input type="text"
                                    class="form-control credit-inputs" placeholder="Name"></div>
                            <div><label class="credit-card-label">Card number</label><input type="text"
                                    class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                            <div class="row">
                                <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text"
                                        class="form-control credit-inputs" placeholder="12/24"></div>
                                <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text"
                                        class="form-control credit-inputs" placeholder="342"></div>
                            </div>
                            <hr class="line">
                            <div class="d-flex justify-content-between information">
                                <span>Subtotal</span><span>$3000.00</span></div>
                            <div class="d-flex justify-content-between information">
                                <span>Shipping</span><span>$20.00</span></div>
                            <div class="d-flex justify-content-between information"><span>Total(Incl.
                                    taxes)</span><span>$3020.00</span></div><button
                                class="btn btn-primary btn-block d-flex justify-content-between mt-3" value="make_order"
                                type="submit"><span><?php echo $_SESSION['order']->getTotal();  ?></span><span>Checkout<i
                                        class="fa fa-long-arrow-right ml-1"></i></span></button>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>

            <div class="MainBannerstyle__Container-sc-13pq5ou-0 hxsCmT">

                <div class="MainBannerstyle__FeaturesWrapper-sc-13pq5ou-2 itokdC">
                    <!-- ================================= ICON =================================== -->
                    <!-- SQUARE FOR EACH ICON WITH LETTER "jMtqom" -->
                    <div class="MainBannerstyle__IconWithTitleWrapper-sc-13pq5ou-3 jMtqom">
                        <!-- "Iconstyle__FontIcon-sc-17qmo8o-0 kzvCWZ" -->
                        <i id="" size="16" color="" class="fa-solid fa-user-nurse"></i>
                        <div class="MainBannerstyle__IconSubTitle-sc-13pq5ou-4 kvITsU">Consult a Pharmacist</div>
                    </div>

                    <!-- ==================================================== Search ============================================== -->

                    <div id="newSetOrder" class="NewSetOrderstyle__Container-fadffb-0 hoRxsH">
                        <h2 class="NewSetOrderstyle__Title-fadffb-1 cvHUWz">Order your medicines and all your medicine
                            needs</h2>
                        <!-- ======================== FOR SEARCH BAR =======================================-->




                        <?php $search = isset($_POST['search'])?$_POST['search']:''; ?>
                        <br>
                        <h3>This page content is based on: <?php  echo $search!=null?"No Thing":$search;?></h3>
                        <br>
                        <div class="col-xm-12 col-sm-12 col-md-6 col-lg-9 py-5">
                            <div class="row">
                                <!-- <div class="col-md-12"> -->
                                <form action="medicine.php" method="post" class=" d-flex py-3">
                                    <input type="text" name="search" class="form-control mb-4"
                                        placeholder="Type here to search....">
                                    <br>
                                    <!-- class="form-control mb-4" -->
                                    <button type="submit" class="btn btn-success mb-4">submit</button>
                                </form>
                                <!-- </div> -->
                            </div>
                            <div class="card section-intro px-4 ">
                                <div class="card-body ">
                                    <div class="card-header items-header">
                                        <h4><b>Current Items</b></h4>
                                    </div>
                                    <div class="row py-3 items">
                                    </div>
                                </div>


                                <script src="dist/js/bootstrap.bundle.min.js"></script>


                                <!-- ====================================== PHP && HTML PART FOR SEARCH ========================== -->
                                <div class=" row py-3 items">

                                    <!-- //connect ot the database -->

                                    <?php 
     
     // fetch data from the database
     
     require "./Controller/conn.php";

     $query = "SELECT * FROM medicine"; 
     $result = mysqli_query($conn, $query);
     
     

        require_once './Controller/conn.php' ;

        
        //get the search keyword

        //SQL query to get the products based on the search keyword
        $sql = "SELECT * FROM medicine WHERE title LIKE '%$search%' OR description LIKE '%$search %'";
        //execute the query
        $res = mysqli_query($conn, $sql) ;
        //count the rows
        $count = mysqli_num_rows($res);
        //check whether the product is available
        if ($count > 0) {
            while ($row  = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row ['description'];
                $price =$row['price'];
                ?>

                                    <div class="col-lg-4">
                                        <form action="medicine.php" method="post"
                                            enctype="multipart/form-data">
                                            <div class="card shadow mb-4">
                                                <div class="card-body ">
                                                    <h5 name="title"><b><?php echo "Name: $title ";?></b></h5>
                                                    <br>
                                                    <h5 class="secondary"> <?php echo " Description: $description";?>
                                                    </h5>
                                                    <br>
                                                    <h7 class="secondary"> <?php echo"Price: $price EGP";?></h7>
                                                    <br><br>
                                                    <input type="number" class="form-control mb-3" name="quantity"
                                                        value="0">
                                                    <input type="hidden" name="description"
                                                        value="<?php echo $description;?>">
                                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                                    <input type="hidden" name="price" value="<?php echo $price;?>">
                                                    <input type="hidden" name="title" value="<?php echo $title;?>">
                                                    <button type="submit" name="add_to_cart" value="not"
                                                        class="btn btn-warning">
                                                        <i class="fa fa-shopping-cart"> </i> Add to Cart
                                                    </button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <?php
                      
            }
            
        }else {
            echo "<div class='alert alert-danger'>
            there is no product matching your search....
            </div>";
        }


?>

                                </div>



                                <!--=========================================== END OF SEARCH BAR ======================== -->

                                <!-- END OF ME -->
        </section>


    </main>

    <!-- End #main -->

    <!-- ======= Footer ======= -->

    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>

	$('#cart_form').on('submit', function(event){

		

		if($('#cart_form').parsley().isValid())
		{

			$.ajax({
				
				
				dataType:"json",
                "ajax" : {
			url:"action",
			type:"POST",
			data:{action:'make_order'}
		},
				beforeSend:function(){
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					$('#submit_button').val('Book');
					if(data.error != '')
					{
						$('#form_message').html(data.error);
					}
					else
					{	
					//	window.location.href="appointment.php";
					}
				}
			})

		}

	});



</script>
</body>

</html>