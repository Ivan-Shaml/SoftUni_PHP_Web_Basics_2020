<?php

class Book
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var float
     */
    protected $price;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws Exception
     */
    protected function setTitle(string $title): void
    {
        if (strlen($title) >= 3) {
            $this->title = $title;
        }else{
            throw new Exception("Title not valid!");
        }
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @throws Exception
     */
    protected function setAuthor(string $author): void
    {
        $author_names = explode(" ", $author);
        if(count($author_names) < 2) {
            throw new Exception("Author not valid!");
        }else{
            if (preg_match("/^[A-Za-z]+$/", $author_names[1])) {
                $this->author = $author;
            }else {
                throw new Exception("Author not valid!");

            }
        }
    }


    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    protected function setPrice(float $price): void
    {
        if ($price <=0){
            throw new Exception("Price not valid!");
        }else {
            $this->price = $price;
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "OK\n" . $this->getPrice().PHP_EOL;
    }
}

class GoldenEditionBook extends Book
{
    /**
     * GoldenEditionBook constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $title, string $author, float $price)
    {
        parent::__construct($title, $author, $price);
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return parent::getPrice() * 1.3;
    }
}

//MAIN
$bookAuthor = readline();
$bookTitle = readline();
$bookPrice = readline();
$bookType = readline();

if ($bookType === "STANDARD"){
    try {
        $book = new Book($bookTitle, $bookAuthor, $bookPrice);
        echo $book;
    }catch (Exception $e){
        echo $e->getMessage();
    }
}else if ($bookType === "GOLD"){
    try {
        $goldBook = new GoldenEditionBook($bookTitle, $bookAuthor, $bookPrice);
        echo $goldBook;
    }catch (Exception $e){
        echo $e->getMessage();
    }
}else{
    echo "Type is not valid!";
}