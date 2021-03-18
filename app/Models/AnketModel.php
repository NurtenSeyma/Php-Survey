<?php namespace App\Models;

use CodeIgniter\Model;

class AnketModel extends Model
{
    protected $table      = 'anketler';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tarih', 'cevap1', 'cevap2', 'cevap3', 'cevap4', 'cevap5'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}