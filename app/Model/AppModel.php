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

	/**
         * 
         * @param type $fileProperty
         * @return string
         */
	public function moveFile($fileProperty=Null) {
		$response['success'] = true;
		$renamed_file_name = time().'_'.$fileProperty['name'];
		// move_uploaded_file($fileProperty['tmp_name'], WWW_ROOT.DS.'uploads'.DS.$renamed_file_name);
		if(move_uploaded_file($fileProperty['tmp_name'], WWW_ROOT.DS.'uploads'.DS.$renamed_file_name)) {
			$response['message'] = $renamed_file_name;
		}else {
			$response['success'] = false;
			$response['message'] = 'File Could not be uploaded';
		}
		return $response;
	}
        
        public function createThumb(){
            //just changed
        }
}

