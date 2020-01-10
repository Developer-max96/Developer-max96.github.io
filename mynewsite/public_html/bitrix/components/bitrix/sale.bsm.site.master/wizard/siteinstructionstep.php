<?php
namespace Bitrix\Sale\BsmSiteMaster\Steps;

use Bitrix\Main,
	Bitrix\Main\Application,
	Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class SiteInstructionStep
 * Step with instructions for creating a site
 *
 * @package Bitrix\Sale\BsmSiteMaster\Steps
 */
class SiteInstructionStep extends \CWizardStep
{
	private $currentStepName = __CLASS__;

	/** @var Main\Request */
	private $request;

	/** @var \SaleBsmSiteMaster */
	private $component = null;

	private $formFieldList = [
		"CRM_SITE",
		"LID",
		"NAME",
		"SERVER_NAME",
		"DOC_ROOT",
		"WIZARD_REWRITE",
	];

	/**
	 * Check step errors
	 */
	private function setStepErrors()
	{
		$errors = $this->component->getWizardStepErrors($this->currentStepName);
		if ($errors)
		{
			foreach ($errors as $error)
			{
				$this->SetError($error);
			}
		}
	}

	/**
	 * Prepare next/prev buttons
	 *
	 * @throws \ReflectionException
	 */
	private function prepareButtons()
	{
		$steps = $this->component->getSteps($this->currentStepName);

		$shortClassName = (new \ReflectionClass($this))->getShortName();

		if (isset($steps["NEXT_STEP"]))
		{
			$this->SetNextStep($steps["NEXT_STEP"]);
			$this->SetNextCaption(Loc::getMessage("SALE_BSM_WIZARD_".strtoupper($shortClassName)."_NEXT"));
		}
		if (isset($steps["PREV_STEP"]))
		{
			$this->SetPrevStep($steps["PREV_STEP"]);
			$this->SetPrevCaption(Loc::getMessage("SALE_BSM_WIZARD_".strtoupper($shortClassName)."_PREV"));
		}
	}

	/**
	 * Initialization step id, title and next step
	 *
	 * @throws \ReflectionException
	 * @throws Main\SystemException
	 */
	public function initStep()
	{
		$this->component = $this->GetWizard()->GetVar("component");

		$this->SetStepID($this->currentStepName);
		$this->SetTitle(Loc::getMessage("SALE_BSM_WIZARD_SITEINSTRUCTIONSTEP_TITLE"));

		$this->request = Application::getInstance()->getContext()->getRequest();

		$this->prepareButtons();

		$this->setStepErrors();
	}

	/**
	 * Show step content
	 */
	public function showStep()
	{
		if ($this->GetErrors())
		{
			return false;
		}

		$this->setFormFields();

		try
		{
			$languageId = $this->getLanguageId();
		}
		catch (\Exception $ex)
		{
			$languageId = "ru";
		}

		$instructionLink = "https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=103&LESSON_ID=287";
		$instructionVmLink = "https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=37&LESSON_ID=8849";
		if ($languageId && $languageId !== "ru")
		{
			$instructionLink = "https://training.bitrix24.com/support/training/course/?COURSE_ID=68&LESSON_ID=6217";
			$instructionVmLink = "https://training.bitrix24.com/support/training/course/?COURSE_ID=113&LESSON_ID=9579";
		}

		ob_start();
		?>
		<div class="adm-bsm-site-master-paragraph">
			<p><?=Loc::getMessage("SALE_BSM_WIZARD_SITEINSTRUCTIONSTEP_DESCR_TEXT")?></p>
			<p><?=Loc::getMessage("SALE_BSM_WIZARD_SITEINSTRUCTIONSTEP_DESCR_LINK", [
				"#LINK_INSTRUCTION#" => $instructionLink
			])?></p>
			<p><?=Loc::getMessage("SALE_BSM_WIZARD_SITEINSTRUCTIONSTEP_DESCR_VM_LINK", [
				"#LINK_VM_INSTRUCTION#" => $instructionVmLink
			])?></p>
			<p><?=Loc::getMessage("SALE_BSM_WIZARD_SITEINSTRUCTIONSTEP_DESCR_NEXT")?></p>
		</div>
		<?
		$content = ob_get_contents();
		ob_end_clean();

		$this->content = $content;

		return true;
	}

	/**
	 * @return array
	 */
	public function showButtons()
	{
		ob_start();
		if ($this->GetNextStepID() !== null)
		{
			?>
			<span class="adm-bsm-site-master-checkbox">
				<label class="adm-bsm-site-master-checkbox-label" style="display: flex !important;align-items: center;flex-direction: row;">
					<input type="checkbox" id="confirmation_done" value="Y">
					<?=Loc::getMessage("SALE_BSM_WIZARD_SITEINSTRUCTIONSTEP_ALL_DONE")?>
				</label>
			</span>
			<input type="hidden" name="<?=$this->GetWizard()->nextStepHiddenID?>" value="<?=$this->GetNextStepID()?>">
			<button type="submit" class="ui-btn ui-btn-primary ui-btn-disabled" name="<?=$this->GetWizard()->nextButtonID?>" disabled>
				<?=$this->GetNextCaption()?>
			</button>
			<?
		}
		$content = ob_get_contents();
		ob_end_clean();

		return [
			"CONTENT" => $content,
			"NEED_WRAPPER" => true,
			"CENTER" => false,
		];
	}

	/**
	 * @return string
	 * @throws Main\ArgumentException
	 * @throws Main\ObjectPropertyException
	 * @throws Main\SystemException
	 */
	private function getLanguageId()
	{
		$languageId = '';

		$siteIterator = Main\SiteTable::getList(array(
			'select' => array('LID', 'LANGUAGE_ID'),
			'filter' => array('=DEF' => 'Y', '=ACTIVE' => 'Y')
		));
		if ($site = $siteIterator->fetch())
		{
			$languageId = (string)$site['LANGUAGE_ID'];
		}

		unset($site, $siteIterator);

		return $languageId;
	}

	/**
	 * Save form fields to wizard's var
	 */
	private function setFormFields()
	{
		foreach ($this->formFieldList as $field)
		{
			$this->GetWizard()->SetVar($field, $this->GetWizard()->GetVar($field));
		}
	}
}