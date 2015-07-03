<?php
/**
 * Created by PhpStorm.
 * User: m1x0n
 * Date: 6/29/15
 * Time: 2:55 PM
 */
namespace App\Lib\Binary\Academy\Repositories;
use App\Lib\Binary\Academy\UserRepository;
class ArrayUserRepository implements UserRepository {
    protected $data = [
        'John Doe',
        'Jane Doe',
        'Jim Doe'
    ];
    public function getFirst()
    {
        return reset($this->data);
    }
    public function getLast()
    {
        return end($this->data);
    }
    public function getAll()
    {
        return $this->data;
    }
}