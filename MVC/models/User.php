<?php
class User{
    private ?int $uid;
    private string $email;
    private string $username;
    private string $pw;
    private string $verification_code;
    private string $time_verified;
    private int $role;

    public function __construct($id, $email, $username, $pw, $verification_code, $time_verified, $role){
        $this->uid = $id;
        $this->email = $email;
        $this->username = $username;
        $this->pw = $pw;
        $this->verification_code = $verification_code;
        $this->time_verified = $time_verified;
        $this->role = $role;
    }

	/**
	 * @return 
	 */
	public function getUid(): ?int {
		return $this->uid;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string {
		return $this->username;
	}

	/**
	 * @return string
	 */
	public function getPw(): string {
		return $this->pw;
	}

	/**
	 * @return string
	 */
	public function getVerification_code(): string {
		return $this->verification_code;
	}

	/**
	 * @return string
	 */
	public function getTime_verified(): string {
		return $this->time_verified;
	}

	/**
	 * @return int
	 */
	public function getRole(): int {
		return $this->role;
	}
}
?>