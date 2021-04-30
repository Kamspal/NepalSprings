<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'menuName'
    ];

    /**
     * Sub Menu associated with the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subMenu()
    {
        return $this->hasMany(SubMenu::class, 'mainmenuid')->orderBy('order');
    }

    
}
