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
        <div>
            <img class="img-responsive" src="img/sunset.jpg" alt="this could be a slideshow">
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
            <form method="post" id="form-order">
                <div class="row">
                    <div class="col-md-4">
                        <input class="inbox" id="name" name="name" placeholder="Name" ><br>
                        <input class="inbox" id="email" name="email" placeholder="Email" ><br>
                        <input class="inbox" id="message" name="message" placeholder="Message (optional)"><br>
                        <input class="inbox" id="quantity" type="number" name="quantity" placeholder="Quantity" ><br>
                    </div>
                    <div class="col-md-2">
                        <select id="color" class="inbox">
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" id="img-product" src="img/placeholder-red.png" alt="product">
                    </div>               
                </div>
            <br><input type="button" class="btn btn-primary" id="order" value="Order">
            </form>
            <div id="result">
            </div>

        </div>

    </div>
    <script>

    jQuery(function(){
        $("#color").change(function(){
            var color = $(this).val();
            $("#img-product").attr("src", "img/placeholder-"+color+".png");
        })

        /* paslepti graziai visa forma, pranesti apie sekminga uzsakyma */
        $("#order").on("click",function(){
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();
            var color = $("#color").val();
            var qty = $("#quantity").val();
            console.log(qty);
            
            /* reikia duomenu patikrinimo bent kazkokio */
            if (name.length == 0){
                alert("Please enter your name.")
                return;
            }
            if (email.length < 3 || email.indexOf("@") == -1){
                alert("Please enter a valid e-mail.")
                return;
            }
            if (qty == "" || qty > 100 || qty < 1){
                alert("Please enter valid order amount [1-100].")
                return;
            }

            $.ajax({
                url: "db.php",
                type: "post",
                data: {
                    'name' : name,
                    'email' : email,
                    'message' : message,
                    'quantity' : qty,
                    'color' : color,
                    'action' : 'add',
                },
                success: function() {
                    $("#form-order").text("Order added successfully."); 
                }
            });
            return false;
        });

    });
</script>
</body>
</html>

