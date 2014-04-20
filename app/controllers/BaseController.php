<?php

class BaseController extends Controller {
	
    protected $layout = 'layout';
    
    protected function display($view, $data = array())
    {
		if(is_array($view)) {
			foreach($view as $v) {
				$this->layout->content[] = View::make($v, $data);
			}
		}
		else {
			$this->layout->content = View::make($view, $data);
		}
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