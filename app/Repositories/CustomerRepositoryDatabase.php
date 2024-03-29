<?php

  namespace App\Repositories;

  use App\Models\Customer;
  use App\Interfaces\ICustomerRepository;
  use Illuminate\Database\Eloquent\Collection;
  use Carbon\Carbon;

  class CustomerRepositoryDatabase implements ICustomerRepository
  {
    public function __construct(
      protected Customer $customerModel
    ) {}

    /**
     * @return Collection
    */
    public function findAll() : Collection
    {
      return $this->customerModel::whereNull('deleted_at')->get();
    }

    /**
     * @param int $customerId
     * @return Customer
    */
    public function findById(int $customerId) : Customer
    {
      return $this->customerModel::find($customerId);
    }

    /**
     * @param int $customerCPF
     * @return Collection
    */
    public function findByCPF(int $customerCPF) : Collection
    {
      return $this->customerModel::where('cpf', '=', $customerCPF)->get();
    }

    /**
     * @param array $customer
     * @return Customer
    */
    public function create(array $customer) : Customer
    {
      return $this->customerModel::create($customer);
    }

    /**
     * @param int $customerId
     * @param array $customer
     * @return void
    */
    public function update(int $customerId, array $customer) : void
    {
      $this->customerModel::where('id', $customerId)->update($customer);
    }

    /**
      * @param int $customerId
      * @return void
    */
    public function delete(int $customerId) : void
    {
      $this->customerModel::where('id', $customerId)->update(["deleted_at" => Carbon::now()]);
    }

    /**
     * @param array [cpf, name, genere, state]
     * @return Collection
    */
    public function search(array $params) : Collection
    {
      $query = $this->customerModel::query();

      if (isset($params['cpf'])) $query->where('cpf', '=', $params['cpf']);
      if (isset($params['name'])) $query->where('name', 'LIKE', '%' . $params['name'] . '%');
      if (isset($params['genere'])) $query->where('genere', '=', $params['genere']);
      if (isset($params['state'])) $query->where('state', '=', $params['state']);

      return $query->whereNull('deleted_at')->get();
    }
  }
