<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select2 extends Component {

	public $options;
	public $multiple;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($options = [], $multiple = false) {
		$this->options = $options;
		$this->multiple = $multiple;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render() {
		return view('components.select2');
	}
}
