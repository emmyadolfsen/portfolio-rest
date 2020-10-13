<?php 
// Inkludera
include("includes/config.php");
include("classes/work/workcontr.class.php");
include("classes/work/workview.class.php");


$method = $_SERVER['REQUEST_METHOD'];   // Kolla vilken metod som används

if(isset($_GET['id'])) {                // Kolla om id finns med i adresssen
   $id = $_GET['id']; 
} 

$courseObj = new WorkContr();           // Instansiera kontrollklass

switch($method) {
    case 'GET':

        $courseObj = new WorkView();        // Instansiera klassen

        if(isset($id)) {                    // Om id är medskickat, hämta specifikt objekt
            $courseObj->showWork($id);
        } else {                            // Om id inte är skickat - hämta alla data
            $courseObj->showAllWork();      
        }

        if(sizeof($courseObj) > 0) {        // Om resultatet är större än 0 status OK
            http_response_code(200);
        } else {
            http_response_code(404);
            $courseObj = array("message" => "Inga kurser hittades");
        }
       
    break;

    case 'POST':

        $data = json_decode(file_get_contents("php://input"));  // Hämta data från input
  
        // Spara data i variabler
        $work_name = $data->work_name;
        $work_place = $data->work_place;
        $work_title = $data->work_title;
        $work_date = $data->work_date;
        
        // Hämta data från input
        if($courseObj->createWork($work_name, $work_place, $work_title, $work_date)) {
            http_response_code(201); // Skapad
            $result = array("message" => "Kurs skapad");
        } else {
            http_response_code(503); // Server error
            $result = array("message" => "Något gick fel - Kursen ej skapad");
        }
        
    break;

    case 'PUT':

        if(!isset($id)) {                                       // Om inget id är skickat:
            http_response_code(510);
            $result = array("message" => "Inget id skickat");
        } else {                                                // Om id är skickat:
        $data = json_decode(file_get_contents("php://input"));  // Hämta data från input
        
         // Spara i variabler
         $work_name = $data->work_name;
         $work_place = $data->work_place;
         $work_title = $data->work_title;
         $work_date = $data->work_date;

        // Skicka vidare data för uppdatering av objekt
        if($courseObj->updateWorkContr($id, $work_name, $work_place, $work_title, $work_date)) {
            http_response_code(200); // uppdaterad
            $result = array("message" => "Kurs skapad");
        } else {
            http_response_code(503); // Server error
            $result = array("message" => "Något gick fel - Kursen ej skapad");
        }
    
        }
        break;

        case 'DELETE' :
   
            if(!isset($id)) {                   // Om inget id är medskickat
                http_response_code(510);
                $result = array("message" => "Inget id skickat");
            } else {                            // Om id är skickat, skicka vidare för radering av objekt
            if($courseObj->deleteWorkContr($id)) {
                http_response_code(200); // uppdaterad
                $result = array("message" => "Kurs raderad");
            } else {
                http_response_code(503); // Server error
                $result = array("message" => "Något gick fel - Kursen ej raderad");
            }
    
            }
        break;
}

?>