<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class UserModel extends Model
{
    public function alldata()
    {
        return DB::table('tbl_user')->get();
    }

    public function tambahdata($data)
    {
        DB::table('tbl_user')->insert($data);
    }

    public function tambahdataMaster($data)
    {
        DB::table('tbl_user')->insert($data);
    }

    public function detailuser($id)
    {
        return DB::table('tbl_user')->where('id', $id)->first();
    }

    public function deleteuser($id)
    {
        return DB::delete('delete from tbl_user where id = ?', [$id]);
    }

    public function updatedata($id,$data)
    {
        return DB::table('tbl_user')
        ->where('id', $id)
        ->update($data);
    }
}
