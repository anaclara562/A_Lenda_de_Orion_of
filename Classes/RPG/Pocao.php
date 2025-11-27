<?php

namespace App\Http\Classes\RPG;

use Exception;

class Pocao extends Itens
{
    private string $tipoEfeito;
    private int $potencia;
    private float $tempoDuracao;

    public function __construct(string $nome, float $peso, string $tipoEfeito, int $potencia, float $tempoDuracao)
    {
        parent::__construct($nome, $peso, Itens::TIPO_POCAO);

        $this->tipoEfeito = $tipoEfeito;
        $this->potencia = $potencia;
        $this->tempoDuracao = $tempoDuracao;
    }

    public function UsarItem(): string
    {
        return "Você usou a {$this->getName()} e o efeito foi: {$this->tipoEfeito} com potência de {$this->potencia} por {$this->tempoDuracao} minutos.";
    }

    public function misturar(Pocao $p): Pocao
    {
        if ($this->tipoEfeito !== $p->tipoEfeito) {
            throw new Exception("Não é possível misturar poções com efeitos diferentes!");
        }

        $novoNome = $this->getName() . " + " . $p->getName();

        $novoPeso = $this->getWeight() + $p->getWeight();

        $novaPotencia = $this->potencia + $p->potencia;

        $novoTempoDuracao = ($this->tempoDuracao + $p->tempoDuracao) / 2;

        $novoTipoEfeito = $this->tipoEfeito;

        return new Pocao($novoNome, $novoPeso, $novoTipoEfeito, $novaPotencia, $novoTempoDuracao);
    }

    // Métodos Getters
    public function getTipoEfeito(): string
    {
        return $this->tipoEfeito;
    }

    public function getPotencia(): int
    {
        return $this->potencia;
    }

    public function getTempoDuracao(): float
    {
        return $this->tempoDuracao;
    }
}