<?php

class BaseController extends Controller {
	
    protected $layout = 'layout';
    
    protected function display($view, $metadata = array(), $data = array())
    {
		if(isset($metadata) && is_array($metadata) && count($metadata) != 0) 
		{
			foreach($metadata as $key => $value)
			{
				$this->layout->$key = $value;
			}
		}
	    $this->layout->content = View::make($view, $data);
    }

    /**
      * Setup the layout used by the controller.
      *
      * @return void
      */
    protected function setupLayout()
    {
	    if ( ! is_null($this->layout))
	    {
		    $this->layout = View::make($this->layout);
	    }
    }

};

?>