<?php

namespace App\Controllers;

use App\Models\TransferModel;

class Transfer extends BaseController
{
    protected $transferModel;

    public function __construct()
    {
        $this->transferModel = new TransferModel();
    }

    public function index()
    {
        $data['transfers'] = $this->transferModel->orderBy('created_at', 'DESC')->findAll();
        return view('transfer/index', $data);
    }

    public function submit()
    {
        $data = [
            'recipient_name' => $this->request->getPost('recipient_name'),
            'account_number' => $this->request->getPost('account_number'),
            'amount' => $this->request->getPost('amount'),
            'currency' => $this->request->getPost('currency'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->transferModel->save($data);

        session()->setFlashdata('success', 'Transfer submitted successfully!');
        return redirect()->to('/transfer');
    }
}
