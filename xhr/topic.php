<?php
include '../config.php';
    
    $topics = $_GET['topic'];
    foreach($topics as $topic){
        
        if(substr($topic['name'],0,5) == 'topic'){
            $topic_survey[$topic['name']] =  $topic['value'];
        }   
        
        if($topic['name'] == 'sugg_topic'){
            //topic suggest
            $query = "INSERT INTO `topic_sugg`(`user_id`,`topic_sugg` ) VALUES('". $_SESSION['user_id'] ."','". $topic['value'] ."')" ;
            $sql1 = mysqli_query($sqlConnect,$query);
        }
    }
    //topic table
    $fields = '`' . implode('`, `', array_keys($topic_survey)) . '`';
    $datas   = '\'' . implode('\', \'', $topic_survey) . '\'';
    $query = "INSERT INTO `topic`(`user_id`,". $fields .") VALUES('". $_SESSION['user_id'] ."',".$datas.")" ;
    $sql2     = mysqli_query($sqlConnect,$query );

    if($sql1 && $sql2){
        $data = array(
            'status' => 200,
            'html' => $query
        );
    }else{
        $data = array(
            'status' => 400
        );
    }
   
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
?>