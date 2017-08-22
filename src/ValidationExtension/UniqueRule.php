<?php

namespace TJG\Gangoy\ValidationExtension;

use Interop\Container\ContainerInterface;
use Rakit\Validation\Rule;

class UniqueRule extends Rule
{
	protected $message = ":attribute :value has been used";

	protected $fillable_params = ['table', 'column', 'id'];

	/**
	 * @var ContainerInterface
	 */
	private $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function check($value)
	{
		// make sure required parameters exists
		$this->requireParameters(['table', 'column', 'id']);

		// getting parameters
        $table = $this->parameter('table');
        $column = $this->parameter('column');
		$id = $this->parameter('id');

        $db = $this->container['db']->table($table);

		if ($id != '') {
            $data = $db->where($column, $value)
                        ->where('id', '!=', $id)
                        ->count();
			return intval($data) === 0; // true for valid, false for invalid
		}

		$data = $db->where($column, $value)->count();
        return intval($data) === 0; // true for valid, false for invalid
	}
}
