<?php
class ProductionManager
{
    private $db;

    /**
     * __construct function
     * @param PDO $db
     */
    public function __construct(PDO $db)

    {
        $this->setDb($db);
    }


    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }


    public function productions()
    {
        $tableProject = [];
        $all_production_req = $this->getDb()->prepare('SELECT * FROM cards');
        $all_production_req->execute();
        $array = $all_production_req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($array as $project) {
            $tableProject[] = new Production($project);
        }
        return $tableProject;
    }

    public function addProductions($production)
    {
        $add_production = $this->getDb()->prepare('INSERT INTO cards (name, description, images, link) VALUES (:name, :description, :images, :link)');
        $add_production->bindValue(':name', $production->getName(), PDO::PARAM_STR);
        $add_production->bindValue(':description', $production->getDescription(), PDO::PARAM_STR);
        $add_production->bindValue(':images', $production->getImages(), PDO::PARAM_STR);
        $add_production->bindValue(':link', $production->getLInk(), PDO::PARAM_STR);
        $add_production->execute();
    }

    public function deleteProduction($id)
    {
        $production_req = $this->getDb()->prepare('DELETE FROM cards WHERE id =:id');
        $production_req->bindValue(':id', $id, PDO::PARAM_INT);
        $production_req->execute();
    }

    public function updateProduction($production)
    {

        $query = $this->getDb()->prepare('UPDATE cards SET name = :name, description = :description, images = :images, link = :link WHERE id = :id');
        $query->bindValue(':name', $production->getName(), PDO::PARAM_STR);
        $query->bindValue(':description', $production->getDescription(), PDO::PARAM_STR);
        $query->bindValue(':images', $production->getImages(), PDO::PARAM_STR);
        $query->bindValue(':link', $production->getLInk(), PDO::PARAM_STR);

        $query->execute();

    }
}