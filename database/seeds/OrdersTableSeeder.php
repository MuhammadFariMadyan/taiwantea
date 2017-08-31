<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
          ['invoice' => '0000001', 'name' => 'Customer', 'phone' => '089999', 'address' => 'Jl. XYZ, No. 00', 'total_price' => '14000', 'status' => 'or'],
          ['invoice' => '0000002', 'name' => 'Customer', 'phone' => '089999', 'address' => 'Jl. XYZ, No. 00', 'total_price' => '20000', 'status' => 'cm'],
          ['invoice' => '0000003', 'name' => 'Customer', 'phone' => '089999', 'address' => 'Jl. XYZ, No. 00', 'total_price' => '25000', 'status' => 'cl'],
          ['invoice' => '0000004', 'name' => 'Customer', 'phone' => '089999', 'address' => 'Jl. XYZ, No. 00', 'total_price' => '20000', 'status' => 'od'],
          ['invoice' => '0000005', 'name' => 'Customer', 'phone' => '089999', 'address' => 'Jl. XYZ, No. 00', 'total_price' => '23000', 'status' => 'or'],
        ];
    }
}
