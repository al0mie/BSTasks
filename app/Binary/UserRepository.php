<?php
/**
 * Created by PhpStorm.
 * User: m1x0n
 * Date: 6/29/15
 * Time: 2:54 PM
 */
namespace App\Lib\Binary\Academy;


interface UserRepository {
    public function getFirst();
    public function getLast();
    public function getAll();
}