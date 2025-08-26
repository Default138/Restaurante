<?php

class Prato
{

    private int $numero;
    private string $nome;
    private float $valor;
    
    public function __construct($numero, $nome, $valor)
    {
        $this->numero = $numero;
        $this->nome = $nome;
        $this->valor = $valor;
    }


    /**
     * Get the value of nuemro
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * Set the value of nuemro
     */
    public function setNumero(int $nuemro): self
    {
        $this->numero = $nuemro;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     */
    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}
