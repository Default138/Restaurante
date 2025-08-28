<?php

require_once("modelo/Prato.php");
require_once("modelo/Pedido.php");

//Funcao pra lista os pedido
function listarPedidos($pedidos) {
    if(count($pedidos) > 0) {
        foreach($pedidos as $i => $pedido) {
            $prato = $pedido->getPrato();
            printf("%d- Cliente: %s | Garçom: %s | Prato: %s | Valor: R$ %.2f\n", 
                $i+1, $pedido->getNomeCliente(), $pedido->getNomeGarcom(),
                $prato->getNome(), $prato->getValor());
        }
    } else {
        echo "Nenhum pedido cadastrado.\n";
    }
}

//Funcao para calcular o valor do pedido
function calcularTotalVendas($pedidos) {
    $total = 0;
    foreach($pedidos as $pedido) {
        $total += $pedido->getPrato()->getValor();
    }
    return $total;
}

//Funcao pra retorna prato por n
function retornaPrato($pratos, $numero) {
    foreach($pratos as $prato) {
        if($numero == $prato->getNumero())
            return $prato;
    }
    return null;
}

//Array dos pratin
$pratos = array(
    new Prato(1, "Camarão à Milanesa", 110.00),
    new Prato(2, "Pizza Margherita", 80.00),
    new Prato(3, "Macarrão à Carbonara", 60.00),
    new Prato(4, "Bife à Parmegiana", 75.00),
    new Prato(5, "Risoto ao Funghi", 70.00)
);

$pedidos = array();

//Menu
do {
    echo "\n\n------ RESTAURANTE BONA COMIDA ------\n";
    echo "1- Cadastrar pedido\n";
    echo "2- Cancelar pedido\n";
    echo "3- Listar pedidos\n";
    echo "4- Total de vendas\n";
    echo "0- Sair\n";
    $opcao = readline("Informe a opção: ");

    echo "\n";

    switch($opcao) {
        case 1: //Cadastra pedido
            $pedido = new Pedido();
            $pedido->setNomeCliente(readline("Nome do cliente: "));
            $pedido->setNomeGarcom(readline("Nome do garçom: "));
            
            $prato = null;
            while($prato == null) {
                echo "\nPratos disponíveis: \n";
                foreach($pratos as $p)
                    printf("%d- %s | R$ %.2f\n", $p->getNumero(), $p->getNome(), $p->getValor());
                
                $numeroPrato = (int) readline("Informe o número do prato (1-5): ");
                $prato = retornaPrato($pratos, $numeroPrato);
                
                if($prato == null)
                    echo "Tem esse prato não Tenta de novo.\n";
            }
            $pedido->setPrato($prato);

            array_push($pedidos, $pedido);
            echo "Teu pedido tá cadastrado\n";
            break;

        case 2: //Cancela pedido
            listarPedidos($pedidos);
            if(count($pedidos) > 0) {
                $idx = (int) readline("Informe o índice do pedido para cancelar: ");
                if($idx > 0 && $idx <= count($pedidos)) {
                    array_splice($pedidos, $idx-1, 1);
                    echo "Pedido cancelado\n";
                } else {
                    echo "Índice inválido!\n";
                }
            }
            break;

        case 3: //Lista pedido
            if(count($pedidos) > 0) {
                echo "Lista de pedidos:\n";
                foreach($pedidos as $pedido) {
                    $prato = $pedido->getPrato();
                    printf("O cliente %s, foi atendido pelo garçom %s, pediu um prato de %s no valor de R$ %.2f.\n",
                        $pedido->getNomeCliente(), $pedido->getNomeGarcom(),
                        $prato->getNome(), $prato->getValor());
                }
            } else {
                echo "Nenhum pedido cadastrado.\n";
            }
            break;

        case 4: //Calcula
            $total = calcularTotalVendas($pedidos);
            printf("Total de vendas: R$ %.2f\n", $total);
            break;

        case 0: //Encerra
            echo "Programa morreu.\n";
            break;

        default: //Erro
            echo "Tem essa opção não mano\n";
    }

} while($opcao != 0);
