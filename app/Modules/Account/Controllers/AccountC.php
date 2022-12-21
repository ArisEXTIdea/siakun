<?php
namespace App\Modules\Account\Controllers;
use App\Controllers\BaseController;
use App\Modules\Account\Models\AccountM;

class AccountC extends BaseController{

    protected $AccountM;
    protected $viewPath;

    public function __construct()
    {
        $this->AccountM = new AccountM;
        $this->viewPath = '\App\Modules\Account\Views';
        $this->session = \Config\Services::session();
    }


    // -------------- RENDER SECTION -------------------------- //

    public function render_register(){

        $renderData = [
            'title' => 'Tambah User Baru | SIAKUN',
        ];


        return view($this->viewPath . '/form_add', $renderData);
    }

    public function render_dashboard(){

        $userData = $this->AccountM->get_all_user_data();

        $renderData = [
            'title' => 'Dashboard | SIAKUN',
            'userData' => $userData
        ];


        return view($this->viewPath . '/dashboard', $renderData);
    }

    public function render_detail(){

        $url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
        $uid = $url[0];

        $userData = $this->AccountM->get_data_user($uid);

        $renderData = [
            'title' => 'Detail Akun | SIAKUN',
            'userData' => $userData[0]
        ];


        return view($this->viewPath . '/user_detail', $renderData);
    }

    public function render_edit_akun(){

        $url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
        $uid = $url[0];

        $userData = $this->AccountM->get_data_user($uid);

        $renderData = [
            'title' => 'Detail Akun | SIAKUN',
            'userData' => $userData[0]
        ];


        return view($this->viewPath . '/form_edit', $renderData);
    }

    // -------------- FUNC SECTION -------------------------- //

    public function save_data_user(){

        $file = $this->request->getFile('image');
        $fileName =  $file->getRandomName();
        $file->store('../../public/assets/uploads', $fileName);

        $postData = [
            'uid' => 'uid-' . uniqid(),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'address' => $this->request->getVar('address'),
            'gender' => $this->request->getVar('gender'),
            'level' => $this->request->getVar('level'),
            'image' => $fileName,
        ];

        $this->session->setFlashdata('alert', 'active');

        if(!$this->AccountM->save_data_user($postData)){
            $this->session->setFlashdata('alert-success', 'active');
        } else {
            $this->session->setFlashdata('alert-fail', 'active');

        }

        return redirect()->to('/register');
    }

    public function edit_data_user(){

        $uid = $this->request->getVar('uid');

        $putData = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'address' => $this->request->getVar('address'),
            'gender' => $this->request->getVar('gender'),
            'level' => $this->request->getVar('level'),
        ];

        $this->session->setFlashdata('alert', 'active');

        if(!$this->AccountM->edit_data_user($putData, $uid)){
            $this->session->setFlashdata('alert-success', 'active');
        } else {
            $this->session->setFlashdata('alert-fail', 'active');

        }

        return redirect()->to('/detail-akun' . '/' . $uid);
    }

    public function delete_data_user(){

        $url = array_reverse(explode('/', $_SERVER['PHP_SELF']));
        $uid = $url[0];

        $ud = $this->AccountM->get_data_user($uid);
        $userData = $ud[0];

        $this->session->setFlashdata('alert', 'active');

        if(!$this->AccountM->delete_data_user($uid)){
            $this->session->setFlashdata('alert-success', 'active');
            unlink('assets/uploads/' . $userData['image']);
        } else {
            $this->session->setFlashdata('alert-fail', 'active');

        }

        return redirect()->to('/');
    }

}