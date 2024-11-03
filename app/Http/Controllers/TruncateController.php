<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruncateController extends Controller
{
    public function truncateTables()
    {
        $tables = [
            'users',
            'orders',
            'carts',
            'order_items',
            'model_has_roles',
            'role_has_permissions'
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->back()->with('success', 'All specified tables have been truncated successfully.');
    }
}
