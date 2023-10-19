<?php

include 'connect.php';
include 'menu.html';
//$group=$_GET['group'];
function splitStringToArray($inputString) {
    $stringArray = explode(',', $inputString);
    $stringArray = array_map('trim', $stringArray);
    return $stringArray;
}

function isStringNotEmpty($inputString) {
  
    $trimmedString = trim($inputString);
    
    if (!empty($trimmedString)) {
        return $inputString;
    } else {
        return false;
    }
}



$querry = "SELECT question.row_counter, question.name, question.title, question.type, choice.question_name, choice.choice_name ,question.visible_if, question.is_required , question.show_other" . " FROM question, choice " . " WHERE choice.question_name = question.name   ";

$result = $conn->query($querry);

if ($result) {
    $surveyData = array(
        "title" => "(CFO)",
        "description" => "Description",
        "logoPosition" => "right",
        "pages" => array()
    );

    $currentPageName = "";
    $currentElements = array();
    $nameCounter=0;  
    while ($query_row = $result->fetch_assoc()) {
        $nameCounter ++;
        $name = $query_row['name'];
        $type = $query_row['type'];
        $show_other = $query_row['show_other'];
        $visible_if = $query_row['visible_if'];
        $is_required = $query_row['is_required'];
        if(($type == "text")||($type == "boolean")){
 
        $questionName = $query_row['question_name'];
        $choice = $query_row['choice_name'];
        

        $arrayOfStrings = splitStringToArray($choice);

        $choices = $arrayOfStrings;

        if ($currentPageName != $name) {
            
            if (!empty($currentElements)) {
                $surveyData["pages"][] = array(
                    "name" => $currentPageName,
                    "elements" => $currentElements
                );
            }
            $currentPageName = $name.$nameCounter;
            $currentElements = array();
        }

        $currentElements[] = array(
            "type" => $type,
            "name" => $questionName,
            "title" => $name,
            "isRequired" => isStringNotEmpty($is_required),
            "visibleIf"=> isStringNotEmpty($visible_if),
            //"showOtherItem" => false
           // "choices" => $choices
        );

       }else{

        $questionName = $query_row['question_name'];
        $choice = $query_row['choice_name'];

        $arrayOfStrings = splitStringToArray($choice);

        $choices = $arrayOfStrings;

        if ($currentPageName != $name) {
          
            if (!empty($currentElements)) {
                $surveyData["pages"][] = array(
                    "name" => $currentPageName,
                    "elements" => $currentElements
                );
            }
            $currentPageName = $name.$nameCounter;
            $currentElements = array();
        }

        $currentElements[] = array(
            "type" => $type,
            "name" => $questionName,
            "title" => $name,
            "isRequired" => isStringNotEmpty($is_required),
            "visibleIf"=> isStringNotEmpty($visible_if),
            "showOtherItem" => isStringNotEmpty( $show_other ) ,
            "choices" => $choices
            
        );
        
       }
        
    }

    if (!empty($currentElements)) {
        $surveyData["pages"][] = array(
            "name" => $currentPageName,
            "elements" => $currentElements
        );
    }

    $jsonString = json_encode($surveyData, JSON_PRETTY_PRINT);
    echo $jsonString;
}

echo mysqli_error($conn);

?>

