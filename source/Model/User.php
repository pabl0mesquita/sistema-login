<?php

namespace Source\Model;

use Source\Core\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct('users', ['id'], ['email']);
    }

    /**
     * @param string $email
     * @return array|mixed|Model|null
     */
    public function findByEmail(string $email)
    {
        $find = $this->find("email= :mail","mail={$email}");
        return $find->fetch();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Preencha todos os campos para continuar");
            return false;
        }

        /** Update */
        if (!empty($this->id)) {
            $id = $this->id;
            $this->update($this->safe(), "id = :id", "id={$id}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Create */
        if (empty($this->id)) {

            if ($this->password != $this->repassword){
                $this->message->warning("As senhas não conferem. Por favor digite novamente.");
                return false;
            }
            unset($this->repassword);
            $this->password = passwd($this->password);
            $id = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = $this->findById($id)->data();
        return true;
    }
}

