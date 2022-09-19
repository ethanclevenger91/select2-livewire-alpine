<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Demo extends Component {

	private $default_form_state = [
		'value' => [],
	];

	public $form;
	public $options;

	public function mount() {
		$this->resetForm();
		$this->options = [
			[
				'label' => 'Foo',
				'value' => 'Foo',
			],
			[
				'label' => 'Bar',
				'value' => 'Bar',
			],
			[
				'label' => 'Fizz',
				'value' => 'Fizz',
			],
			[
				'label' => 'Buzz',
				'value' => 'Buzz',
			],
		];
	}

	public function render() {
		return view('livewire.demo');
	}

	public function store() {
		// not actually gonna do much.

		$this->resetForm();
		session()->flash('message', 'Saved!');
	}

	public function resetForm() {
		$this->form = $this->default_form_state;
	}
}
