<?php

declare(strict_types=1);

namespace App\Services;

use App\ValueObjects\Currency;

class CurrencyService
{
    public static function getComboOptionList(
        $show_value_as_text = false,
        $selected_value = '',
        $text_for_empty_value = '-- All Currency --'
    )
    {
        $options = [];
        if ($text_for_empty_value != '') {
            $options[''] = $text_for_empty_value;
        }

        $currencies = Currency::getAllCurrencies();
        foreach ($currencies as $currency => $currency_text) {
            $options[$currency] = $show_value_as_text ? $currency : $currency_text;
        }

        return self::loadComboListFromArray(
            $options,
            null,
            $selected_value
        );
    }

    public static function loadComboListFromArray(
        $array,
        $selected_text = null,
        $selected_id = null,
        $sorted = true,
        $array_group = []
    ) {
        $str = '';
        if ($sorted) {
            natcasesort($array);
            $array_group_keys = array_keys($array_group);
            foreach ($array_group_keys as $array_group_key) {
                natcasesort($array_group[$array_group_key]);
            }
        }
        if (count($array) > 0 || count($array_group) > 0) {
            if (count($array) > 0) {
                foreach ($array as $value => $text) {
                    $selected = $disabled = '';
                    if (self::startsWith($text, '------')) {
                        $disabled = ' disabled';
                    }
                    $str .= '<option value="'.$value.'" ';
                    if (!is_null($selected_text)) {
                        if ("$selected_text" == "$text" || "$selected_text" == '*') {
                            $selected = 'selected';
                        }
                    }
                    if (!is_null($selected_id)) {
                        if ("$selected_id" == "$value" || "$selected_text" == '*') {
                            $selected = 'selected';
                        }
                    }
                    $str .= $selected.$disabled;
                    $str .= '>'.$text.'</option>';
                }
            }
            if (count($array_group) > 0) {
                foreach ($array_group as $group_label => $group_values) {
                    $str .= '<optgroup label="'.$group_label.'">';
                    foreach ($group_values as $group_value => $group_text) {
                        $selected = '';
                        $str .= '<option value="'.$group_value.'" ';
                        if (!is_null($selected_text)) {
                            if ($selected_text == $group_text) {
                                $selected = 'selected="selected"';
                            }
                        }
                        if (!is_null($selected_id)) {
                            if ($selected_id == $group_value) {
                                $selected = 'selected="selected"';
                            }
                        }
                        $str .= $selected;
                        $str .= '>'.$group_text.'</option>';
                    }
                    $str .= '</optgroup>';
                }
            }
        } else {
            $str = '<option value="">No Data Available to Show</option>';
        }
        return $str;
    }

    public static function startsWith($haystack, $needle, $case = false)
    {
        // search backwards starting from haystack length characters from the end
        $len = strlen($needle);
        if ($len == 0) {
            return true;
        } else {
            if ($case) {
                return substr($haystack, 0, $len) === $needle;
            } else {
                return strcasecmp(substr($haystack, 0, $len), $needle) === 0;
            }
        }
    }
}
