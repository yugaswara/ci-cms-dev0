<?php

class Account extends AdminController
{
    function Account()
    {
        parent::AdminController();

        if(!$this->authentication->logged_in())
     		redirect('admin/login/', 'refresh');


        $this->smarty->assign(array(
                'BASE_PATH' => BASE_PATH,
                'IMG_PATH' => IMG_PATH,
                'IMG_SRC' => IMG_SRC,
                'IMG_ID_PATH' => IMG_ID_PATH,
                'CSS_PATH' => CSS_PATH,
                'JS_PATH' => JS_PATH,
                'ADMIN_PATH' => ADMIN_PATH,
                'RIGHT_SIDEBAR' => 'rightsidebar.html',
                'home_menu' => 'menu1',
                'static_content_menu' => 'menu1',
                'news_menu' => 'menu1',
                'hosting_menu' => 'menu1',
                'domain_menu' => 'menu1')
        );
        $this->smarty->assign('PAGETITLE' ,WEB_TITLE . ' ACCOUNT');

    }

    function index()
    {
        $this->password();
    }

    function password()
    {
        $this->smarty->append("JS",JS_PATH."jquery/jquery.validate.min.js");
        $this->smarty->append('InlineJS', '$(document).ready(function(){
                $("#form").validate({
                rules: {
                    new_password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        equalTo: "#new_password"
                    },
                },
                messages: {
                    new_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        equalTo: "Please enter the same password as above"
                    },

                },
                errorLabelContainer: $("td#error"),
                    wrapper: "li"

                });
            })');
        $this->smarty->display('pages/password.html');
    }

    function change_password()
    {
         $fields = array (
            'password'         => md5($this->input->post('new_password'))
        );
        $this->db->update('users', $fields);
        $this->smarty->display('pages/congratulation.html');
    }
}