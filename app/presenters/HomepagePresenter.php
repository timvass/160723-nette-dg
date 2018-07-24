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

		$form->addEmail('email', 'E-mail')
			->setEmptyValue('@')
			->setNullable();//add text helyett es kisbetuvel kezdi. Ha nincs kitoltve, akkor nullara allitja be

		$form->addInteger('age', 'Vek')->addRule($form::RANGE, null, [1, 100]);

/*		$form->addText('test', 'Test')
			->setRequired(false)
			->addCondition($form::INTEGER)
				->addRule($form::MIN, null, 50)
			->elseCondition()
				->addRule($form::MIN_LENGTH, null, 3)
			->endCondition()
			->addCondition($form['jinak'], $form::FILLED)
				->addRule($form::PATTERN, 'chybi ti tam nula, machale', '.*0.*');
*/
		$countries =[
			'cs' => 'Ceska republika',
			'sk' => 'Slovensko',
			'hu' => 'Madarska republika',
			'pl' => 'Polsko'
		];

		$form->addSelect('country1', 'Zeme:', $countries) ->setPrompt('Zvolte zemi');
		$form->addRadioList('country2', 'Zeme:', $countries);
		$form->addMultiSelect('countries1', 'Zeme:', $countries); //mega nem user friendly, ha sokat valaszt ki az ember nincs ralatasa arra hogy mi van kivalasztva es mi nincs, az emberek nem tudjak hogy tobbet valaszthatnak, stb....helyette a Select2 egy remek megoldas https://select2.org/getting-started/basic-usage
		$form->addCheckboxList('countries2', 'Zeme:', $countries)
		->setDisabled(['sk']);


		$form->addUpload('avatar')
			->setRequired(false)
			//->addRule($form::MIME_TYPE, null, 'image/jpeg')
			->addRule($form::IMAGE) //jpeg, gif, png
			->addRule($form::MAX_FILE_SIZE, NULL, 10000000);



//pozrite sa do examples github.com/nette/forms/tree/master/examples, su tam vyborne priklady

		$form->addSubmit('send', 'Registrovat');

		//CSRF elleni vedelem, elkuld egy tokent->input name_token, value, gzip hasznalatakor breeze tamadas meg van oldva? vagy nincs?
		//v zabezpecene casti webu je to nutnost
		$form->addProtection();

		$form->setTranslator(new \MyTranslator()); //VladaHajda myTranslatora a legjobb az app forditasara

		$form->onSuccess[] = [$this, 'signFormSucceeded'];

		return $form;
	}

	function signFormSucceeded($form, $vals)
	{
		if($vals->avatar->hasFile()) {
			$vals->avatar->toImage()->resize(100, 100)->sharpen->send();
			exit;
		}
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
