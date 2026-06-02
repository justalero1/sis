<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'student_number',
        'first_name',
        'last_name',
        'email',
        'course'
    ];

    protected $useTimestamps = false; // since created_at is DB default
}