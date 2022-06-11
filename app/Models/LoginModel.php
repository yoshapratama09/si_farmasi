<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'employee';
    protected $primaryKey = 'employee_id';
    protected $allowedFields = ['employee_name', 'employee_dob', 'employee_gender', 'employee_address', 'employee_phone', 'employee_email', 'employee_type', 'employee_departemen',];
    protected $useTimestamps = true;

    
}
