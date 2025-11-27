<?php

namespace App\Http\Classes\RPG;

use App\Http\Classes\RPG\Itens; 

class Arma extends Itens  
{
    private int $dano;
    private string $tipoArma;
    private float $alcance;

    public function __construct(string $nome, float $peso, int $dano, string $tipoArma, float $alcance)
    {
        parent::__construct($nome, $peso);
        $this->dano = $dano;
        $this->tipoArma = $tipoArma;
        $this->alcance = $alcance;
    }

    public function UsarItem(): string
    {
        return "Você usou a {$this->getName()} ({$this->tipoArma}) e causou {$this->dano} de dano! Alcance: {$this->alcance} metros.";
    }

    public function atacar(): int
    {
        return $this->dano; 
    }

    public function getDano(): int
    {
        return $this->dano;
    }

    public function getTipoArma(): string
    {
        return $this->tipoArma;
    }

    public function getAlcance(): float
    {
        return $this->alcance;
    }

    public function podeAtacar(float $distanciaOponente): bool
    {
        return $distanciaOponente <= $this->alcance;
    }
}