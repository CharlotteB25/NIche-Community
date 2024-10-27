<?php

namespace App\QueryBuilders;
use App\Models\Book;

class BookQueryBuilder
{
   private $query;

   public function __construct()
   {
       $this->query = Book::query();
   }

   //this function is used to get the data from the database with the relations that are given in the parameter

   public function with($relations) 
   {
         $this->query->with($relations);
         return $this;
   }

   public function whereContentLike(string $search)
   {
       $this->query->where('title', 'LIKE', "%" . $search . "%");
       return $this;
   }
  
   public function get($perPage = null)
   {
        if($perPage) {
            return $this->query->paginate($perPage);
        }
        else{
       return $this->query->get();
        }
   }  
}

//this page is to make the querybuilder that is used in the itemcontroller to be more readable and easier to use
//this is done by making a class that has all the methods that are used in the itemcontroller and then calling the methods in the itemcontroller
//in this page we made 