<?php

class Validator {
    private $data;
    private $errors = [];

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function validate(): bool {
        $this->validateField('name', 3, 'A név legalább 3 karakter hosszú legyen.');
        $this->validateField('address', 5, 'A cím legalább 5 karakter hosszú legyen.');
        $this->validatePostalCode();
        $this->validateField('city', 2, 'A város neve legalább 2 karakter hosszú legyen.');
        $this->validatePayment();

        return empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }

    private function validateField($field, $minLength, $message): void {
        $value = trim($this->data[$field] ?? '');
        if (strlen($value) < $minLength) {
            $this->errors[] = $message;
        }
    }

    private function validatePostalCode(): void {
        $postalCode = trim($this->data['postal_code'] ?? '');
        if (!preg_match('/^\d{4}$/', $postalCode)) {
            $this->errors[] = "Az irányítószám pontosan 4 számjegyből álljon.";
        }
    }

    private function validatePayment(): void {
        $payment = $this->data['payment'] ?? '';
        $validPayments = ['utanvet'];
        if (!in_array($payment, $validPayments)) {
            $this->errors[] = "Érvénytelen fizetési mód.";
        }
    }
}
