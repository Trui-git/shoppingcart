<?php

    if(isset($_POST['usernameLogin']) && isset($_POST['passwordLogin'])) {
        $user = $_POST['usernameLogin'];
        $pass = $_POST['passwordLogin'];
        $loggedIn = login($user, $pass);
        $loggedIn = $loggedIn->fetch();
		if($loggedIn){
            $_SESSION['login'] = "logout"; 
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['sessionUserID'] = $loggedIn['userID'];
            $_SESSION['sessionUserName'] = $loggedIn['username'];
        }   
    }
    
    if(isset($_POST['logout'])){
        $_SESSION['sessionUserID'] = "";
        $_SESSION['sessionUserName'] = "";
        $_SESSION['login'] = "login"; 
        $_SESSION['isLoggedIn'] = false;
    }

    $isloggedIn = false;
    if(isset($_SESSION['isLoggedIn'])){
        if($_SESSION['isLoggedIn']){
            $isloggedIn = true;
        }
    }
?>


<div id="loginForm">       
    <form class="loginFormClass" method="POST" action="index.php">
        <div class="loginContent">
            <?php if($isloggedIn) :?>
                    <!--
                    //echo '<label for="username"><b>User Name: '; 
                    //echo $user;
                    //echo '</b></label>';
                    //echo '<input type="hidden" name="logout">';
                    //echo '<div class="clearfix">';
                    //    echo '<button type="submit" class="logoutbtn">Logout</button>';
                    //echo '</div>';   
                    --> 
                <?php else :?>           
                    <h1>Login</h1> 
                    <label for="username"><b>User Name</b></label>
                    <input type="text" placeholder="Enter User Name" name="usernameLogin" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="passwordLogin" required>  
                    <div class="clearfix">
                        <button type="button" onclick="HideProduct()" class="cancelbtn">Cancel</button>
                        <button type="submit" class="loginbtn">Login</button>
                    </div>               
            <?php endif; ?> 
        </div>      
    </form>
</div>