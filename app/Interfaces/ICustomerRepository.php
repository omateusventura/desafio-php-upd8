<?php

  namespace App\Interfaces;

  use Illuminate\Database\Eloquent\Collection;
  use App\Models\Customer;

  interface ICustomerRepository {
    public function findAll() : Collection;
    public function findById(int $customerId) : Customer;
    public function findByCPF(int $customerCPF) : Collection;
    public function create(array $customer) : Customer;
    public function update(int $customerId, array $customer) : void;
    public function delete(int $customerId) : void;
    public function search(array $params) : Collection;
  }
