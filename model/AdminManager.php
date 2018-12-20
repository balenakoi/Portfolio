<?php
class AdminManager
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


    public function admin(Admin $admin)
    {
        $req = $this->getDb()->prepare("SELECT * FROM admin WHERE name = :name");
        $req->bindValue(':name', $admin->getName(), PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $user) {
            return new Admin($user);
        }
    }
    public function check()
    {
        echo "test";
    }
}