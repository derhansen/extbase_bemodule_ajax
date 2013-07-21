<?php
namespace derhansen\ExtbaseBemoduleAjax\ViewHelpers\Be;

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
 * ViewHelper to include JQuery and JQueryUI (including CSS)
 *
 * @package validation_examples_new
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class IncludeJQueryViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper {

	/**
	 * Includes the given Javascript file
	 *
	 * @param bool $jquery Include JQuery
	 * @param bool $jqueryui Include JQueryUi
	 * @return void
	 */
	public function render($jquery = FALSE, $jqueryui = FALSE) {
		$doc = $this->getDocInstance();
		$pageRenderer = $doc->getPageRenderer();

		if ($jquery) {
			$pageRenderer->loadJquery(NULL, NULL, $pageRenderer::JQUERY_NAMESPACE_NONE);
		}

		if ($jqueryui) {
			$extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('extbase_bemodule_ajax');
			$pageRenderer->addJsFile($extRelPath . 'Resources/Public/Js/jquery-ui.min.js');
			$pageRenderer->addCssFile($extRelPath . 'Resources/Public/Css/jquery-ui.css');
			$pageRenderer->addCssFile($extRelPath . 'Resources/Public/Css/jquery.ui.core.css');
			$pageRenderer->addCssFile($extRelPath . 'Resources/Public/Css/jquery.ui.theme.css');
			$pageRenderer->addCssFile($extRelPath . 'Resources/Public/Css/jquery.ui.progressbar.css');
			$pageRenderer->addCssFile($extRelPath . 'Resources/Public/Css/jquery.ui.example.css');
		}

	}

}

?>