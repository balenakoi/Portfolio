<?php
class DashboardManager
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

    public function getProductions()
    {
        if ($_SESSION['name'] == true) {
            $list_production = $this->getDb()->query("SELECT count(*) AS total_production FROM cards")->fetch();

        }
    }
    public function getMessgaes()
    {
        if ($_SESSION['name'] == true) {
            $list_message = $this->getDb()->query("SELECT count(*) AS total_message FROM about")->fetch();
        }
    }
}