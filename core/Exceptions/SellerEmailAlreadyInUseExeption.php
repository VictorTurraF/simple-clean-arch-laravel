<?php

namespace Core\Exceptions;


class SellerEmailAlreadyInUseExeption extends \Exception {
    public function __construct($message = null, $code = 0, \Throwable $previous = null) {
        $defaultMessage = "Um vendender já foi cadastrado com este email";

        parent::__construct($message ?? $defaultMessage, $code, $previous);
    }
}
