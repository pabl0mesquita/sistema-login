<?php

namespace Source\Model;
use Source\Core\Model;
use Source\Core\Session;
use Source\Model\User;
use Source\Core\View;

/**
 * [ Class Auth ]
 * @author Pablo O. Mesquita <pablo_omesquita@hotmail.com>
 * @package Source\Model
 */
class Auth extends Model
{
    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct("users",['id'],['email', 'password']);
    }

    /**
     * @return User|null
     */
    public static function user(): ?User
    {
        $session = new Session();
        if(!$session->has('authUser')){
            return null;
        }

        return (new User())->findById($session->authUser);
    }

    /**
     * @param string $email
     * @param string $password
     * @return null|User
     */
    public function attempt(string $email, string $password): ?User
    {
        $user = (new User())->findByEmail($email);

        if(!$user){
            $this->message->error("Não encontramos registro com esses dados em nossa base.");
            return null;
        }

        if(!passwd_verify($password, $user->password)){
            $this->message->error('Não encontramos registro com esses dados em nossa base.');
            return null;
        }

        if($user->status != "confirmed"){
            $this->message->info("Você precisa confirmar o cadatro no email que lhe foi enviado.");
            return null;
        }

        if(passwd_rehash($user->password)){
            $user->password = $password;
            $user->save();
        }

        return $user;

    }

    /**
     * login
     * @param string $email
     * @param string $password
     * @param bool $save
     * @return bool
     */
    public function login(string $email, string $password)
    {
        $user = $this->attempt($email, $password);

        if(!$user){
            return false;
        }

        //LOGIN
        (new Session())->set("authUser", $user->id);
        return true;

    }

    public function register(User $user): bool
    {
        //tenta registrar usuário, caso não consiga, retorna erro do user
        if(!$user->save()){
            $this->message = $user->message;
            return false;
        }

        /** carrega pasta do email */
        $view = new View(__DIR__."/../../shared/views/email");
        /** retorna html passando parâmetros para a view */
        $message = $view->render("confirm", [
            "first_name" => $user->first_name,
            "confirm_link" => url("/obrigado/".base64_encode($user->email))
        ]);

        echo $message;
        return true;

    }

    /**
     * logout
     * @return void
     */
    public function logout()
    {
        $session = new Session();
        $session->unset('authUser');
    }

}

