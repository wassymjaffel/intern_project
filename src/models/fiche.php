<?php 

class fiche
{
    protected $id;    
    protected $patient;
    protected $observations; 
    protected $teeth;   

    public function __construct($id, $patient, $teeth,$observations) 
    {
       $this->id = $id;
       $this->patient = $patient;
       $this->teeth = $teeth;
       $this->observations = $observations;
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
     * Get the value of observations
     */ 
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set the value of observations
     *
     * @return  self
     */ 
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get the value of teeth
     */ 
    public function getTeeth()
    {
        return $this->teeth;
    }

    /**
     * Set the value of teeth
     *
     * @return  self
     */ 
    public function setTeeth($teeth)
    {
        $this->teeth = $teeth;

        return $this;
    }
}

?>