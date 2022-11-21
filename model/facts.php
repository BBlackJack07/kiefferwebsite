<?php
require('model/model.php');

class Fact
{
    public int $id;
    public string $title;
    public int $author_id;
    public string $content;
}

class FactRepository extends Model
{
    public function getFacts(int $nb): array
    {
        $this->dbConnect();
        $statement = $this->database->prepare(
            "SELECT id, title, content, author_id FROM facts ORDER BY id DESC LIMIT 0, ?");
        $statement->execute([$nb]);
        $facts = [];
        while (($row = $statement->fetch())) {
            $fact = new Fact();
            $fact->title = $row['title'];
            $fact->content = $row['content'];
            $fact->author_id = $row['author_id'];
            $fact->id = $row['id'];
            $facts[] = $fact;
        }
        return $facts
    } 

    public function postFact(Fact $fact)
    {
        $this->dbConnect();
        $statement = $this->database->prepare(
            "INSERT INTO facts (title,content,author_id) VALUES(?,?,?)");
        $statement->execute([$fact->title,$fact->content,$fact->author_id]);
    }
}


