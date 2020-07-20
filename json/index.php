<?php
    session_start();
    require_once ('..\..\..\..\estimator.php');
    $response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(
            isset($_POST['data-period-type']) and
            isset($_POST['data-time-to-elapse']) and
            isset($_POST['data-reported-cases']) and 
            isset($_POST['data-population']) and
            isset($_POST['data-total-hospital-beds'])
        ){// operate the data further
            $data = inputData(
                $_POST['data-period-type'], 
                $_POST['data-time-to-elapse'],
                $_POST['data-reported-cases'],
                $_POST['data-population'],
                $_POST['data-total-hospital-beds']);

           if($data){
                $output =  covid19ImpactEstimator($data);
                $response['estimate'] = $output;
            }else{
                $response['error'] = true;
                $response['message'] = "Some error occured please try again";
            }
        }
        else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request";
    }

    if(!empty($_POST['content-type']) && $_POST['content-type'] == 'xml'){
        $_SESSION['content-type'] = $_POST['content-type'];
        $_SESSION['response'] = $response;
        header("Location: ../xml");
    }else if(!empty($_POST['content-type']) && $_POST['content-type'] == 'json'){
        displayXML($response, $_POST['content-type']);
    }else{
        displayXML($response);
    }
    