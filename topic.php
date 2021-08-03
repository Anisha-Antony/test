<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      .close_qstn{
        position: absolute;
        bottom: 4em;
        left: 96%;
      }
     
</style>
<?php
error_reporting(0);
$page = file_get_contents('http://localhost/img/document.html');
$doc = new DOMDocument();
$doc->loadHTML($page);
$xpath = new DomXPath($doc);
$nodeList = $xpath->query("///span[@class='c0']");
$i = 0;
$j = 0; ?>
<form id="topic" method="POST">
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto  form p-4">
    <?php foreach ($nodeList as $item) {
        if ($nodeList->item($i)->nodeValue[0] == '#') {  ?>
  
            
            <input  type="checkbox" value="1" name="topic<?php echo $i;?>">
    <?php
            echo substr($nodeList->item($i)->nodeValue, 3) . "<br>";
        } else {
            echo $nodeList->item($i)->nodeValue . "<br>";
        }
        $i++;
    }
    ?>
    <label  class="container" for="yes_no_radio">Would you like to add any topics to the above list?</label>
  <input class="" type="radio" name="yes_no" value="no">
    <span class="checkmark"></span>
  <label>No</label>

    <input class="" type="radio" name="yes_no" value="yes">
    <span class="checkmark"></span>
    <label>Yes</label>
    <br><br>
    <div id="extra" style="display:none">
        <div class="input_fields_wrap">

            <div class="form-group">
            <span><button class="add_field_button btn btn-secondary">Add Topic</button></span>
            <input type="text" class="form-control" name="sugg_topic" placeholder="Enter Topic">
            </div>
        </div>
        </div>
        <div class="text-center">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        </div>  
    
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text"  class="form-control"  placeholder="Enter Topic" name="sugg_topic" /><button type="button" class="close close_qstn remove_field" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><br>'); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
    $("input[type='radio']").change(function() {
        if ($(this).val() == "yes") {
            $("#extra").show();
        } else {
            $("#extra").hide();
        }
    });

    //ajax

    $('#topic').submit(function( event ) {
        
        var $formData = $('#topic').serializeArray();
        // console.log($formData);
        var aa= 'rewr';
        event.preventDefault();
        $.ajax({
        url: "http://localhost/img/xhr/topic.php",
        type: "GET",
        data: {'topic' : $formData},
        contentType: "application/json"
        // dataType: "jsonp"
        })
        .done(function(res) {
            if(res['status'] == 200){
                window.location.href="http://localhost/img/questions.php";
            }
        console.log('success');
        })
        .fail(function(e) {
        console.log('error')
        });

        window.receipt = function(res) {
        // this function will execute upon finish
        }
    });
</script>