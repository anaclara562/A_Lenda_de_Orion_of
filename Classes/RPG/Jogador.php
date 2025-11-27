<?php

namespace app\Http\classes\RPG;

use app\Http\classes\RPG\Personagens;

abstract class Jogador extends Personagens {
    protected int $experiencia;
    protected array $inventario = [];
    protected int $nivel;

    public function __construct(string $nome, int $vida, int $forca)
    {
        parent::__construct($nome, $vida, $forca);
        $this->experiencia = 0;
        $this->nivel = 1;
    }

    public function GanharExperiencia(int $experiencia): string
    {
        $this->experiencia += $experiencia;
        return "{$this->nome} ganhou {$experiencia} de experiência.";
    }

    public function SubirNivel(): string
    {
        $nivelNecessario = 500 * $this->nivel;
        while ($this->experiencia >= $nivelNecessario) {
            $this->nivel++;
            $this->experiencia -= $nivelNecessario;
            $nivelNecessario = 500 * $this->nivel;
        }
        return "{$this->nome} subiu para o nível {$this->nivel}!";
    }

    public function equiparItem(Itens $item): string
    {
        if (in_array($item, $this->inventario, true)) {
            return "{$this->nome} equipou {$item->getName()}!";
        } else {
            return "{$this->nome} não tem {$item->getName()} no inventário!";
        }
    }

    public function adicionarItem(Itens $item): string
    {
        $this->inventario[] = $item;
        return "{$this->nome} adicionou {$item->getName()} ao inventário.";
    }
}   