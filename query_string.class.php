<?php
/**
 * This class is for clean handling of the Query String
 * for things like pagination and other options that use request variables.
 */
class QueryString
{
	public $string;
	public $array;

	/**
	 * Construct function initialises the query string variable
	 * @param string $query_string The current query string you want to work with, defaults to $_SERVER['QUERY_STRING']
	 */
	function __construct( $query_string = null )
	{
		// Get the QUERY STRING from the server variable if not existing
		if ( $query_string == null ) {
			$query_string = $_SERVER['QUERY_STRING'];
		}
		elseif ( is_array($query_string) ) {
			$this->array = $query_string;
			$this->build();
			$query_string = $this->string;

		}


		// Set the local variable
		$this->string = $query_string;

		// Turn the string into an array
		parse_str($this->string, $this->array);

		// Chain
		return $this;
	}

	/**
	 * Build function constructs the query string array back into the string
	 * @return QueryString
	 */
	function build()
	{
		// Build the query string from the array
		$this->string = http_build_query($this->array);

		// Chain
		return $this;
	}

	/**
	 * Function to set the value of a field in the query string
	 * @param string $key  The key of the variable.
	 * @param mixed $value The value to set $key to
	 * @return QueryString
	 */
	function set( $key, $value ) {

		// Set the value
		$this->array[$key] = $value;

		// Build the string
		$this->build();

		// Chain
		return $this;
	}

	/**
	 * Function to get the value of a field in the query string
	 * @param string $key  The key of the variable.
	 * @return QueryString
	 */
	function get( $key ) {

		// Set the value
		return $this->array[$key];
	}

	/**
	 * Function to remove an item from the query string
	 * @param  string $key The name of the variable you want ot remove
	 * @return QueryString
	 */
	function remove( $key ) {
		// clear the value
		unset( $this->array[$key] );

		// Build the string
		$this->build();

		// Chain
		return $this;
	}

	/**
	 * Toggle the value of a query string item
	 * @param  string $key The variable you wish to toggle
	 * @return QueryString
	 */
	function toggle( $key ) {
		// Toggle the value
		$this->array[$key] = (int)!(bool)$this->array[$key];

		// Build the string
		$this->build();	

		// Chain
		return $this;
	}

}
