<?php
class Student{
    private $id;
    private $tenSinhvien;
    private $email;
	private $ngaySinh;
    private $idLop;

    public function __construct($id, $tenSinhvien, $email, $ngaySinh, $idLop){
        $this->id = $id;
        $this->tenSinhvien=$tenSinhvien;
        $this->email=$email;
		$this->ngaySinh=$ngaySinh;
        $this->idLop=$idLop;
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTenSinhvien() {
		return $this->tenSinhvien;
	}
	
	/**
	 * @param mixed $tenSinhvien 
	 * @return self
	 */
	public function setTenSinhvien($tenSinhvien): self {
		$this->tenSinhvien = $tenSinhvien;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNgaySinh() {
		return $this->ngaySinh;
	}
	
	/**
	 * @param mixed $ngaySinh 
	 * @return self
	 */
	public function setNgaySinh($ngaySinh): self {
		$this->ngaySinh = $ngaySinh;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdLop() {
		return $this->idLop;
	}
	
	/**
	 * @param mixed $idLop 
	 * @return self
	 */
	public function setIdLop($idLop): self {
		$this->idLop = $idLop;
		return $this;
	}
}