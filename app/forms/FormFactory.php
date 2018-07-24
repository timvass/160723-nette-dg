<?php

class FormFactory
{
	function create()
	{
		$form = new \Nette\Application\UI\Form();

		//CSFR
		$form->addProtection();


		//https//www.github.com

		//CSRF elleni vedelem, elkuld egy tokent->input name_token, value, gzip hasznalatakor breeze tamadas meg van oldva? vagy nincs?
		//v zabezpecene casti webu je to nutnost

		//$form->setTranslator(new \MyTranslator()); //VladaHajda myTranslatora a legjobb az app forditasara

		return $form;
	}
}