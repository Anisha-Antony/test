<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php session_start(); //var_dump($_SESSION['rr']);?>
<form id="user_form">
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto  form p-4">
<h3>Enter your details</h3><br>
    <div class="form-group">
        <label for="username">First of all Please Enter Your name</label>
        <input type="text" class="form-control"  placeholder="Enter your name" name="user_name"><br>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control"  placeholder="Enter your email" name="email"><br>
    </div>
    <div class="form-group">
        <label for="contact">Contact no</label>
        <input type="text" class="form-control"  placeholder="Enter your phone number" name="phone"><br>
    </div>
    <div class="text-center">
    <input type="submit" class="btn btn-primary">
    </div>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$('#user_form').submit(function( event ) {
        alert('gdf');
        var $formData = $('#user_form').serializeArray();
        console.log($formData);
        event.preventDefault();
        $.ajax({
        url: "http://localhost/img/xhr/user_details.php",
        type: "GET",
        data: {'user_name' : $formData[0]['value'],'email' : $formData[1]['value'],'phone' : $formData[2]['value']},
        contentType: "application/json"
        // dataType: "jsonp"
        })
        .done(function(res) {
            if(res['status'] == 200){
                window.location.href="http://localhost/img/topic.php";
            }
        console.log('success');
        })
        .fail(function(e) {
        console.log('error')
        });

        // window.receipt = function(res) {
        // // this function will execute upon finish
        // }
    });

</script>