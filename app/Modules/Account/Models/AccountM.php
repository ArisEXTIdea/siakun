<?php 

namespace App\Modules\Account\Models;

use CodeIgniter\Model;

class AccountM extends Model{
    protected $table = 'users';
    protected $allowedFields = [
        'uid',
        'name',
        'email',
        'password',
        'address',
        'gender',
        'level',
        'image'
    ];


    public function save_data_user($data){
        $this->insert($data);
    }

    public function get_all_user_data(){
        return $this->findAll();
    }

    public function get_data_user($uid){
        $this->where('uid', $uid);
        return $this->find();
    }

    public function delete_data_user($uid){
       $this->where('uid', $uid);
       $this->delete(); 
    }


    public function edit_data_user($data, $uid){
        $this->set('name', $data['name']);
        $this->set('email', $data['email']);
        $this->set('password', $data['password']);
        $this->set('address', $data['address']);
        $this->set('gender', $data['gender']);
        $this->set('level', $data['level']);
        $this->where('uid', $uid);
        $this->update(); 
     }
     public function edit_data_user_gambar($data, $uid){
        $this->set('image', $data['image']);
        $this->where('uid', $uid);
        $this->update(); 
     }
}
