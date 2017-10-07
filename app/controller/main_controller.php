<?php
class Main extends AppController
{
   function index($id="")
   {
   		if($id == 1)
   		{
   			$this->routeTo('main/call');
   		}
   }
}