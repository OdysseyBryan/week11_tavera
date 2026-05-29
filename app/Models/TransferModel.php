<?php

namespace App\Models;

use CodeIgniter\Model;

class TransferModel extends Model
{
    protected $table = 'transfers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['recipient_name', 'account_number', 'amount', 'currency', 'created_at'];
    protected $useTimestamps = false;
}
