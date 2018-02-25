<?php


namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class PlayerTable
{
    private $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    /**
     * Busca todos os registros da tabela
     * @return array de objetos
     */
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
    
    /**
     * Gravação de registro
     * @param Player $player
     * @return int - id do registro
     */
    public function save(Player $player)
    {
        $data = [
            'idplayer'	=> $player->idplayer,
            'idgame'	=> $player->idgame,
            'nome'	    => $player->nome,
            'kills'	    => $player->kills,
        ];
        
        if($player->idplayer == NULL){
            return $this->tableGateway->insert($data);
        }else{
            $this->tableGateway->update($data, ["idplayer" => $player->idplayer]);
            return $player->idplayer;
        }
    }
    
    /**
     * Busca de registro individual
     * @param int $id
     * @return object
     */
    public function find($id)
    {
        
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('idplayer' => $id));
        $row = $rowset->current();
        
        return $row;
    }
    
    /**
     * Remoção de registro
     * @param int $id
     */
    public function delete($id)
    {
        $this->tableGateway->update(['sit' => false],['idplayer' => (int)$id]);
    }
}