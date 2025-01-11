<?php
namespace App\Classes;

use App\Config\Database;
use PDO;

class Offer
{
    private $id;
    private $post;
    private $description;
    private $salary;
    private $date;
    private $idCan;
    private $conn;

    public function __construct($post, $description, $salary, $date, $idCan)
    {
        $this->post = $post;
        $this->description = $description;
        $this->salary = $salary;
        $this->date = $date;

        $db = new Database();
        $this->conn = $db->connection();

        $idCan = new Candidat('', '', '', '');
        $result = $idCan->checkIdCandidt($_SESSION['User']['id']);
        $this->idCan = $result['idCan'] ?? null;
    }

    public function displayOffer()
    {
        $sql = 'SELECT offres.post as post
                      ,offres.description as description
                      , offres.salary as salary 
                      ,candidats_offres.date as `date` 
                FROM candidats_offres INNER JOIN offres
                WHERE candidats_offres.candidat_id = :idCan  ; ';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idCan', $this->idCan);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
            $offers = [];
            foreach ($result as $row) {
                $offers[] = new Offer($row[post], $row[description], $row[salary], $row[date]);
            }
            return $offers;
        } else {
            echo 'nothiks to desplay';
        }
    }
}

?>