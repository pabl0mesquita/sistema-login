<?php

namespace  Source\App;

use Source\Core\Controller;
use Source\Model\User;
use Source\Model\Auth;

class Web extends  Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/".CONF_VIEW_THEME);
    }

    /**
     * home
     * @return void
     */
    public function index(): void
    {
        $users = (new User())->find()->fetch(true);

        echo $this->view->render('login', [
            "head" => "Titulo"
        ]);
    }


    /**
     * @return void
     */
    public function login(array $data): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $mail = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $password = filter_var($data["password"], FILTER_DEFAULT);

        //Auth
        $auth = new Auth();
        if(!$auth->login($mail, $password)){
            $json["message"] = $auth->message()->render();
            echo json_encode($json);
            return;
        }

        $json["message"] = "Dados enviado com sucesso!";
        $json["data"] = $data;
        echo json_encode($json);
    }

    /**
     * error
     * @param array $data
     * @return void
     */
    public function error(array $data): void
    {
        //var_dump($data);
    }
}