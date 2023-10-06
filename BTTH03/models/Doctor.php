<?php
class Doctor{
    private ?int $id;
    private string $nameDoctor;
    private string $special;

    public function __construct($id, $name, $special){
        $this->id = $id;
        $this->nameDoctor = $name;
        $this->special = $special;
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
	public function getNameDoctor(): string {
		return $this->nameDoctor;
	}
	
	/**
	 * @param string $nameDoctor 
	 * @return self
	 */
	public function setNameDoctor(string $nameDoctor): self {
		$this->nameDoctor = $nameDoctor;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSpecial(): string {
		return $this->special;
	}
	
	/**
	 * @param string $special 
	 * @return self
	 */
	public function setSpecial(string $special): self {
		$this->special = $special;
		return $this;
	}
}