<?php
class Patient{
    private ?int $id;
    private string $namePatient;
    private string $date;
    private string $symptom;
    private int $idDoctor;

    public function __construct($id, $name, $date, $symptom, $idDoctor){
        $this->id = $id;
        $this-> namePatient = $name;
        $this->date = $date;
        $this->symptom = $symptom;
        $this->idDoctor = $idDoctor;
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNamePatient(): string {
		return $this->namePatient;
	}
	
	/**
	 * @param string $namePatient 
	 * @return self
	 */
	public function setNamePatient(string $namePatient): self {
		$this->namePatient = $namePatient;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDate(): string {
		return $this->date;
	}

	/**
	 * @return string
	 */
	public function getSymptom(): string {
		return $this->symptom;
	}
	
	/**
	 * @param string $symptom 
	 * @return self
	 */
	public function setSymptom(string $symptom): self {
		$this->symptom = $symptom;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getIdDoctor(): int {
		return $this->idDoctor;
	}
	
	/**
	 * @param int $idDoctor 
	 * @return self
	 */
	public function setIdDoctor(int $idDoctor): self {
		$this->idDoctor = $idDoctor;
		return $this;
	}

	/**
	 * @param string $date 
	 * @return self
	 */
	public function setDate(string $date): self {
		$this->date = $date;
		return $this;
	}
}