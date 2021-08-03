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
    <?php foreach ($nodeList as $item) {
        if ($nodeList->item($i)->nodeValue[0] == '#') {  ?>
            <input type="checkbox" value="1" name="topic<?php echo $i;?>">
    <?php
            echo substr($nodeList->item($i)->nodeValue, 3) . "<br>";
        } else {
            echo $nodeList->item($i)->nodeValue . "<br>";
        }
        $i++;
    }
    ?>
    <label for="yes_no_radio">Would you like to add any topics to the above list?</label>
    <input type="radio" name="yes_no" value="no" checked>No</input>
    <input type="radio" name="yes_no" value="yes">Yes</input>
    <br><br>
    <div id="extra" style="display:none">
        <div class="input_fields_wrap">
            <div><input type="text" name="sugg_topic" placeholder="Enter Topic"></div>
        </div>
        <br>
        <button class="add_field_button">Add Topic</button>
    </div>
    <br>
    <input type="submit" name="submit" value="Submit">
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
                $(wrapper).append('<div><input type="text" placeholder="Enter Topic" name="sugg_topic" />&nbsp;&nbsp;<button class="remove_field">Close</button></div>'); //add input box
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