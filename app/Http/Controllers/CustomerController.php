<?php

  namespace App\Http\Controllers;

  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use Illuminate\Http\JsonResponse;
  use App\Services\CustomerService;
  use Illuminate\Contracts\View\View;

  class CustomerController extends Controller
  {

    public function __construct(
      protected CustomerService $customerService
    ) {}

    /**
     * @return View
    */
    public function index() : View
    {
      $customers = $this->customerService->findAll();
      return view('customers.index', compact('customers'));
    }

    /**
     * @return View
    */
    public function show(int $id) : View
    {
      $customer = $this->customerService->findById($id);
      return view('customers.update', compact('customer'));
    }

    /**
     * @return JsonResponse
    */
    public function findAll() : JsonResponse
    {
      $customers = $this->customerService->findAll();
      return response()->json($customers);
    }

    /**
     * @param int $customerId
     * @return JsonResponse
    */
    public function findById(int $id) : JsonResponse
    {
      $customers = $this->customerService->findById($id);
      return response()->json($customers);
    }

    /**
     * @param Request $request
     * @return JsonResponse
    */
    public function create(Request $request) : JsonResponse
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

    /**
     * @param Request $request
     * @param int $customerId
     * @return JsonResponse
    */
    public function update(Request $request, int $id) : JsonResponse
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

    /**
     * @param int $customerId
     * @return JsonResponse
    */
    public function delete(int $id) : JsonResponse
    {
      $response = $this->customerService->delete($id);
      return response()->json($response);
    }

    /**
     *
    */
    public function search(Request $request)
    {
      $params = $request->query->all();
      $customers = $this->customerService->search($params);
      return view('customers.tabledata', compact('customers'));
    }
  }
