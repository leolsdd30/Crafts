<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model
{
    /**
     * Find a user by their unique email address
     * 
     * @param string $email
     * @return array|false 
     */
    public function findByEmail(string $email)
    {
        $stmt = $this->query("SELECT * FROM users WHERE email = :email LIMIT 1", [
            'email' => $email
        ]);

        return $stmt->fetch();
    }

    /**
     * Create a new user record in the database
     * 
     * @param array $data Contains first_name, last_name, email, password, role
     * @return bool
     */
    public function create(array $data): bool
    {
        // Hash the password securely before saving
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (first_name, last_name, email, password_hash, role) 
                VALUES (:first_name, :last_name, :email, :password_hash, :role)";

        return $this->execute($sql, [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password_hash' => $passwordHash,
            'role' => $data['role'] ?? 'homeowner'
        ]);
    }

    /**
     * Helper to verify a password against a stored hash
     * 
     * @param string $password The plain text password
     * @param string $hash The hashed password from the DB
     * @return bool
     */
    public function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
