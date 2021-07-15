<?php
$title="Accueil";
    include('header.php');
   
?>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html">Vegefoods</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse text-danger" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
              <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
              <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
              <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="fas fa-shopping-cart"></span>[0]</a></li>

            </ul>
          </div>
        </div>
      </nav>
      <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="6"></li> -->
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"  >
                    <img class="d-block img-fluid" src="../../images/CIMENT.jpg"  > 
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/face2.jpg"  >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/tole (12).jpg"  >                 
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/face4.jpg"  >                  
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/Fer de 10 1.jpg"  >                  
                    </div>
                    <!-- <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/face1.jpg"  >                 
                    </div> -->
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../../images/fer-soude (11).jpg"  >                  
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
<?php
    include('footer.php');
?>
