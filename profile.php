<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/profile.css">
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
        <div class="contain">
            <div class="row">
                <div class="col-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row center-xs">
                        <div class="col-xs-12">
                            <img src="images/bgwall.jpg" alt="Profile Image" class="imageb">
                            <div class="row center-xs">
                                <div class="col-xs-6">
                                    <form id="registerForm" class="needs-validation" method="POST" name="form1" novalidate>
                                        <input class="form-control input_user" type="text" placeholder="Username">
                                        <div class="invalid-feedback feeduser"></div>
                                        <input class="form-control input_first_name" type="text" placeholder="First Name">
                                        <div class="invalid-feedback feedfname"></div>
                                        <input class="form-control input_last_name" type="text" placeholder="Last Name">
                                        <div class="invalid-feedback feedlname"></div>
                                        <input class="form-control input_email" type="text" placeholder="Email">
                                        <div class="invalid-feedback feedemail"></div>
                                        <input class="form-control input_pass1" type="password" placeholder="Password">
                                        <div class="invalid-feedback feedpass1"></div>
                                        <input class="form-control input_pass2" type="text" placeholder="Re-enter Password">
                                        <div class="invalid-feedback feedpass2"></div>
                                        <button class="btn btn-primary" type="submit" id="savebtn">Save</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
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
        <script src="js/profile.js"></script>
        <!-- Script Files------------------------- -->

    </body>
</html>