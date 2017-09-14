<html>
<head>
    <title>Best product ever</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php require ('includes/navigation.php'); ?>
        <!-- 
        <div class="row nav">
            <div class="col-md-3">
                <a href="#">ORDER FORM</a>
            </div>
            <div class="col-md-2">
                <a href="#">ORDERS</a>
            </div>
        </div> 
        -->
        <div>
            <img class="img-responsive" src="img/sunset.jpg" alt="img of a product">
        </div>
        <div class="main about">
            <h2><i class="fa fa-lightbulb-o"></i> About this product</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna 
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="main order">
            <h2><i class="fa fa-pencil-square-o"></i> Order form</h2>
            <form method="post">
                <input class="inbox" id="name" type="text" name="name" placeholder="Name"><br>
                <input class="inbox" id="email" type="email" name="email" placeholder="Email"><br>
                <input class="inbox" id="message" type="text" name="message" placeholder="Message"><br><br>
                <input type="button" class="btn btn-primary" id="order" value="Order">
                <!-- <input type="submit" class="btn btn-primary center-block"> -->
            </form>
            <div id="result">
            </div>

        </div>

    </div>
    <script>
    jQuery(function(){
        /* paslepti graziai visa forma, pranesti apie sekminga uzsakyma */
        $("#order").on("click",function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();
            
            /* reikia duomenu patikrinimo bent kazkokio */

            $.ajax({
                url: "add_order.php",
                //dataType: 'JSON',
                type: "post",
                data: {
                    'name' : name,
                    'email' : email,
                    'message' : message,
                },
                success: function() {
                    $('#result').text('ORDER SUCCES'); 
                }
            });
            return false;
        });

    });
</script>
</body>
</html>

