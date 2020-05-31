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
        }
        else{
            create_user($user, $pass, $email);
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

            
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" onclick="HideProduct()" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>