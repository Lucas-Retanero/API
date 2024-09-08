<?php
namespace Api\Backend\Controller;
class UserController {

    public function getUsers(){
        return [
            ['nome'=> 'Lucas', 'idade'=> '19'],
            ['nome'=> 'G Castro', 'idade'=> '18'],
        ];
    }

    public function insertUser($x){
        return $x[1]["idade"] +5;
    }

     //Adicionar 5 na idade

    public function putUser($x){
        return $x[1]["idade"] +10;
    }

    //Adicionar 5 na idade

    public function deleteUser($x){
        return $x[1]["idade"] -5;
    }

   //remover 5 da idade
}