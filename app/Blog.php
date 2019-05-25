<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   	
  	protected $fillable = [];

   	/*protected $fillable = [
        'title', 'description'
   	];*/

   	public function getDataByid($data)
	{
        $ticket = $this->find($data['id']);
       
        return $ticket;
	}
}
