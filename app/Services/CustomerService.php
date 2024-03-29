<?php

  namespace App\Services;

  use App\Repositories\CustomerRepositoryDatabase;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Collection;
  use App\Models\Customer;

  class CustomerService
  {
    public function __construct(
      protected CustomerRepositoryDatabase $customerRepositoryDatabase
    ){}

    /**
     * @return Collection
    */
    public function findAll() : Collection
    {
      return $this->customerRepositoryDatabase->findAll();
    }

    /**
     * @param int $customerId
     * @return Customer
    */
    public function findById(int $customerId) : Customer
    {
      return $this->customerRepositoryDatabase->findById($customerId);
    }

    /**
      * @param array $customer
      * @return array
    */
    public function create(array $customer) : array
    {
      $isClientExists = $this->customerRepositoryDatabase->findByCPF($customer['cpf']);

      if (count($isClientExists) > 0) {
        return [
          "status"  => 409,
          "message" => "Este cliente já está cadastrado",
          "data"    => []
        ];
      }

      $response = $this->customerRepositoryDatabase->create($customer);

      return [
        "status"  => 201,
        "message" => "Cliente cadastrado com sucesso",
        "data"    => $response
      ];
    }

    /**
     * @param int $customerId
     * @param array $customer
     * @return array
    */
    public function update(int $customerId, array $customer) : array
    {
      $this->customerRepositoryDatabase->update($customerId, $customer);
      return [
        "status"=> 200,
        "message" => "Cliente atualizado com sucesso"
      ];
    }

    /**
     * @param int $customerId
    */
    public function delete(int $customerId)
    {
      $this->customerRepositoryDatabase->delete($customerId);
    }

    /**
      * @param array $params
      * @return Collection
    */
    public function search(array $params) : Collection
    {
      return $this->customerRepositoryDatabase->search($params);
    }

  }
