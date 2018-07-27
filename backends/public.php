<?php
$root = $_SERVER['DOCUMENT_ROOT'];
// require_once $root.'/models/Layout_Model.php';

class generalBackend
{
	protected  $model;
	
	public function __construct()
	{
// 		$this->model = new Layout_Model();
	}
	
	public function loadBackend($section = '')
	{
		$data 		= array();
		
// 		Info of the Application
		
// 		$appInfoRow = $this->model->getGeneralAppInfo();
		
		$appInfo = array( 
            'title' 		    => "Arian Falcon",
            'siteName' 		=> "Arian Falcon",
		    'url' 			=> "http://".$_SERVER['HTTP_HOST'].'/',
            'location'		=> "",
            'creator' 		=> "CRC Software",
            'creatorUrl' 	=> "",
            'twitter' 		=> "",
            'facebook' 		=> "",
            'instagram'		=> "",
            'email'			=> "",
            'lang'			=> "en"
		);
		
		$data['info'] = $appInfo;
		$data['seo'] = array();
		
		switch ($section) 
		{
		    case 'index':
		        $data['seo'] = array(
                    'title' => "Inicio",
                    'author' => "Arian Falcon",
                    'description' => "description",
                    'subject' => "subject",
                    'keywords' => "keywords"
		        );
            break;
            
		    case 'services':
		        $seoArray = array(
		        'title' => "Services",
		        'author' => "Michelle",
		        'description' => "description",
		        'subject' => "subject",
		        'keywords' => "keywords"
		            );
	        break;
		    
			case 'mainSection':
				// 		array of the main sliders
				$data['mainSliders'] = $this->model->getMainSliders();
				
				// 		array of videos
				$data['lastTwoVideos'] = $this->model->getVideos(2);
				
				// 		Main promoted companies
				$data['mainPromoted'] = $this->model->getMainPromotedCompanies();
				
				//		get companies with a correct location
				$data['companies_map']	= $this->model->getCompaniesWithLocation();
				
				$data['events'] = $this->model->getLastEvents();
				 
			break;

			
			
			default:
			break;
		}
		
		return $data;
	}
}

$backend = new generalBackend();

// $info = $backend->loadBackend();
// var_dump($info['categoryInfo']);
