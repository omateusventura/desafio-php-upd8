<?php

  namespace App\Http\Controllers;

  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use App\Services\CustomerService;

  class CustomerController extends Controller
  {

    public function __construct(
      protected CustomerService $customerService
    ) {}

    public function index()
    {
      $customers = $this->customerService->findAll();
      return view('customers.index', compact('customers'));
    }

    public function show(int $id)
    {
      $customer = $this->customerService->findById($id);
      return view('customers.update', compact('customer'));
    }

    public function create(Request $request)
    {
      $request->validate([
        'cpf'          => 'required',
        'name'         => 'required',
        'genere'       => 'required',
        'dateofbirth'  => 'required',
        'postalcode'   => 'required',
        'street'       => 'required',
        'number'       => 'required',
        'neighborhood' => 'required',
        'city'         => 'required',
        'state'        => 'required'
      ]);

      $response = $this->customerService->create($request->all());
      return response()->json($response);
    }

    public function update(Request $request, int $id)
    {
      $request->validate([
        'name'         => 'required',
        'dateofbirth'  => 'required',
        'postalcode'   => 'required',
        'street'       => 'required',
        'number'       => 'required',
        'neighborhood' => 'required',
        'city'         => 'required',
        'state'        => 'required'
      ]);

      $response = $this->customerService->update($id, $request->all());
      return response()->json($response);
    }

    public function delete(int $id)
    {
      $response = $this->customerService->delete($id);
      return response()->json($response);
    }
  }
