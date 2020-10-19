<?php 
// Inkludera
include("includes/config.php");


$method = $_SERVER['REQUEST_METHOD'];   // Kolla vilken metod som används

if(isset($_GET['id'])) {                // Kolla om id finns med i adresssen
   $id = $_GET['id']; 
} 

$control = new Control();        // Instansiera kontrollklassen

$table_name = 'courses_read';

switch($method) {
    case 'GET':

        $view = new View();              // Instansiera viewklassen 
        
        if(isset($id)) {
            $view->showObject($id, $table_name);        // Om id är medskickat, hämta specifikt objekt
        } else {                                        // Om id inte är skickat - hämta alla data
            $view->showObjects($table_name);
        }

        if(sizeof($view) > 0) {            // Om resultatet är större än 0 status OK
            http_response_code(200);
        } else {
            http_response_code(404);
        }
       
    break;

    case 'POST':
        // Variabler för databasanrop
        $data = json_decode(file_get_contents("php://input"));  // Hämta data från input
        // Spara i variabler
        $obj1 = $data->university;
        $obj2 = $data->course_name;
        $obj3 = $data->course_date;
        $obj4 = $data->syllabus;

        // Lägg kolumnnamn i variabel
        $column = 'university, course_name, course_date, syllabus';
        
        // Skicka iväg data för att skapa objekt
        if($control->createObject($table_name, $column, $obj1, $obj2, $obj3, $obj4)) {
            http_response_code(201); // Skapad
            $result = array("message" => "Kurs skapad");
        } else {
            http_response_code(503); // Server error
        }
        
    break;

    case 'PUT':

        if(!isset($id)) {                                           // Om inget id är skickat:
            http_response_code(510);
            $result = array("message" => "Inget id skickat");
        } else {                                                    // Om id är skickat:
        $data = json_decode(file_get_contents("php://input"));      // Hämta data från input
        // Spara i variabler
        $obj1 = $data->university;
        $obj2 = $data->course_name;
        $obj3 = $data->course_date;
        $obj4 = $data->syllabus;

        // Lägg kolumnnamn i variabeler
        $col1 = 'university';
        $col2 = 'course_name';
        $col3 = 'course_date';
        $col4 = 'syllabus';

        // Skicka vidare data för uppdatering av objekt
        if($control->updateContr($table_name, $id, $col1, $col2, $col3, $col4, $obj1, $obj2, $obj3, $obj4)) {
            http_response_code(200); // uppdaterad
        } else {
            http_response_code(503); // Server error
        }
    
        }
        break;

    case 'DELETE' :

        if(!isset($id)) {                       // Om inget id är medskickat
            http_response_code(510);
        } else {                                // Om id är skickat, skicka vidare för radering av objekt
        if(isset($id)) {
            $control->deleteContr($id, $table_name); // Skicka med id och tabellnamn
            http_response_code(200); // uppdaterad
        } else {
            http_response_code(503); // Server error
        }
    
        }
    break;
}

?>