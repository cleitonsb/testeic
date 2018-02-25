<?php


namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Expression;

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
    public function fetchAll($player=null)
    {
        
        $where = ($player) ? 'nome like "%'.$player.'%"' : 'idplayer > 0';
        
        $sql = $this->tableGateway->getSql();
        $select = $sql->select();
        $select->columns(array('nome', 'kills' => new Expression('SUM(kills)')))
               ->group('nome')
               ->order('kills desc')
               ->where($where);
        
        return $results = $this->tableGateway->selectWith($select);   
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
     * Remoção de todos os registro
     */
    public function delete()
    {
        $this->tableGateway->delete("idplayer > 0");
    }
}