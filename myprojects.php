<?php 
// Inkludera
include("includes/config.php");
include("classes/projects/projectscontr.class.php");
include("classes/projects/projectsview.class.php");


$method = $_SERVER['REQUEST_METHOD'];   // Kolla vilken metod som används

if(isset($_GET['id'])) {                // Kolla om id finns med i adresssen
   $id = $_GET['id']; 
} 

$courseObj = new ProjectsContr();       // Instansiera kontrollklass

switch($method) {
    case 'GET':

        $courseObj = new ProjectsView();        // Instansiera klassen

        if(isset($id)) {                        // Om id är medskickat, hämta specifikt objekt
            $courseObj->showProject($id);
        } else {                                // Om id inte är skickat - hämta alla data
            $courseObj->showProjects();
        }
        
        if(sizeof($courseObj) > 0) {            // Om resultatet är större än 0 status OK
            http_response_code(200);
        } else {
            http_response_code(404);            
            $courseObj = array("message" => "Inga kurser hittades");
        }
       
    break;

    case 'POST':

        $data = json_decode(file_get_contents("php://input"));  // Hämta data från input
  
        // Spara data i variabler
        $project_name = $data->project_name;
        $project_url = $data->project_url;
        $project_d = $data->project_d;
        $project_img = $data->project_img;
        
        // Hämta data från input
        if($courseObj->createProject($project_name, $project_url, $project_d, $project_img)) {
            http_response_code(201); // Skapad
            $result = array("message" => "Projekt skapat");
        } else {
            http_response_code(503); // Server error
            $result = array("message" => "Något gick fel - Projekt ej skapat");
        }
    
    break;

    case 'PUT':
         
        if(!isset($id)) {                                       // Om inget id är skickat:
            http_response_code(510);
            $result = array("message" => "Inget id skickat");
        } else {                                                // Om id är skickat:
        $data = json_decode(file_get_contents("php://input"));  // Hämta data från input
        
         // Spara i variabler
         $project_name = $data->project_name;
         $project_url = $data->project_url;
         $project_d = $data->project_d;
         $project_img = $data->project_img;

        // Skicka vidare data för uppdatering av objekt
        if($courseObj->updateProjectContr($id, $project_name, $project_url, $project_d, $project_img)) {
            http_response_code(200); // uppdaterad
            $result = array("message" => "Kurs skapad");
        } else {
            http_response_code(503); // Server error
            $result = array("message" => "Något gick fel - Kursen ej skapad");
        }
        }
        break;

        case 'DELETE' :

            
            if(!isset($id)) {                       // Om inget id är medskickat
                http_response_code(510);
                $result = array("message" => "Inget id skickat");
            } else {                                // Om id är skickat, skicka vidare för radering av objekt
            if($courseObj->deleteProjectContr($id)) {
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