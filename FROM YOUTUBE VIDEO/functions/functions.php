<?php
    $db=mysqli_connect("localhost","root","123Aashish456","ecom");

    function getPro(){
        global $db;
        $get_product="select * from products order by 1 DESC LIMIT 0,6";
        $run_products=mysqli_query($db,$get_product);
        while($row_product=mysqli_fetch_array($run_products)){
            $pro_id=$row_product['product_id'];
            $pro_title=$row_product['product_title'];
            $pro_price=$row_product['product_price'];
            $pro_img1=$row_product['product_img1'];

            echo "<div class='col-md-4 col-sm-6'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'>INR $pro_price</p>
                        <p class='buttons'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                        </p>
                    </div>
                </div>
            </div>";
        }
      }
        /*product Categories*/
        function getPCats(){
          global $db;
          $get_p_cats="select * from product_categories";
          $run_p_cats=mysqli_query($db,$get_p_cats);
          while($row_p_cats=msqli_fetch_array($run_p_cats)){
            $p_cat_id=$row_p_cats['p_cat_id'];
            $p_cat_title=$row_p_cats['p_cat_title'];
            echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
          }
        }
        /*categories*/
        function getCat(){
          global $db;
          $get_cat="select * from categories";
          $run_cat=mysqli_query($db,$get_cat);
          while($row_cat=msqli_fetch_array($run_cat)){
            $cat_id=$row_cat['cat_id'];
            $cat_title=$row_cat['cat_title'];
            echo"<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
          }
        }
        /*GET Product categories product*/
        function getPcatPro(){
          global $db;
          if(isset($_GET['p_cat'])){
             $p_cat_id=$_GET['p_cat'];
             $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id' ";
             $run_p_cat=mysqli_query($db,$get_p_cat);
             $rows_p_cat=mysqli_fetch_array($run_p_cat);
             $p_cat_title=$row_p_cat['p_cat_title'];
             $p_cat_desc=$row_p_cat['p_cat_desc'];
             $get_products="select * from products where p_cat_id='$p_cat_id' ";
             $run_products=mysqli_query($db,$get_products);
             $count=mysqli_num_rows($run_products);
             if($count==0){
               echo "
               <div class='box'>
               <h1>No Product Found In This Product Category</h1>
               </div>

               ";
             }
             else{
               echo "
                <div class='box'>
                <h1>$p_cat_title</h1>
                <p>$p_cat_desc</p>
                </div>
               ";
             }
             while($row_products=mysqli_fetch_array($run_products)){
               $pro_id=$row_products['product_id'];
               $pro_title=$row_products['product_title'];
               $pro_price=$row_products['product_price'];
               $pro_img1=$row_products['product_img1'];
               echo "
                 <div class='col-md-4 col-sm-6 center-responsive'>
                 <div class='product'>
                 <a href='details.php?pro_id=$pro_id'>
                   <img src='admin_area/product_images/$pro_img1' claa='img-responsive' />
                 </a>
                 <div class='text'>
                 <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                 <p class='price'>$pro_price</p>
                 <p class='buttons'>
                   <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View details</a>
                   <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                 </p>
                 </div>
                 </div>
                 </div>

               ";
             }



          }
        }
        /*get categories*/
        function getCatPro(){
          global $db;
          if(isset($_GET['cat_id'])){
            $cat_id=$_GET['cat_id'];
            $get_cat="select * from categories where cat_id='$cat_id'";
            $run_cats=mysqli_quesry($db,$get_cat);
            $row_cat=mysqli_fetch_array($run_cats);
            $cat_title=$row_cat['cat_title'];
            $cat_desc=$row_cat['cat_desc'];
            $get_products="select * from products where cat_id='$cat_id'";
            $run_products=mysqli_query($db,$get_products);
            $count=mysqli_num_rows($run_products);
            if($count==0){
              echo "
              <div class='box'>
              <h1>No Product Found In This Category</h1>
              </div>

              ";
            }
            else{
              echo "
               <div class='box'>
               <h1>$cat_title</h1>
               <p>$cat_desc</p>
               </div>
              ";
            }
            while($row_products=mysqli_fetch_array($run_products)){
              $pro_id=$row_products['product_id'];
              $pro_title=$row_products['product_title'];
              $pro_price=$row_products['product_price'];
              $pro_img1=$row_products['product_img1'];
              echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                <a href='details.php?pro_id=$pro_id'>
                  <img src='admin_area/product_images/$pro_img1' claa='img-responsive' />
                </a>
                <div class='text'>
                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                <p class='price'>$pro_price</p>
                <p class='buttons'>
                  <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View details</a>
                  <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                </p>
                </div>
                </div>
                </div>

              ";
            }
          }
        }

?>
