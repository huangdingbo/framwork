<?php
class SiteController extends Controller
{
	public function indexAction(){

		return $this->render('siteIndex');
	}
}