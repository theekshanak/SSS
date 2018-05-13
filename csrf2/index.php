<html>
    <header>
    <title>Login</title>   
  
  
</header>
<body>
<?php 
session_start();
$s_id = session_id();
if (empty($_SESSION['token'])) {

    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));

    global $token = $_SESSION['token'];
}
setcookie("s_id", $s_id, time() + (1440), "/", "localhost", false, true);
setcookie("csr_token", $token, time() + (440), "/", "localhost", false, true);



?>

<form action="login.php" method="POST" class="ajax" >
    <lable>Username:</lable>
    <input type="text" required name="uname" value="admin"/>
    <lable>Username:</lable>
    <input type="password" required name="password" value="admin"/>
  
    <input type="hidden" name="csr" value="<?php echo $_SESSION['token'] ?>">
    
    <input type="submit" value="Login"/>
<div id="success"></div>
</form>

</body>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
 <script>
 $('form.ajax').on('submit', function() {

    var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};

    that.find('[name]').each(function(index, value) {
        var that = $(this),
                name = that.attr('name'),
                value = that.val();

        data[name] = value;
    });
    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response) {

            $("#success").append("<h3 style='color:red; font-size:15px;'>" + response + "</h3>");          
             
        }
    });
    return false;
});
 
 </script>
</html>