<?php

namespace App;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;



class Page extends Model
{
   protected $guarded = [];

   	public static function findBySlug($slug){

   		return new Page([
   			'title' => Str::title(str_ireplace('-', ' ', $slug)),
   			'content'=> 'pppppppppppppppp ppppppppppppppp pppppppppppppp',
   			'slug'=> $slug,
   		]);

   	}


   	/*public function updateTicket($data)
	{
        $ticket = $this->find($data['id']);
        $ticket->user_id = auth()->user()->id;
        $ticket->title = $data['title'];
        $ticket->description = $data['description'];
        $ticket->save();
        return 1;
	}*/
}
