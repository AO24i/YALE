<?php //*** SavingX ~ trait » Yale™ Library - Yet Another Laravel Elevator © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace Yale\Wire\Render;

trait SavingX
{
	// ◈ === factorizeX »
	abstract protected function factorizeX(&$input, $action);



	// ◈ === iSavingX »
	protected function iSavingX($action, $id = null, $input = [], null|string|array $success = null, $next = null)
	{
		$fields = $input;
		if (empty($input)) {
			$fields = DataX::getFields();
		}


		// ~ updating
		if ($action === 'update' && !empty($id) && !empty($fields)) {
			$this->grabParamX($input, $fields);
			$this->cleanInputX($input);
			$this->factorizeX(input: $input, action: $action);
			$o = DataX::modify($id, $input);
			if ($o === true || $o > 0) {
				$this->successX($success);
				if ($next) {
					return $this->redirectX($next);
				}
				return $this->update($id);
			}
		}
	}

}//> end of trait ~ SavingX