<?php

namespace Application\Model;

class Game
{
    public $idgame;
    public $descricao;
    
    public function exchangeArray(array $data)
    {
        $this->idgame       = (!empty($data['idgame'])) ? $data['idgame'] : null;
        $this->descricao    = (!empty($data['descricao'])) ? $data['descricao'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'idgame'      => $this->idgame,
            'descricao'   => $this->descricao,            
        ];
    }

}