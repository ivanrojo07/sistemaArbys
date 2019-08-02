<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Product;
use App\ExcelProduct;

class UpdateExcelToProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza la tabla de productos a ser mostrada tomando el ultimo archivo de excel subido';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = ExcelProduct::get();
        foreach( $products as $product ){
            Product::updateOrCreate(
                ['clave' => $product['clave']],
                json_decode(json_encode($product), true)
            );
        }
    }
}
