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

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte prosim heslo')
		->addRule($form::MIN_LENGTH, null, 8)
		->addRule($form::PATTERN, 'musi obsahovat cislici', '.*\d.*')
		->setOption('description', 'alespon 8 znaku a cislici');

		$form->addPassword('password2', 'Heslo jeste jednou:')
			->addRule($form::EQUAL, 'hesla jsou rozdilne', $form['password'])
		->setRequired('Zadajte este raz heslo');

		$form->addSubmit('send', 'Registrovat');

		//CSRF elleni vedelem, elkuld egy tokent->input name_token, value, gzip hasznalatakor breeze tamadas meg van oldva? vagy nincs?
		//v zabezpecene casti webu je to nutnost
		$form->addProtection();

		$form->onSuccess[] = [$this, 'signFormSucceeded'];

		return $form;
	}

/**	function xxx()
	{
		$form = $this->getComponent('signForm'); //sign lowecase s
		$form = $this['signForm']; //syntactic sugar

		$button = $form->getComponent('send');
		$button = $form['send'];
	}**/
}
