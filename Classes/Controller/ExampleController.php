<?php
namespace derhansen\ExtbaseBemoduleAjax\Controller;

	/***************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2013 Torben Hansen <derhansen@gmail.com>
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as published by
	 *  the Free Software Foundation; either version 3 of the License, or
	 *  (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	 ***************************************************************/

/**
 * Example Controller for Backend Module
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ExampleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		/* Initialize counter stored in session variable */
		$_SESSION['progval'] = 0;
	}

	/**
	 * Example for a long process (just loops 20 seconds). Returns TRUE if process is finished
	 *
	 * @return bool TRUE if process is finished
	 */
	public function startLongProcessAction() {
		for ( $i = 1; $i <= 20; $i++) {
			/* Increase counter stored in session variable */
			session_start();
			$_SESSION['progval'] = $i * 5;
			session_write_close ();
			sleep(1);
		}

		/* Reset the counter in session variable to 0 */
		session_start();
		$_SESSION['progval'] = 0;
		session_write_close ();
		return json_encode(TRUE);
	}

	/**
	 * Checks the status of the long process
	 *
	 * @return int Status of process in percent
	 */
	public function checkLongProcessAction() {
		session_start();
		if (!isset($_SESSION['progval'])) {
			$_SESSION['progval'] = 0;
		}
		session_write_close ();
		return json_encode($_SESSION['progval']);
	}
}
?>