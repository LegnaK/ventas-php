<?php
	if (!defined('ROOT_ACCESS') || ROOT_ACCESS != 1) die();
	
	header('Content-type: application/json');
	
	$newsProducts = array();
	
	$params = array();
	$results = array('productId', 'productName', 'productShortname', 'productDescription', 'productDetails', 'productPrice', 'productViews', 'productCreated', 'currencyId', 'currencySymbol', 'currencyName', 'currencyDescription', 'categoryId', 'categoryName', 'categoryShortname', 'categoryDescription', 'pictureId', 'pictureFile', 'pictureTitle');
	ExecutePreparedCallableStatement('CALL getNewsProducts()', '', $params, $results, function($results){
		global $newsProducts;
		
		$newsProducts[sizeof($newsProducts)] = array(
			'id'			=> $results['productId'],
			'name'			=> $results['productName'],
			'shortname'		=> $results['productShortname'],
			'description'	=> $results['productDescription'],
			'details'		=> $results['productDetails'],
			'price'			=> $results['productPrice'],
			'views'			=> $results['productViews'],
			'created'		=> $results['productCreated'],
			'currency'		=> array(
				'id'			=> $results['currencyId'],
				'symbol'		=> $results['currencySymbol'],
				'name'			=> $results['currencyName'],
				'description'	=> $results['currencyDescription']
			),
			'category'		=> array(
				'id'			=> $results['categoryId'],
				'name'			=> $results['categoryName'],
				'shortname'		=> $results['categoryShortname'],
				'description'	=> $results['categoryDescription']
			),
			'picture'		=> array(
				'id'			=> $results['pictureId'],
				'file'			=> $results['pictureFile'],
				'title'			=> $results['pictureTitle']
			)
		);
	});
	
	$pagedata['newsProducts'] = $newsProducts;
	
	echo json_encode($pagedata, JSON_UNESCAPED_UNICODE);
?>