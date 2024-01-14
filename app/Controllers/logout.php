<?php

namespace App\Controllers;

class logout extends BaseController
{
    public function confirmLogout()
    {
        return view('confirm_logout');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}
