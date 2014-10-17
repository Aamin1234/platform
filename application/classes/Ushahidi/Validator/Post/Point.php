<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi Post Point Validator
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */


// Note: this doesn't actually implement Ushahidi\Tool\Validator
// Tt accepts array, not Ushahidi\Data
class Ushahidi_Validator_Post_Point
{
	public function check(Array $input)
	{
		$this->valid = Validation::factory($input)
			->rules('value', array(
				// @todo better error messages
					array('is_array'),
					array('array_key_exists', array('lat', ':value')),
					array('array_key_exists', array('lon', ':value'))
				));

		return $this->valid->check();
	}

	public function errors($from = 'post')
	{
		return $this->valid->errors($from);
	}
}
