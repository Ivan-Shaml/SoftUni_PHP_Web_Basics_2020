<?php

class Human
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    protected function setFirstName(string $firstName): void
    {
        if (preg_match("/^[A-Z]+$/", $firstName[0])) {
            if (strlen($firstName) < 4){
                throw new Exception("Expected length at least 4 symbols!Argument: firstName");
            }
        }else{
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName): void
    {
        if (preg_match("/^[A-Z]+$/", $lastName[0])) {
            if (strlen($lastName) < 3){
                throw new Exception("Expected length at least 3 symbols!Argument: lastName");
            }
        }else{
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        $this->lastName = $lastName;
    }
}
class Student extends Human
{
    /**
     * @var string
     */
    private $facultyNumber;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $facultyNumber
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return string
     */
    public function getFacultyNumber(): string
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    private function setFacultyNumber(string $facultyNumber): void
    {
        if (strlen($facultyNumber) >=5 && strlen($facultyNumber) <= 10) {
            $this->facultyNumber = $facultyNumber;
        }else{
            throw new Exception("Invalid faculty number!");
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "First Name: {$this->getFirstName()}\nLast Name: {$this->getLastName()}\nFaculty number: {$this->getFacultyNumber()}\n";
    }
}
class Worker extends Human
{
    /**
     * @var float
     */
    private $whpd;
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * Worker constructor.
     * @param string $firstName
     * @param string $lastName
     * @param float $whpd
     * @param float $weekSalary
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, float $whpd, float $weekSalary)
    {
        parent::__construct($firstName, $lastName);
        $this->setWhpd($whpd);
        $this->setWeekSalary($weekSalary);
    }

    /**
     * @return float
     */
    public function getWhpd(): float
    {
        return number_format(($this->whpd), 2,'.','');
    }

    /**
     * @param float $whpd
     * @throws Exception
     */
    private function setWhpd(float $whpd): void
    {
        if ($whpd >= 1 && $whpd <= 12) {
            $this->whpd = $whpd;
        }else {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName): void
    {
        if (strlen($lastName) > 3) {
            $this->lastName = $lastName;
        }else{
            throw new Exception("Expected length more than 3 symbols!Argument:lastName");
        }
    }

    /**
     * @return float
     */
    public function getWeekSalary(): float
    {
        return number_format(($this->weekSalary), 2,'.','');
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    private function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary > 10) {
            $this->weekSalary = $weekSalary;
        }else{
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
    }

    /**
     * @return float
     */
    private function getSalaryHour(): float
    {
        return number_format(($this->getWeekSalary() / ($this->getWhpd() * 7)), 2, '.', '');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "First Name: {$this->getFirstName()}\nLast Name: {$this->getLastName()}\nWeek Salary: {$this->getWeekSalary()}\nHours per day: {$this->getWhpd()}\nSalary per hour: {$this->getSalaryHour()}\n";
    }
}
//MAIN
$st = explode(" ", readline());
$wr = explode(" ", readline());

try {
    $student = new Student($st[0], $st[1], $st[2]);
    $worker = new Worker($wr[0], $wr[1], $wr[3], $wr[2]);
    echo $student;
    echo PHP_EOL;
    echo $worker;
    echo PHP_EOL;
}catch (Exception $e){
    echo $e->getMessage(). PHP_EOL;
}