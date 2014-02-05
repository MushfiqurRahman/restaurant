<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	
	public function createThumb( $fileName, $original_image){

    	$pathToImages = WWW_ROOT.'uploads'.DS.'thumb';
		
    	if (!is_dir($pathToImages)) {
			mkdir($pathToImages, 0777, true);
		}
		$arr_image_details = getimagesize(WWW_ROOT.'uploads'.DS.$original_image); // pass id to thumb name
		$original_width = $arr_image_details[0];
	    $original_height = $arr_image_details[1];
	    $new_width = 120;
	    $new_height = 120;
		
		// $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
  		$img = imagecreatefromjpeg(WWW_ROOT.'uploads'.DS.$original_image);
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );

	      // copy and resize old image into new image
      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height );

      	$renamed_file_name = time().'_'.'thumb'.'_'.$fileName['name'];
	
      	$response['success'] = true;

		if(imagejpeg( $tmp_img, WWW_ROOT.'uploads'.DS.'thumb'.DS.$renamed_file_name )) {
			
			$response['message'] = $renamed_file_name;
			
		}else {
			$response['success'] = false;
			$response['message'] = 'File Could not be uploaded';
		}
		return $response;
        //just changed
    }



	/**
         * 
         * @param type $fileProperty
         * @return string
         */
	public function moveFile($fileProperty=Null) {
		$response[0]['success'] = true;
		$renamed_file_name = time().'_'.$fileProperty['name'];
		// pr($fileProperty);
		// exit;
		// move_uploaded_file($fileProperty['tmp_name'], WWW_ROOT.DS.'uploads'.DS.$renamed_file_name);
		if(move_uploaded_file($fileProperty['tmp_name'], WWW_ROOT.'uploads'.DS.$renamed_file_name)) {
			
			$response[0]['message'] = $renamed_file_name;
			
			$response[1] = $this->createThumb($fileProperty, $renamed_file_name);
			
			if(!$response[1]['success']) {
				$response[0]['success'] = false;
				unlink(WWW_ROOT.'uploads'.DS.$renamed_file_name);
			}
		}else {
			$response[0]['success'] = false;
			$response[0]['message'] = 'File Could not be uploaded';
		}
		return $response;
	}
        
        
}

