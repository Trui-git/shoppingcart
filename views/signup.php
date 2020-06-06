<?php
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $loggedIn = login($user, $pass);
        $loggedIn = $loggedIn->fetch();
		if($loggedIn){
            // already registered user
            echo '<script>alert("Welcome, you are already registered, please login")</script>'; 
        }
        else{
            create_user($user, $pass, $email);
            $loggedIn = login($user, $pass);
            $loggedIn = $loggedIn->fetch();
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['sessionUserID'] = $loggedIn['userID'];
            $_SESSION['sessionUserName'] = $loggedIn['username'];
        }    
    }
?>


<div id="signup">       
    <form class="signupForm" method="POST" action=".">
        <div class="signupContent">
            <h1>Sign Up</h1>            

            <label for="username"><b>User Name</b></label>
            <input type="text" placeholder="Enter User Name" name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" onclick="HideProduct()" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>