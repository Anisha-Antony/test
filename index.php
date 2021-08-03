<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>

    body {
  -webkit-user-select: none;
     -moz-user-select: -moz-none;
      -ms-user-select: none;
          user-select: none;
}
.grid {
        display: none;
    }
    .inputdata{
    position: absolute;
    top: 0%;
    left: 5%;
    }
    .gridoption{
        display:initial;
        /* margin-top: 10px; */
    font-size: 15px;
    font-family: serif;
    text-transform: capitalize;
    }
    .textalign{
        margin-left: 22%;
    }
    .form-control{
        width: 50% !important;
        margin-top:5px;
    }
    .form-data{
        margin-top: 8px;
    }
   
/* input,
textarea {
     -moz-user-select: text;
} */
</style>
<div class="grid inputdata" style="display:block">
<?php 

error_reporting(0);


$page = file_get_contents('http://localhost/img/test.html');
$doc = new DOMDocument();
$doc->loadHTML($page);   

$xpath = new DomXPath($doc);

$nodeList = $xpath->query("///span[@class='c1']");
$i=0;$j=0;
foreach($nodeList as $item){

    if($nodeList->item($i)->nodeValue == '+-----+'){

        ?>
            <form id="user<?php echo $j;?>" method="POST">
           <div class="form-data">
               <span class="gridoption"> Is the question relevant</span><br> 
                <?php //echo $j;?>
                <input type="radio"  name="Q<?php echo $j;?>-q" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-q" value="no">No<br><br>
                <span class="gridoption">Is option A relevant </span><br>
                <input type="radio"  name="Q<?php echo $j;?>-a" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-a" value="no">No<br>
                <input type="text" class="form-control form-rounded" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-a"><br>
                <span class="gridoption">Is option B relevant </span><br>
                <input type="radio"  name="Q<?php echo $j;?>-b" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-b" value="no">No<br>
                <input type="text" class="form-control form-rounded" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-b"><br>
                <span class="gridoption">Is option C relevant</span><br>
                <input type="radio"  name="Q<?php echo $j;?>-c" >Yes 
                <input type="radio"  name="Q<?php echo $j;?>-c" >No<br>
                <input type="text" class="form-control form-rounded" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-c"><br>
                <span class="gridoption">Is option D relevant</span><br>
                <input type="radio"  name="Q<?php echo $j;?>-d" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-d" value="no">No<br>
                <input type="text" class="form-control form-rounded" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-d"><br> 
                <input type="submit"class="btn btn-primary gridoption textalign" value="submit" onClick="aa('<?php echo "user".$j;?>')">
            
                <!-- <hr><hr> -->
               </div>
            </form>
        <?php
        echo '</div><div class="grid">';$j++;
        
    }
    echo $nodeList->item($i)->nodeValue."<br>";
?>
<span class="gridoption"><?php
    ++$i;
}
?>
</div>
<button id="click">Click</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
function aa(form_id){
    console.log(form_id);


    $( '#'+form_id ).submit(function( event ) {
        
        var $formData = $('#user1').serializeArray();
        // var formData = JSON.stringify($('#user1').serializeObject());
        // console.log(formData);
        event.preventDefault();
        display();

        var data = JSON.stringify($formData)
        console.log(data);
        // $.ajax({
        // url: "https://script.google.com/macros/s/AKfycbzSmvFjjzj9X82AbDVyYCKy1QprfC06Q5WcuBFmqB8fbFP0YwWQ_LOmVc0PwvYjtR-Vsw/exec",
        // type: "POST",
        // data: data,
        // contentType: "application/json",
        // dataType: 'jsonp'
        // })
        // .done(function(res) {
        // console.log('success')
        // })
        // .fail(function(e) {
        // console.log(e)
        // });

        // window.receipt = function(res) {
        // // this function will execute upon finish
        // }
    });
}
</script>
<script>
    var button = document.querySelector('#user0').addEventListener('click', display);
    var allDiv= document.querySelectorAll('.grid');
    var count=0;
    function display(){
        
        if (count >= allDiv.length){
            count = 0;alert('yt');
        }
        for (let i = 0; i < allDiv.length; i++) {
            
            allDiv[i].style.display = 'none';
        }
        allDiv[count].style.display = 'block';
        count = count + 1;
    }
</script>
