<?php 
include("includes/config.php");
/*
include("classes/dbh.class.php");
include("classes/work.class.php");
include("classes/workcontr.class.php");
include("classes/workview.class.php");
*/
?>

<?php
// Gör tjänsten tillgänglig från alla domäner
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$method = $_SERVER['REQUEST_METHOD'];
// Kolla om id finns med i adresssen
if(isset($_GET['id'])) {
   $id = $_GET['id']; 
} 

// Lägg till klasserna

$courseObj = new WorkContr();

switch($method) {
    case 'GET':
        $table = 'work';
        $courseObj = new WorkView();
        // Om id är skickat hämta rad från den kursen
        if(isset($id)) {
            $courseObj->showWork($id);
        } else {
            // Om id inte är skickat - hämta alla data
            $courseObj->showAllWork();
        }

        // Om resultatet är större än 0
        if(sizeof($courseObj) > 0) {
            http_response_code(200);
        } else {
            http_response_code(404);
            $courseObj = array("message" => "Inga kurser hittades");
        }
       
    break;

    case 'POST':

        // Hämta data
        $data = json_decode(file_get_contents("php://input"));
  
        // Spara data i variabler
        $work_name = $data->work_name;
        $work_place = $data->work_place;
        $work_title = $data->work_title;
        $work_date = $data->work_date;
        
        // Skicka iväg data till createCourse
        if($courseObj->createWork($work_name, $work_place, $work_title, $work_date)) {
            http_response_code(201); // Skapad
            $result = array("message" => "Kurs skapad");
        } else {
            http_response_code(503); // Server error
            $result = array("message" => "Något gick fel - Kursen ej skapad");
        }
        
    break;

    case 'PUT':

        // Om inget id är skickat 
        if(!isset($id)) {
            http_response_code(510);
            $result = array("message" => "Inget id skickat");
        } else {
        // Om id är skickat
        $data = json_decode(file_get_contents("php://input"));
        
         // Spara i variabler
         $work_name = $data->work_name;
         $work_place = $data->work_place;
         $work_title = $data->work_title;
         $work_date = $data->work_date;

        // Skicka vidare data till updateContr
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

            // Om inget id är medskickat
            if(!isset($id)) {
                http_response_code(510);
                $result = array("message" => "Inget id skickat");
            } else {
            // Om id är skickat skicka vidare det till deleteContr
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