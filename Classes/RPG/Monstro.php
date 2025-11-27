<?php

namespace app\Http\classes\RPG;

use app\Http\classes\RPG\Personagens;

abstract class Monstro extends Personagens
{
    private string $tipo;
    private int $recompensa;
    private bool $dropRaro;
    private int $experiencia;
    private array $lootTable = []; 

    public function __construct(string $nome, int $vida, int $forca, string $tipo, int $recompensa, bool $dropRaro, array $lootTable = [])
    {
        parent::__construct($nome, $vida, $forca);

        $this->tipo = $tipo;
        $this->recompensa = $recompensa;
        $this->dropRaro = $dropRaro;
        $this->lootTable = $lootTable; 
    }

    public function soltarItem(int $experiencia): string
    {
        $this->experiencia = $experiencia;
        return "{$this->nome} ganhou {$experiencia} de experiência.";
    }

    public function rugir(): string
    {
        $dano = $this->forca * 2;
        return "{$this->nome} atacou e causou {$dano} de dano.";
    }

    private function dropItens(string $tipo): array
    {
        if (empty($this->lootTable)) {
            return [];
        }

        $itensDropados = [];
        foreach ($this->lootTable as $drop) {
            if (isset($drop[$tipo])) {
                $item = $drop[$tipo];
                $chance = $drop['drop']; 
                $sorteio = rand(1, 100); 
                if ($sorteio <= $chance) {
                    $itensDropados[] = $item;
                }
            }
        }
        return $itensDropados;
    }

    public function dropPotions(): array
    {
        return $this->dropItens('Poção');
    }
}