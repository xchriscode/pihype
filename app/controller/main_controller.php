<?php
class Main extends Controller
{
   function index($id="")
   {
   		if($id == 1)
   		{
   			$this->routeTo('main/call');
   		}
   }
}