<?php
function validateDate($date, $format = 'Y-m-d\TH:i') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if (isset($_REQUEST['birthday'])) {
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");

    if (!validateDate($_REQUEST['birthday'])) {
        die(json_encode(
                Array(
                    'status' => 'error',
                    'error' => 'INVALID_FORMAT',
                    'error_msg' => 'Введіть дані в правильному форматі!'
                )
            )
        );
    }

    $now = new DateTime();
    $birthday = new DateTime($_REQUEST['birthday']);
    $difference_seconds = $now->getTimestamp() - $birthday->getTimestamp();

    if ($difference_seconds < 0) {
        die(json_encode(
                Array(
                    'status' => 'error',
                    'error' => 'INVALID_VALUE',
                    'error_msg' => 'Введіть правильну дату народження!'
                )
            )
        );
    }

    $difference_minutes = (int)($difference_seconds / 60);
    die(json_encode(
            Array(
                'status' => 'success',
                'minutes' => $difference_minutes
            )
        )
    );
}