<?php

namespace app\Http\Controllers;

    use app\Http\Classes\RPG\Jogador;
    use app\Http\Classes\RPG\Arma;
    use app\Http\Classes\RPG\Monstro;
use Facade\FlareClient\View;

class RPGController extends Controller
{
    public function simularCombate(): View
    {
        $heroi = new Jogador('Fada Bella', 200, 30);
        //$cajador = new Arma(nome: 'Varinha Mágico', peso: 5.0, danoAdicional: 50);
        //$orc = new Monstro('Troll Maligno', 60, 10, 'troll', 25);
        //$heroi->equiparItem($cajado);

        $resultado = $heroi->atacar();
        $dano_monstro = 70;
        $resultado_dano = $orc->receberDano($dano_Monstro);
        $solta_item = $orc->soltarItem();
        
        return view(view: 'combate', data: [
            'heroi_nome' => $heroi-getNome(),
            'status_ataque' => $resultado,
            'status_orc' => $resultado_dano,
            'status_loot' => $solta_item
]);
    }
}
    

    

