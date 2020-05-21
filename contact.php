<?php
include "includes/header.php";
include "includes/nav.php";
?>
<div class="col l12 m12 s12">
    <img src="img/hero-image-contact-us.svg" style="width:100%;">
</div>
<div class="container" style="box-shadow: 8px 8px 12px rgba(0, 124, 255, 0.233); margin-bottom: 2rem;">
            <h2 class="center">Contact Us</h2>
            <form class="contact-form" action="connect.php" method="post">
            
                    <div class="inputBox">
                        <input type="text" name="firstName" required="required">
                        <span class="text">First Name</span>
                        <span class="line"></span>
                    </div>
                
                
                    <div class="inputBox">
                        <input type="text" name="lastName" required="required">
                        <span class="text">Last Name</span>
                        <span class="line"></span>
                    </div>
                
            
            
                    <div class="inputBox">
                        <input type="text" name="email" required="required">
                        <span class="text">Email</span>
                        <span class="line"></span>
                    </div>
                
                    <div class="inputBox">
                        <input type="text" name="number" required="required">
                        <span class="text">Mobile</span>
                        <span class="line"></span>
                    </div>
                
                
                    <div class="inputBox textarea">
                        <textarea name="message" required="required"></textarea>
                        <span class="text">Type your message here..</span>
                        <span class="line"></span>
                    </div>
                
                <div class="input-field">
                    <a href="" class="btn" type="submit" name="submit" value="Send" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>Send </a>
                </div>
            
            </form>
        </div>

<?php
include "includes/footer.php"
?>