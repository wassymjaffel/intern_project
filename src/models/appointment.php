<?php 

class appointment
{
    protected $id;    
    protected $patient; 
    protected $date;   
    protected $intervention;     
    protected $doit;
    protected $recu;


    public function __construct($id, $patient, $date,$intervention,$doit,$recu) 
    {
       $this->id = $id;
       $this->patient = $patient;
       $this->date = $date;
       $this->intervention = $intervention;
       $this->doit = $doit;
       $this->recu = $recu;
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
     * Get the value of patient
     */ 
    public function getpatient()
    {
        return $this->patient;
    }

    /**
     * Set the value of patient
     *
     * @return  self
     */ 
    public function setpatient($patient)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of intervention
     */ 
    public function getIntervention()
    {
        return $this->intervention;
    }

    /**
     * Set the value of intervention
     *
     * @return  self
     */ 
    public function setIntervention($intervention)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get the value of doit
     */ 
    public function getDoit()
    {
        return $this->doit;
    }

    /**
     * Set the value of doit
     *
     * @return  self
     */ 
    public function setDoit($doit)
    {
        $this->doit = $doit;

        return $this;
    }

    /**
     * Get the value of recu
     */ 
    public function getRecu()
    {
        return $this->recu;
    }

    /**
     * Set the value of recu
     *
     * @return  self
     */ 
    public function setRecu($recu)
    {
        $this->recu = $recu;

        return $this;
    }
}

?>