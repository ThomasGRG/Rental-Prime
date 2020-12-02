<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/item.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Item - RentMachine</title>
    </head>
    <body>
        <!-- NavBar------------------------- -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light
                        justify-content-between"> 
                <a class="navbar-brand" href="#"> 
                    <img src= ""
                         width="30" height="30" 
                         class="d-inline-block align-top" alt="">  
                  RentalPrime
                </a> 
                <button class="navbar-toggler " 
                        type="button" data-toggle="collapse" 
                        data-target="#navbarNavDropdown01" 
                        aria-controls="navbarNavDropdown01"
                        aria-expanded="false" 
                        aria-label="Toggle navigation" 
                        style="outline-color:#fff"> 
                    <span class="navbar-toggler-icon"></span> 
                </button> 
  
                <div class="collapse navbar-collapse" 
                     id="navbarNavDropdown01"> 
  
                    <ul class="navbar-nav "> 
                        
                        <!--dropdown item of menu-->
                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle" 
                               href="#" id="navbarDropdown" 
                               role="button" data-toggle="dropdown"
                               aria-haspopup="true" 
                               aria-expanded="false"><i class="fa fa-map-marker" aria-hidden="true"></i> Kochi</a>
                            <!--dropdown sub items of menu-->
                            <div class="dropdown-menu"
                                 aria-labelledby="navbarDropdown"> 
                                <a class="dropdown-item" href="#"> 
                                  Kochi
                                </a> 
                                <a class="dropdown-item" href="#"> 
                                  Delhi 
                                </a> 
                                <div class="dropdown-divider"></div> 
                                <a class="dropdown-item" href="#"> 
                                  More Locs  
                                </a> 
                            </div> 
                        </li> 
                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle" 
                               href="#" id="navbarDropdown" 
                               role="button"
                               data-toggle="dropdown" 
                               aria-haspopup="true" 
                               aria-expanded="false"><i class="fa fa-tag" aria-hidden="true"></i> Categories
                            </a> 
                            
                            <!--dropdown sub items of menu-->
                            <div class="dropdown-menu" 
                                 aria-labelledby="navbarDropdown" 
                                 style="max-width: 1366px;"> 
                                <a class="dropdown-item" href="#"> 
                                  Hydro 
                                </a> 
                                <a class="dropdown-item" href="#"> 
                                  Aqua
                                </a> 
                                <div class="dropdown-divider"></div> 
                                <a class="dropdown-item" href="#"> 
                                  More Content here  
                                </a> 
                            </div> 
                        </li> 
                    </ul>
                    <!--Form item of menu for search purpose-->
                    <form class="form-inline mx-auto">
                        <input class="form-control"
                               type="search" placeholder="Search"
                               aria-label="Search" id="formSpan">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <button class="btn" type="button"><i class="fa fa-shopping-cart"></i> Cart</button>
                    <button class="btn" type="button"><i class="fa fa-sign-in"></i> Log in</button>
                </div> 
            </nav>
        <!-- NavBar------------------------- -->

        <!-- FlexCols------------------------- -->
        <div class="row around-xs">
            <div class="col-xs-6">
                <div class="contain">
                    <img src="" class="imageb mpic">
                    <h2 class="txtDec mtitle">Desktop PC i3 8GB RAM</h2>
                    <h6 class="txtDec mdesc">Desktop PC with i3 processor, 8GB RAM and 500GB HDD. Keyboard and mouse are included</h6>
                    <label class="lbla mrent">5000Rs/Day</label>
                    <label class="lbla mrentw">35000Rs/Week</label>
                    <label class="lbla mrentm">100000Rs/Month</label>
                    <div class="row start-xs">
                        <div class="col-xs-4">
                            <h6 class="txtDed mdeposit">Refundable Deposit: 3000Rs</h6>
                        </div>
                        <div class="col-xs-4">
                            <h6 class="txtDed">Delivery Fees: 500Rs</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-5">
                <div class="contain">
                    <div class="row start-xs">
                        <div class="col-xs-6">
                            <h5 class="txtDec mdays">Number of Days: 0</h5>
                            <h5 class="txtDec mrentc">Rent: 0 Rs</h5>
                        </div>
                        <div class="col-xs-6">
                            <h5 class="txtDec mdeposit">Refundable Deposit: 3000Rs</h5>
                            <h5 class="txtDec">Delivery Fees: 500Rs</h5>
                        </div>
                    </div>
                    <!-- Calendar------------------------- -->
                    <div>
                        <input type="text" id="litepicker">
                    </div>
                    <!-- Calendar------------------------- -->
                    <button class="btnEx" type="button"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- FlexCols------------------------- -->
        
        <!-- BackToTopButton------------------------- -->
        <a class="myBtn" title="Go to top" href="javascript:void(0);"><i class="fa fa-arrow-up"></i></a>
        <!-- BackToTopButton------------------------- -->

        <!-- Footer------------------------- -->
        <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Rental<span>Prime</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">rentalprime &copy; 2019</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>21 Revolution Street</span> Delhi, India</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123456</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">contact@rentalprime.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					Rental Prime is an online rental platform for machineries &amp; tools.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
        <!-- Footer------------------------- -->

        <!-- Script Files------------------------- -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/jquery.getUrlParam.js"></script>
        <script src="js/item.js"></script>
        <!-- Script Files------------------------- -->

    </body>
</html>