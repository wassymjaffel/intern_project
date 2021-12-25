<?php 

class patient
{
    protected $id;    
    protected $first_name; 
    protected $last_name;   
    protected $anniversary;     
    protected $address;
    protected $tel;
    protected $work;
    


    public function __construct($id, $first_name, $last_name,$anniversary,$address,$tel,$work) 
    {
       $this->id = $id;
       $this->first_name = $first_name;
       $this->last_name = $last_name;
       $this->anniversary = $anniversary;
       $this->address = $address;
       $this->tel = $tel;
       $this->work = $work;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of anniversary
     */ 
    public function getAnniversary()
    {
        return $this->anniversary;
    }

    /**
     * Set the value of anniversary
     *
     * @return  self
     */ 
    public function setAnniversary($anniversary)
    {
        $this->anniversary = $anniversary;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of work
     */ 
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Set the value of work
     *
     * @return  self
     */ 
    public function setWork($work)
    {
        $this->work = $work;

        return $this;
    }

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'First_name' => $this->getFirst_name(),
            'last_name' => $this->getLast_name(),
            'Anniversary' => $this->getAnniversary(),
            'Address' => $this->getAddress(),
            'Tel' => $this->getTel(),
            'Work' => $this->getWork()
        ];
    }

}

?>