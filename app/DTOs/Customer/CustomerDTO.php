<?php

namespace App\DTOs\Customer;

use App\DTOs\DTOInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CustomerDTO implements DTOInterface
{
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password = '')
    {
        $this->name = $name;
        $this->email = $email;
        // Password null ise mevcut şifreyi koru
        $this->password = $password ?? '';
    }

    // fromArray Method (Factory Method)
    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'] ?? ''
        );
    }

//    public static function fromArray(array $data): self
//    {
//        // Validating incoming data
//        $validator = Validator::make($data, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|max:255|unique:customers,email',
//            'password' => 'nullable|string|min:6',
//        ]);
//
//        if ($validator->fails()) {
//            throw new ValidationException($validator);
//        }
//
//        return new self(
//            $data['name'],
//            $data['email'],
//            $data['password'],
//
//        );
//    }


    // toArray Method (Convert DTO to Array)
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            $data['password'] ?? ''
        ];
    }

    // Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

}
