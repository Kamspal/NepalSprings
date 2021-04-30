<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use Kyslik\ColumnSortable\Sortable;
    use Sortable;
	public $sortable = ['id', 'product_name', 'sale_price','details', 'updated_at', 'updated_at'];
   
}
