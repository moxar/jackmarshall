<?php

class BaseController extends Controller {
	
    protected $layout = 'layout';
    
    protected function display($view, $data = array())
    {
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