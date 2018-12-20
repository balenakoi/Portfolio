<?php
class MailManager
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


    public function about(Mail $message)
    {
        $req = $this->getDb()->prepare('INSERT INTO about (name, email, message) VALUES(:name, :email, :message)');
        $req->bindValue(':name', $message->getName(), PDO::PARAM_STR);
        $req->bindValue(':email', $message->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':message', $message->getMessage(), PDO::PARAM_STR);
        $req->execute();
    }

    public function messages()
    {
        $tableMessage = [];
        $all_message_req = $this->getDb()->prepare('SELECT * FROM about');
        $all_message_req->execute();
        $array = $all_message_req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($array as $message) {
            $tableMessage[] = new Message($message);
        }
        return $tableMessage;
    }


    public function deleteMessage($id)
    {
        $message_req = $this->getDb()->prepare('DELETE FROM about WHERE id =:id');
        $message_req->bindValue(':id', $id, PDO::PARAM_INT);
        $message_req->execute();
    }
}