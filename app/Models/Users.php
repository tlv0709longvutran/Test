<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUser(){
        $user = DB::select('SELECT * FROM users ORDER BY create_at DESC');

        return $user;
    }

    public function addUsers($data) {
        DB::insert('INSERT INTO users (fullname,email,create_at) values (?,?, ?)', $data);
    }

    public function getDetail($id){
       return DB::select('SELECT * FROM ' .$this->table . ' WHERE id = ? ' , [$id]);
    }

    public function updateUser($data , $id){

        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET fullname=?,email=?,update_at=? WHERE id=?' , $data);
    }

    public function deleteUser($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?",[$id]);
    }

    public function statementUser($sql){
        return DB::statement($sql);
    }

    public function learnQueryBuilder(){

        DB::enableQueryLog();
        $id =2;
        $data = DB::table($this->table)
        ->select('fullname as hoten','email' , 'id')
        //->where('id',2)
        ->where('fullname' , 'like' , '%Vu%')
        ->get();// Lấy ra tất cả bản ghi
        $sql = DB::getQueryLog();
        //dd($sql);
        dd($data);
        $detail = DB::table($this->table)->first();// Lấy ca dòng đầu tiên
    }
}
