<?php
class PDOEx extends PDO{
    private $queryCount = 0;

    #make a connection
    public function __construct($hostname,$dbname,$username,$password)
    {
        parent::__construct($hostname,$dbname,$username,$password);

        try 
        { 
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
        catch (PDOException $e) 
        {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        ++$this->queryCount;
        return parent::query($query);
    }

    public function exec($statement)
    {
        ++$this->queryCount;
        return parent::exec($statement);
    }

    public function GetCount()
    {
        return $this->queryCount;
    }
}
?>