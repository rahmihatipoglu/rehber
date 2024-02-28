<?php
/* Handle CORS */
// Specify domains from which requests are allowed
header('Access-Control-Allow-Origin: *');
// Specify which request methods are allowed
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
// Additional headers which may be sent along with the CORS request
header('Access-Control-Allow-Headers: X-Requested-With,Authorization,Content-Type');

require_once 'db.php';

$cevap = array();
$jsonData = file_get_contents("php://input");
$arrGelen = json_decode($jsonData, true);
// var_dump($arrGelen);print_r($arrGelen); die();

$islem = $arrGelen['islem'];
header('Content-Type: application/json; charset=utf-8');

switch ($islem) {
  case 'add':
    $SQL = "INSERT INTO kisiler SET 
            ad      = :ad, 
            telefon = :telefon";
    $SORGU = $DB->prepare($SQL);
    $SORGU->bindParam(':ad',      $arrGelen['adi']);
    $SORGU->bindParam(':telefon', $arrGelen['telefonu']);
    $SORGU->execute();    
    $cevap['mesaj'] = "Kayıt başarılı";
    
    echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    break;

  case 'update':
      $SQL = "UPDATE kisiler SET 
              ad      = :ad, 
              telefon = :telefon
              where   id=:id";
      $SORGU = $DB->prepare($SQL);
      $SORGU->bindParam(':ad',      $arrGelen['adi']);
      $SORGU->bindParam(':telefon', $arrGelen['telefonu']);
      $SORGU->bindParam(':id',      $arrGelen['id']);
      $SORGU->execute();    
      $cevap['mesaj'] = "Kayıt başarılı";

      echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      break;

      case 'sillll':
        $SQL = "INSERT INTO kisiler SET 
                ad      = :ad, 
                telefon = :telefon";
        $SORGU = $DB->prepare($SQL);
        $SORGU->bindParam(':ad',      $arrGelen['adi']);
        $SORGU->bindParam(':telefon', $arrGelen['telefonu']);
        $SORGU->execute();    
        $cevap['mesaj'] = "Kayıt başarılı";
        
        echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        break;
    
    
  case 'delete':
    $SQL = "DELETE FROM kisiler WHERE id = :id";
    $SORGU = $DB->prepare($SQL);
    $SORGU->bindParam(':id',      $arrGelen['id']);
    $SORGU->execute();    
    $cevap['mesaj'] = "Silme başarılı";
    
    echo json_encode($cevap, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    break;
    
    default:
    
    $ID = 1;
    $SQL = "SELECT * FROM kisiler ORDER BY id desc";
    if(isset($_GET['id'])) {
     $ID = intval($_GET['id']);
     $SQL = "SELECT * FROM kisiler WHERE id = '{$ID}' ORDER BY id desc";
    }

    $SORGU = $DB->prepare($SQL);
    $SORGU->execute();    
    $cevap['mesaj'] = "Select başarılı";
    $rows = $SORGU->fetchAll(PDO::FETCH_ASSOC);
    // Bitti    
    echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
  }

