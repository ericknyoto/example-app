<?php

declare(strict_types=1);

use App\Services\CurrencyService;
use Tests\TestCase;

class LoadComboListCurrencyTest extends TestCase
{
    public function test_it_can_show_currency_as_combo_list(): void
    {
        // Act
        $combo = CurrencyService::getComboOptionList(true, 'EUR');

        // Assert
        $expected = '<option value="" >-- All Currency --</option><option value="DKK" >DKK</option><option value="EUR" selected>EUR</option><option value="USD" >USD</option>';
        $this->assertEquals($expected, $combo);
    }
}
