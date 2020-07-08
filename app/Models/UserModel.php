<?php namespace App\Models;
use CodeIgniter\Model;
class Usermodel extends Model
{
    protected $table = 'user';
    
    public function getData($email, $password)
    {
        
        return $this->db->table("user")
        ->where(array('user_email' => $email, 'password' => $password))
        ->get()->getRowArray();
    }
    
}