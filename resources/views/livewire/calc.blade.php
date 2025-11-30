<?php

use function Livewire\Volt\{state, mount};

state(['num1', 'operator', 'num2', 'symbol', 'result']);

mount(function ($num1, $operator, $num2) {
    $this->num1 = $num1;
    $this->operator = $operator;
    $this->num2 = $num2;

    switch ($this->operator) {
        case 'addition':
            $this->symbol = '+';
            $this->result = $this->num1 + $this->num2;
            break;

        case 'subtraction':
            $this->symbol = '-';
            $this->result = $this->num1 - $this->num2;
            break;

        case 'multiplication':
            $this->symbol = '×';
            $this->result = $this->num1 * $this->num2;
            break;

        case 'division':
            $this->symbol = '÷';

            if ($this->num2 == 0) {
                $this->result = '0 で割ることはできません';
            } else {
                $this->result = $this->num1 / $this->num2;
            }
            break;

        default:
            $this->symbol = '?';
            $this->result = '無効な演算子です';
            break;
    }
});

?>

<div>
    <h1>計算結果</h1>
    {{ $num1 }} {{ $symbol }} {{ $num2 }} = {{ $result }}
</div>
