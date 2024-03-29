<?php

  namespace App\Repositories;

  use App\Models\Customer;
  use Illuminate\Database\Eloquent\Model;
  use Carbon\Carbon;

  class CustomerRepository
  {
    public function __construct(
      protected Customer $customerModel
    ) {}

    public function findAll()
    {
      return $this->customerModel::whereNull('deleted_at')->get();
    }

    public function findById(int $customerId)
    {
      return $this->customerModel::find($customerId);
    }

    public function findByCPF(int $customerCPF)
    {
      return $this->customerModel::where('cpf', '=', $customerCPF)->get();
    }

    public function create(array $customer)
    {
      return $this->customerModel::create($customer);
    }

    public function update(int $customerId, array $customer)
    {
      return $this->customerModel::where('id', $customerId)->update($customer);
    }

    public function delete(int $customerId)
    {
      return $this->customerModel::where('id', $customerId)
      ->update(["deleted_at" => Carbon::now()]);
    }

    /**
     * @param array [cpf, name, genere, state]
     */
    public function search(array $params)
    {
      $query = $this->customerModel::query();

      if (isset($params['cpf'])) $query->where('cpf', '=', $params['cpf']);
      if (isset($params['name'])) $query->where('name', 'LIKE', '%' . $params['name'] . '%');
      if (isset($params['genere'])) $query->where('genere', '=', $params['genere']);
      if (isset($params['state'])) $query->where('state', '=', $params['state']);

      return $query->whereNull('deleted_at')->get();
    }
  }
