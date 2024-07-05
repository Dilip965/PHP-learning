<?php

function manageFoodOrder($action, $item = null, $quantity = 1) {
    static $order = [];
    static $menu = [
        "Burger" => 5.00,
        "Pizza" => 8.00,
        "Pasta" => 7.00,
        "Salad" => 4.00,
        "Soda" => 2.00
    ];

    switch ($action) {
        case 'add':
            if (array_key_exists($item, $menu)) {
                if (isset($order[$item])) {
                    $order[$item] += $quantity;
                } else {
                    $order[$item] = $quantity;
                }
                echo "$quantity $item(s) added to your order.<br>";
            } else {
                echo "Item not on the menu.<br>";
            }
            break;

        case 'remove':
            if (isset($order[$item])) {
                if ($order[$item] > $quantity) {
                    $order[$item] -= $quantity;
                    echo "$quantity $item(s) removed from your order.<br>";
                } else {
                    unset($order[$item]);
                    echo "All $item(s) removed from your order.<br>";
                }
            } else {
                echo "Item not in your order.<br>";
            }
            break;

        case 'total':
            $total = 0;
            foreach ($order as $item => $quantity) {
                $total += $menu[$item] * $quantity;
            }
            echo "Your total is: $" . number_format($total, 2) . "<br>";
            break;

        case 'summary':
            echo "Order Summary:<br>";
            foreach ($order as $item => $quantity) {
                echo "$item: $quantity<br>";
            }
            break;

        default:
            echo "Invalid action.<br>";
    }
}

// Example usage:



manageFoodOrder()
?>
