<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{


    use Sortable;
	public $sortable = ['id', 'sub_menus.product_name', 'sub_menus.sale_price','details', 'updated_at', 'updated_at'];
	protected $fillable = [
    	 'subMenuName', 'mainmenuid'
    ];
    /**
	 * Products belonged to the multiple category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function menu()
	{
	    return $this->belongsTo(Menu::class, 'mainmenuid');
	}



}
