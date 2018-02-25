<?php

namespace Application\Model;

class Player
{
    public $idplayer;
    public $idgame;
    public $nome;
    public $kills;
    
    public function exchangeArray(array $data)
    {
        $this->idplayer = (!empty($data['idplayer'])) ? $data['idplayer'] : null;
        $this->idgame   = (!empty($data['idgame'])) ? $data['idgame'] : null;
        $this->nome     = (!empty($data['nome'])) ? $data['nome'] : null;
        $this->kills    = (!empty($data['kills'])) ? $data['kills'] : 0;        
    }

}