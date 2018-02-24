<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function task1Action()
    {
        // abro o arquivo para leitura
        $fp = fopen('public/arquivos/games.log', 'r');
        
        // laço para percorrer todo o arquivo
        $i=0;
        $arrayGames = [];
        $totalKills = 0;
        $players    = [];
        $kills      = [];
        
        $val = 0;
        
        while(!feof($fp)) {
            // leio linha por linha
            $linha = fgets($fp, 4096);
            
            // separo a linha (string) em um array, para facilitar a manipulacao
            $linhaArr = explode(" ", trim($linha));
                        
            if($linhaArr[1] == 'InitGame:'){ // verifico se eh inicio de jogo
                
                if($val == 0){ // validacao para saltar o primeiro InitGame e permitir a contagem, e só após registrar o game. 
                    $val=1;
                }else{
                    $i++;
                    $gameAtual = "game_".$i;
                    
                    $arrayGames[$gameAtual] = [
                        'total_kills'   => $totalKills,
                        'players'       => $players,
                        'kills'         => $kills,
                    ];
                    
                    $totalKills = 0;
                    $players    = [];
                    $kills      = [];
                }
                
            }else if($linhaArr[1] == 'Kill:'){ // verifico se eh kill
                                
                $j++;
                                
                //incrimento o total de kills
                $totalKills++;
                
                $result = $this->retiraPlayers($linha);
                
                // checo se o player está no array
                if (!in_array($result['player1'], $players) and $result['player1'] != '<world>') {
                    $players[] = $result['player1'];                    
                }                
                
                // checo se o player está no array
                if (!in_array($result['player2'], $players) and $result['player2'] != '<world>') {
                    $players[] = $result['player2'];
                }
                    
                // checo se o player1 está no array
                if($result['player1'] != $result['player2'] and $result['player1'] != '<world>'){
                    if (!array_key_exists($result['player1'], $kills)) {
                        $kills[$result['player1']] = 1;
                    }else{
                        $kills[$result['player1']] = $kills[$result['player1']] + 1;
                    }
                }
                
                // checo se o player2 está no array. Se não, ele só morreu na partida, logo acresento com o kills
                if (!array_key_exists($result['player2'], $kills)) {
                    $kills[$result['player2']] = 0;
                }
                
                // verifico se foi o player world
                if($result['player1'] == '<world>' || $result['player1'] == $result['player2']){
                    // checo se o player está no array
                    if (!array_key_exists($result['player2'], $kills)) {
                        $kills[$result['player2']] = -1;
                    }else{
                        $kills[$result['player2']] = $kills[$result['player2']] - 1;
                    }
                }
            }
            
        }
        
        fclose($fp);
        
        /*envio para view para ser exibido na tela
         Porém, podemos exetar várias ações aqui, como gravar em arquivo ou gravar no banco de dados         
         */
        return new ViewModel(['data' => $arrayGames]);
        
        
        
    }
    
    public function task3Action()
    {
        
        
        
        return $this->response;
    }
    
    /**
     * Função para extrair os players dentro da string
     * @param string $string
     * @return array
     */
    function retiraPlayers($string=null){
        if($string){
            $stringArr = explode("killed", $string);
            
            $player1 = explode(":", $stringArr[0]);
            $player2 = explode("by", $stringArr[1]);
            
            return [
                'player1' => trim(end($player1)),
                'player2' => trim($player2[0]),
            ];
        }                
    }
}
