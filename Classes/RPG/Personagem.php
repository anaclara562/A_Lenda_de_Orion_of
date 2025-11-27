<?php

namespace app\Http\classes\RPG;

abstract class Personagens {
    protected string $nome;
    protected int $vida;
    protected int $forca;

    public function __construct(string $nome, int $vida, int $forca)
    {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->forca = $forca;
    }

    abstract public function atacar(): void;

    public function ReceberDano(int $dano): string
    {
        $this->vida -= $dano;
        if ($this->vida <= 0) {
            return "O personagem {$this->nome} foi derrotado";
        }
        return "O personagem {$this->nome} recebeu {$dano} de dano. <br>Vida atual: {$this->vida}.";
    }
}