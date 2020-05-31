<?php
  
    $cat_names=array();
    $cat_names = get_cats();

    if(isset($_GET['catID'])) {
        $_SESSION['catID'] = $_GET['catID'];
    }
    else {
        $_SESSION['catID'] = 0;
    }

    
    if(isset($_POST['logout'])){
        $_SESSION['sessionUserID'] = "";
        $_SESSION['login'] = "login"; 
        $_SESSION['isLoggedIn'] = false;
    }
    
    $isLoggedIn = false;
    if (isset($_SESSION['isLoggedIn'])){
        if ($_SESSION['isLoggedIn']){
            $isLoggedIn = true;
        }
    }

    $welcome = "";
    $itemQty[0] = 0;
    if (isset($_SESSION['sessionUserID'])){
        if (($_SESSION['sessionUserID'] !="")) {
            $cartId = get_cart_id($_SESSION['sessionUserID']);
            $cartId = $cartId->fetch();
            if ($cartId)
            {
                // when user has cart ID
                $itemQty = get_qtys_by_cart($cartId['cartID']);
                $itemQty = $itemQty->fetch();
            }
            else{
                // when not create one
                create_cart($_SESSION['sessionUserID']);
                //$itemQty[0] = 0;
            }
            $welcome = "welcome ". $_SESSION['sessionUserName'];
        }
    }       
?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <a class="navbar-brand" href="."><img id="logo" src="assets/images/logo.png" alt="logo"></a>
    <!-- Toggler/collapsibe Button -->    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">        

            <?php if (is_array($cat_names) || is_object($cat_names)) {?>
            <?php foreach($cat_names as $cat) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?catID=<?php echo $cat['catID']; ?>"
                        title="<?php echo $cat['catName']; ?>">
                        <?php echo $cat['catName']; ?>
                    </a>
                </li>
            <?php endforeach; ?>  
            <?php } ?>     
        </ul>
       
    </div>        

    <div class="cartNav">
        <a class="nav-link" href="cart.php"> <?php echo $welcome;?>
        <span id='cartCount'> <?php echo $itemQty[0];?> </span>
            <i class="fa fa-shopping-cart"></i>           
        </a>        
    </div>

    <div class="login">
        <a class="nav-link" onclick="ShowSignup()" href="#">
            sign-up
        </a>
    </div>
    <div class="login">
        <form action="index.php" method="POST">
            <?php if (!$isLoggedIn) :?>            
                    <a class="nav-link" onclick="ShowLogin()" href="#">
                        login
                    </a>     
                <?php else: ?>                    
                    <input type="hidden" value='1' name="logout">
                    <button  id="logoutButton" type="submit">
                        logout
                    </button>
                <?php endif; ?> 
        </form>
        

    </div>
</nav>
