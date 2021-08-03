<?php session_start(); var_dump($_SESSION['rr']);?>
<form id="user_form">
First of all Please Enter Your name<br>
<input type="text" name="user_name"><br>
Email<br>
<input type="text" name="email"><br>
Contact no<br>
<input type="text" name="phone"><br>
<input type="submit">
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