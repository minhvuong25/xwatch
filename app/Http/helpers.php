<?php

if (!function_exists('pd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function pd()
    {
        echo '<pre>';
        array_map(function ($x) {
            print_r($x);
        }, func_get_args());
        echo '</pre>';
        die(1);
    }
}

if (!function_exists('pr')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function pr()
    {
        echo '<pre>';
        array_map(function ($x) {
            print_r($x);
        }, func_get_args());
        echo '</pre>';
    }
}

if (!function_exists('limit_text')) {

    /**
     * @param $text
     * @param $limit
     * @return string
     */
    function limit_text($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}


if (!function_exists('html_generate')) {

    /**
     * @param $name
     * @param $frontend_input
     * @param $frontend_label
     * @param $options
     * @return string
     */
    function html_generate($name, $frontend_input, $frontend_label, $value = null, $options = [])
    {
        $html = "<div class='form-group'>";
        $html .= "<label>" . $frontend_label . ":</label>";

        if ($frontend_input == \App\Models\EAVAttribute::FRONTEND_INPUT_TYPE_TEXT)
            $html .= '<input class="form-control" type="text" name="' . $name . '" value="' . $value . '">';

        if ($frontend_input == \App\Models\EAVAttribute::FRONTEND_INPUT_TYPE_SELECT) {
            $html .= '<select class="form-control" name="' . $name . '">';

            foreach ($options as $key => $option) {
                $html .= '<option value="' . $key . '">';
                $html .= $option;
                $html .= '</option>';
            }

            $html .= '</select>';
        }

        if ($frontend_input == \App\Models\EAVAttribute::FRONTEND_INPUT_TYPE_TEXTAREA)
            $html .= '<textarea class="form-control" name="' . $name . '"></textarea>';

        $html .= "</div>";

        return $html;
    }
}

if (!function_exists('price')) {
    function price($value)
    {
        return number_format($value, 0, ",", ".");
    }
}

if (!function_exists('phone')) {
    function phone($phone)
    {
        if (preg_match('/^(\d{4})(\d{3})([\d]+)$/', $phone, $matches)) {
            $result = $matches[1] . '.' . $matches[2] . '.' . $matches[3];
            return $result;
        }
        return $phone;
    }
}

if (!function_exists('isNem')) {
    function isNem($id)
    {
        $cat = "28/31/34/39/73/74/75/76/77/80/81/82/83/84/85/86/87/88/89/90/91/92/93/94/95/96/97/98/99/100/110/111/123/124/125/126/127/128/129/130/131/132/133";
        $cat_arr = explode('/', $cat);
        return in_array($id, $cat_arr);
    }
}

if (!function_exists('phone_validate')) {
    function phone_validate($phone)
    {
        $prefixHeaderNumbers = '086|096|097|087|088|';
        $prefixHeaderNumbers .= '098|032|033|';
        $prefixHeaderNumbers .= '034|035|036|';
        $prefixHeaderNumbers .= '037|038|039|';
        $prefixHeaderNumbers .= '089|090|093|';
        $prefixHeaderNumbers .= '070|079|077|';
        $prefixHeaderNumbers .= '076|078|091|';
        $prefixHeaderNumbers .= '094|088|083|';
        $prefixHeaderNumbers .= '084|085|081|082|';
        $prefixHeaderNumbers .= '092|058';

        $phone = preg_replace('/^\+84/', '', $phone);

        if (!preg_match('/^0/', $phone)) {
            $phone = '0' . $phone;
        }  

        if (!preg_match('/^[0-9]+$/', $phone)) {
            return [
                'status' => false,
                'messages' => "Số điện thoại phải là số"
            ];
        }

        $phoneLength = strlen($phone);
        if ($phoneLength != 10) {
            return [
                'status' => false,
                'messages' => "Số điện thoại phải là 10 chữ số "
            ];
        }

        if (!preg_match('/^' . $prefixHeaderNumbers . '/', $phone)) {
            return [
                'status' => false,
                'messages' => "Đầu số điện thoại của bạn không được hỗ trợ"
            ];
        }

        return [
            'status' => true,
            'messages' => ""
        ];
    }
}

if (!function_exists('utf8Sort')) {
    function utf8Sort($a, $b)
    {
        static $charOrder = [
            'a', 'b', 'c', 'đ', 'e',
            'f', 'g', 'h', 'i', 'j',
            'k', 'l', 'm', 'n', 'o',
            'p', 'q', 'r', 's', 't',
            'u', 'v', 'w', 'x', 'y',
            'z'
        ];

        $a = mb_strtolower($a);
        $b = mb_strtolower($b);

        for ($i = 0; $i < mb_strlen($a) && $i < mb_strlen($b); $i++) {
            $chA = mb_substr($a, $i, 1);
            $chB = mb_substr($b, $i, 1);
            $valA = array_search($chA, $charOrder);
            $valB = array_search($chB, $charOrder);
            if ($valA == $valB) continue;
            if ($valA > $valB) return 1;
            return -1;
        }

        if (mb_strlen($a) == mb_strlen($b)) return 0;
        if (mb_strlen($a) > mb_strlen($b)) return -1;
        return 1;
    }

    if (!function_exists('voucher_amout')) {
        function voucher_amout($price, $percent)
        {
            if($percent > 35) {
                return false;
            }
            $voucher = null;
            switch ($price) {
                case ($price >= 3000000 && $price < 7000000):
                    $voucher = 200000;
                    break;
                case ($price >= 7000000 && $price < 12000000):
                    $voucher = 500000;
                    break;  
                case ($price >= 12000000 && $price < 22000000):
                    $voucher = 1000000;
                    break;  
                case ($price >= 22000000 && $price < 32000000):
                    $voucher = 2000000;
                    break; 
                case ($price >= 22000000 && $price < 32000000):
                    $voucher = 2000000;
                    break;  
                case ($price >= 32000000 && $price < 42000000):
                    $voucher = 3000000;
                    break; 
                case ($price >= 42000000 && $price < 92000000):
                    $voucher = 5000000;
                    break;    
                case ($price >= 92000000):
                    $voucher = 10000000;
                    break;             
                default:
                    $voucher = 0;
                    break;
            }
            return $voucher;
        }
    }
    
}


if (!function_exists('substrwords')) {
    function substrwords($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);      
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } 
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } 
        else {
            $output = $text;
        }
        return $output;
    }
}



