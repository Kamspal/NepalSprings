<?php

namespace App;
use App\Menu;
use App\Product;
use App\SubMenu;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
       public function menu()
    {
        return $this->belongsTo(Menu::class, 'selectmainmenu');
    }

    /**
     * Sub Menu belonged to the product category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMenu()
    {
        return $this->belongsTo(SubMenu::class, 'selectsubmenu');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'category_id');
    }
}
