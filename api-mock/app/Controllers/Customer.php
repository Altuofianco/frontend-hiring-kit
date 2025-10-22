<?php
namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Customer extends ResourceController
{
    protected $format = 'json';
    use ResponseTrait;

    /**
     * Get all customers
     * GET /customer
     */
    public function index(): ResponseInterface
    {
        $customers = $this->readCustomers();
        return $this->respond(['payload' => $customers]);
    }

    /**
     * Get a specific customer by ID
     * GET /customer/{id}
     */
    public function show($id = null): ResponseInterface
    {
        if ($id === null) {
            return $this->failNotFound('ID cliente non fornito');
        }

        $customers = $this->readCustomers();
        $customer = array_filter($customers, fn($c) => $c['id'] == $id);

        if (empty($customer)) {
            return $this->failNotFound('Cliente non trovato');
        }

        return $this->respond(array_values($customer)[0]);
    }

    /**
     * Create a new customer
     * POST /customer
     */
    public function create(): ResponseInterface
    {
        $data = $this->request->getJSON(true);

        // Validation
        if (empty($data['name']) || empty($data['email'])) {
            return $this->failServerError('Nome e email sono obbligatori');
        }

        $customers = $this->readCustomers();

        // Check if email already exists
        $emailExists = array_filter($customers, fn($c) => $c['email'] === $data['email']);
        if (!empty($emailExists)) {
            return $this->failServerError("L'email esiste già sul database");
        }

        // Generate new ID
        $newId = empty($customers) ? 1 : max(array_column($customers, 'id')) + 1;

        $newCustomer = [
            'id' => $newId,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $customers[] = $newCustomer;
        $this->writeCustomers($customers);

        return $this->respondCreated($newCustomer, 'Customer created successfully');
    }

    /**
     * Update an existing customer
     * PUT /customer/{id}
     */
    public function update($id = null): ResponseInterface
    {
        if ($id === null) {
            return $this->failServerError('ID cliente non fornito');
        }

        $data = $this->request->getJSON(true);
        $customers = $this->readCustomers();

        $index = array_search($id, array_column($customers, 'id'));

        if ($index === false) {
            return $this->failNotFound('Cliente non trovato');
        }

        // Update only provided fields
        if (isset($data['name'])) {
            $customers[$index]['name'] = $data['name'];
        }
        if (isset($data['email'])) {
            // Check if new email already exists (excluding current customer)
            $emailExists = array_filter($customers, fn($c) => $c['email'] === $data['email'] && $c['id'] != $id);
            if (!empty($emailExists)) {
                return $this->failServerError("L'email esiste già sul database");
            }
            $customers[$index]['email'] = $data['email'];
        }
        if (isset($data['phone'])) {
            $customers[$index]['phone'] = $data['phone'];
        }
        if (isset($data['address'])) {
            $customers[$index]['address'] = $data['address'];
        }

        $customers[$index]['updated_at'] = date('Y-m-d H:i:s');

        $this->writeCustomers($customers);

        return $this->respond($customers[$index], 200, 'Customer updated successfully');
    }

    /**
     * Delete a customer
     * DELETE /customer/{id}
     */
    public function delete($id = null): ResponseInterface
    {
        if ($id === null) {
            return $this->failServerError('ID cliente non fornito');
        }

        $customers = $this->readCustomers();
        $index = array_search($id, array_column($customers, 'id'));

        if ($index === false) {
            return $this->failNotFound('Customer not found');
        }

        array_splice($customers, $index, 1);
        $this->writeCustomers($customers);

        return $this->respondDeleted(['id' => $id], 'Customer deleted successfully');
    }

    /**
     * Read customers from file
     */
    private function readCustomers(): array
    {
        if (!file_exists(FCPATH . 'data/customers.txt')) {
            return [];
        }

        $content = file_get_contents(FCPATH . 'data/customers.txt');
        $customers = json_decode($content, true);

        return $customers ?? [];
    }

    /**
     * Write customers to file
     */
    private function writeCustomers(array $customers): void
    {
        $json = json_encode($customers, JSON_PRETTY_PRINT);
        file_put_contents(FCPATH . 'data/customers.txt', $json);
    }
}