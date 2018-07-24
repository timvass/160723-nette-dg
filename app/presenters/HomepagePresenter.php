<?php

namespace App\Presenters;

use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	function createComponentSignForm() //Sign uppercase S
	{
		$form = new Nette\Application\UI\Form();
		$form->addText('name', 'Jmeno')
		->setRequired('Zadejte prosim jmeno');

/*		$form->addText('email')
			->addRule($form::BLANK)
			->setHtmlAttribute('style', 'display:none');
*/
		$form->addText('spam', 'Zadejte slovo pivo')
			->setRequired()
			->addRule($form::EQUAL, null, 'pivo')
		->setHtmlAttribute('data-spam', 'pivo');
		//invisible recaptcha componette
		//data-autocomplete URL
		//data-provide="datepicker" pro bootstrap datapicker

/*		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte prosim heslo')
		->addRule($form::MIN_LENGTH, null, 8)
		->addRule($form::PATTERN, 'musi obsahovat cislici', '.*\d.*')
		->setOption('description', 'alespon 8 znaku a cislici');

		$form->addPassword('password2', 'Heslo jeste jednou:')
			->addRule($form::EQUAL, 'hesla jsou rozdilne', $form['password'])
		->setRequired('Zadajte este raz heslo'); */

		$form->addEmail('email', 'E-mail')->setNullable();//add text helyett es kisbetuvel kezdi. Ha nincs kitoltve, akkor nullara allitja be

		$form->addInteger('age', 'Vek')->addRule($form::RANGE, null, [1, 100]);

		$form->addSubmit('send', 'Registrovat');

		//CSRF elleni vedelem, elkuld egy tokent->input name_token, value, gzip hasznalatakor breeze tamadas meg van oldva? vagy nincs?
		//v zabezpecene casti webu je to nutnost
		$form->addProtection();

		$form->onSuccess[] = [$this, 'signFormSucceeded'];

		return $form;
	}

	function signFormSucceeded($form, $vals)
	{
		dump($vals);
		//$form->addError('Jmeno alebo heslo je neplatne');
		//$form['name']->addError('Uzivatelske jmeno je obsazene');
		//$this->redirect($this);
	}

/**	function xxx()
	{
		$form = $this->getComponent('signForm'); //sign lowecase s
		$form = $this['signForm']; //syntactic sugar

		$button = $form->getComponent('send');
		$button = $form['send'];
	}**/
}
