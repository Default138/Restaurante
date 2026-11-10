# Restaurante (BonaComida)

Exercício de **orientação a objetos em PHP**: um programa de terminal para registrar os pedidos de um restaurante.

## O que faz

Menu no terminal com as opções:

1. Cadastrar pedido (nome do cliente, nome do garçom e prato)
2. Cancelar pedido
3. Listar pedidos
4. Total de vendas
0. Sair

Os pedidos ficam em memória enquanto o programa está aberto (não há banco de dados).

## Estrutura

```text
BonaComida/execut.php          programa principal (menu e funções)
BonaComida/modelo/Prato.php    classe Prato (número, nome e valor)
BonaComida/modelo/Pedido.php   classe Pedido (cliente, garçom e prato)
```

## Como executar

Precisa do PHP instalado (o do XAMPP serve). No terminal, dentro desta pasta:

```bash
php BonaComida/execut.php
```

No Windows com XAMPP: `C:\xampp\php\php.exe BonaComida\execut.php`

## Conceitos praticados

Classes e objetos, atributos privados com getters e setters, composição (um `Pedido` tem um `Prato`) e funções que trabalham com listas de objetos.
