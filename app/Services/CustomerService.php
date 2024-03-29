<?php

  namespace App\Services;

  use App\Repositories\CustomerRepository;
  use Illuminate\Database\Eloquent\Model;

  class CustomerService
  {
    public function __construct(
      protected CustomerRepository $customerRepository
    ){}

    public function findAll()
    {
      return $this->customerRepository->findAll();
    }

    public function findById(int $customerId)
    {
      return $this->customerRepository->findById($customerId);
    }

    public function create(array $customer)
    {
      $isClientExists = $this->customerRepository->findByCPF($customer['cpf']);

      if (count($isClientExists) > 0) {
        return [
          "status"  => 409,
          "message" => "Este cliente já está cadastrado",
          "data"    => []
        ];
      }

      $response =  $this->customerRepository->create($customer);
      return [
        "status"  => 201,
        "message" => "Cliente cadastrado com sucesso",
        "data"    => $response
      ];
    }

    public function update(int $customerId, array $customer)
    {
      $this->customerRepository->update($customerId, $customer);
      return [ "status"=> 200, "message" => "Cliente atualizado com sucesso" ];
    }

    public function delete(int $customerId)
    {
      $this->customerRepository->delete($customerId);
      return [ "status" => 200, "message" => "Cliente excluído com sucesso" ];
    }

    public function search(array $params)
    {
      $response = $this->customerRepository->search($params);
      return $response;
    }

  }
