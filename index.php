<!Doctype HMTL>
<html>
    <head>
        <meta charset=""utf-8"">
        <title>LyftPrime | HomePage</title>
        <meta name="description" content="An interactive LYFT Easy Ride Finder application.">
        <link rel="stylesheet" href="main1.css">
    </head>
    
    <body>
        <div id = "menu-bar">
            <div class = "rideFinder">
                <!-- This div contains the name of the app-->
                <h2 id = "left-h">Easy Ride | Finder</h2>
            </div>
            
            <form class = "form-inline" action="page1.php" method="POST">
                <div class = "form-group">
                    <!-- This div contains the login form-->
                    <label for= "InputEmail">Email</label>
                    <input type = "email" class = "form-control" id = "inputEmail">
                </div>
                
                <div class= "form-group">
                    <label for= "InputPassword">Password</label>
                    <input type = "password" class = "form-control" id = "inputPassword">
                </div>
                
                <button type="submit" class="btn-login">Log In</button>
            </form>
            
        </div>
        
        <div id = "menu">
            
            <div id = "menu-left">
                <h3>
                    Get a ride that you want<br>
                    and faster on EasyRide.
                </h3>
                
                <div>
                    <img src="http://www.freelogovectors.net/wp-content/uploads/2016/02/lyft-logo.jpg" alt = "Get a ride in minutes." class= "img-rounded">
                </div>
            
            </div>
            
            
            <div id = "menu-rigth">
                <div>
                    <h1 id = "header-rigth">
                        Sign Up.<br>
                    </h1>
                    <p>free app and always.<br></p>
                </div>
                
                
                
                <form action="page1.php" method="POST">
                    <form class= "form2-inline">
                        <div class = "form2-group">
                            <!-- This div contains the login form-->
                            <input type = "text" class = "form2-control" id = "inputFirstName"     placeholder= "First Name">
                        </div>
                
                        <div class= "form2-group">
                            <input type = "text" class = "form2-control" id = "inputLastName"       placeholder= "Last Name">
                        </div>
                    </form>
                
                    <div class = "form2-group">
                        <!-- This div contains the login form-->
                        <input type = "email" class = "form2-control" id = "inputEmail"             placeholder= "Email">
                    </div>
                
                    <div class= "form2-group">
                        <input type = "email" class = "form2-control" id = "inputEmail"           placeholder="Re-enter Email">
                    </div>
                    
                    <div class= "form2-group">
                        <input type = "password" class = "form2-control" id = "inputPassword"        placeholder="New Password">
                    </div>
                    
                    <div>
                        <label class = "radio-inline">
                            <input type = "radio" name = "male" id = "inline-radio1" value = "option1">Male
                        </label>
                    
                        <label class = "radio-inline">
                            <input type = "radio" name = "Female" id = "inline-radio2" value = "option2">Female
                        </label>
                    </div>
                    
                    <p>
                        By clicking Sign Up, you agree to our Terms and that you have<br> 
                        read our Data Policy, including our Cookie Use.<br>
                    </p>
                    
                     <button type="submit" class="btn-signup">Sign Up</button>
                    
                </form>
                
            </div>
            
        </div>
        
        <div id = "footer">
            <p>2016 LyftPrime, Inc. Terms and Privacy always matter!!</p>
        </div>
        
    </body>
</html>
