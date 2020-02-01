<?php
/**
 * General action, hooks loader
*/
class Hmrm_Loader 
{
	protected $hmrm_actions;
	protected $hmrm_filters;

	/**
	 * Class Constructor
	*/
	function __construct()
	{
		$this->hmrm_actions = array();
		$this->hmrm_filters = array();
	}

	function add_action( $hook, $component, $callback )
	{
		$this->hmrm_actions = $this->add( $this->hmrm_actions, $hook, $component, $callback );
	}

	function add_filter( $hook, $component, $callback )
	{
		$this->hmrm_filters = $this->add( $this->hmrm_filters, $hook, $component, $callback );
	}

	private function add( $hooks, $hook, $component, $callback )
	{
		$hooks[] = array( 'hook' => $hook, 'component' => $component, 'callback' => $callback );
		return $hooks;
	}

	public function hmrm_run()
	{
		foreach( $this->hmrm_filters as $hook ){
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
		foreach( $this->hmrm_actions as $hook ){
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
	}
}
?>