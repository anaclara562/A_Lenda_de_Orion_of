<?php

namespace app\Http\classes\RPG;

abstract class Itens {
    const TIPO_POCAO = 'Poção';
    const TIPO_ARMA = 'Arma';

    protected string $nome;
    protected float $peso;
    protected string $tipo;

    public function __construct(string $nome, float $peso, string $tipo)
    {
        //if (!in_array($tipo, [self::TIPO_POCAO, self::TIPO_ARMA])) {
       //     throw new \InvalidArgumentException("Tipo de item inválido: {$tipo}");
        

        $this->nome = $nome;
        $this->peso = $peso;
        $this->tipo = $tipo;
    }

    public function getName(): string
    {
        return $this->nome;
    }

    public function getWeight(): float
    {
        return $this->peso;
    }

    public function getType(): string
    {
        return $this->tipo;
    }

    abstract public function UsarItem(): string;
}