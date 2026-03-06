<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class JobPosting extends Model
{
    /**
     * Create a new job posting.
     */
    public function create($data)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO job_postings (posted_by_user_id, service_category, title, description, address, budget_range) 
             VALUES (:posted_by, :category, :title, :description, :address, :budget)"
        );

        return $stmt->execute([
            'posted_by' => $data['posted_by_user_id'],
            'category' => $data['service_category'],
            'title' => $data['title'],
            'description' => $data['description'],
            'address' => $data['address'],
            'budget' => $data['budget_range'] ?? null
        ]);
    }

    /**
     * Get all currently open jobs.
     */
    public function getOpenJobs()
    {
        $stmt = $this->db->query(
            "SELECT j.*, u.first_name, u.last_name 
             FROM job_postings j
             JOIN users u ON j.posted_by_user_id = u.id
             WHERE j.status = 'open'
             ORDER BY j.created_at DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get a specific job by its ID.
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT j.*, u.first_name, u.last_name 
             FROM job_postings j
             JOIN users u ON j.posted_by_user_id = u.id
             WHERE j.id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get all jobs posted by a specific user.
     */
    public function getJobsByUser($userId)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM job_postings 
             WHERE posted_by_user_id = :user_id 
             ORDER BY created_at DESC"
        );
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
