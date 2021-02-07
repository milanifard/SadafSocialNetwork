<?php


class Book
{
    public $ISBN;
    public $title;
    public $image;
    public $numberOfPage;
    public $descriptions;
    public $publisher;
    public $author;
    public $files;
    public $dates;


    public function __construct($ISBN=-1, $title="", $publisher="", $author="", $files="file") {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->author = $author;
        $this->files = $files;
    }

    public function loadFromDB($ISBN) {
        $mysql = pdodb::getInstance();
        $query = "SELECT * FROM sadaf.books WHERE ISBN=".$this->ISBN;
        //$mysql->Prepare($query);
        $res = $mysql->Execute($query);
        if ($rec = $res->fetch()) {
            $this->ISBN = $rec["ISBN"];
            $this->title = $rec["title"];
            $this->descriptions = $rec["descriptions"];
            $this->numberOfPage = $rec["numberOfPages"];
            $this->publisher = $rec["publisher"];
            $this->files = $rec["files"];
            $this->dates = $rec["dates"];
            $this->image = $rec["image"];
            $this->author = $rec["author"];
        } else {
            $this->ISBN = "";
        }
    }

    public function getAverageRating($ISBN) {
        $mysql = pdodb::getInstance();
        $query = "select avg(Rating.rating) 
                    as rating
                    from Rating, Books
                    where Rating.ISBN = Books.ISBN
                    and Rating.ISBN = ".$ISBN." group by Rating.ISBN";
        //$mysql->Prepare($query);
        $res = $mysql->Execute($query);
        if ($rec = $res->fetch()) {
            return $rec["rating"];
        }
    }

    public function findByTitle($title) {
        $mysql = pdodb::getInstance();
        $query = "SELECT * FROM Books WHERE title=?";
        $mysql->Prepare($query);
        $res = $mysql->Execute($query);
        if ($rec = $res->fetch()) {
            return $rec;
        }
    }

    public function findByAuthor($author) {
        $mysql = pdodb::getInstance();
        $query = "SELECT * FROM Books WHERE author=?";
        $mysql->Prepare($query);
        $res = $mysql->Execute($query);
        if ($rec = $res->fetch()) {
            return $rec;
        }
    }

}