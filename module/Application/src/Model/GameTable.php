<?php


namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class GameTable
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
     * @param Game $game
     * @return int - id do registro
     */
    public function save(Game $game)
    {
        $data = [
            'idgame'	=> $game->idgame,
            'descricao'	=> $game->descricao,            
        ];
        
        if($game->idgame == NULL){
            $this->tableGateway->insert($data);
            return $this->tableGateway->lastInsertValue;
        }else{
            $this->tableGateway->update($data, ["idgame" => $game->idgame]);
            return $game->idgame;
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
        $rowset = $this->tableGateway->select(array('idgame' => $id));
        $row = $rowset->current();
        
        return $row;
    }
    
    /**
     * Remoção de registro
     * @param int $id
     */
    public function delete($id)
    {
        $this->tableGateway->update(['sit' => false],['idgame' => (int)$id]);
    }
}