<?php
require_once('Validation.php');
//return all input,checkbox,radio button values
//need to be extended to utilize all form elements

class StickyForm extends Validation {
	//validates the input sent from the form
    //post array as the first parameter and the elements array as the second
    //checks all text fields for correct input and select options, checkboxes, radio buttons

	public function validateForm($GlobalPost, $elementsArr){
		foreach($elementsArr as $k=>$v){
			//if the type is text, then it is a textbox or textarea field
            //it is depended by the setup in the elements array
			if($elementsArr[$k]['type'] === "text"){
				$error = $this->checkFormat($GlobalPost[$k], $elementsArr[$k]['regex']);
				if($error == 'error'){
					$elementsArr[$k]['errorOutput'] = $elementsArr[$k]['errorMessage'];
					$elementsArr['masterStatus']['status'] = "error";
				}
				//values into the array to make it sticky
				$elementsArr[$k]['value'] = htmlentities($GlobalPost[$k]);
			}

			//if the type is select then, it check to selectd as sticky
            //dosen't check any validation issues as a select box will be corrected
            //setup to check for correct input 
			else if($elementsArr[$k]['type'] === "select"){
				$elementsArr[$k]['selected'] = $GlobalPost[$k];
			}
			//checks for any checkboxes that are checked
            //optional setting for required or none
            //checkboxes can be checked or not
            //if: the boxes are to be checked by default: an error message will be displayed
            //only checks if all the checkboxes are left unchecked and make the checkbox stiky
			else if($elementsArr[$k]['type'] === 'checkbox'){
				if($elementsArr[$k]['action'] == "required" && !isset($GlobalPost[$k])){
					$elementsArr[$k]['errorOutput'] =  $elementsArr[$k]['errorMessage'];
					$elementsArr['masterStatus']['status'] = "error";
				}
				else {
					if(isset($GlobalPost[$k])){
						foreach($elementsArr[$k]['status'] as $ek=>$ev){
							foreach($GlobalPost[$k] as $gv){
								if($ek === $gv){
									$elementsArr[$k]['status'][$ek] = "checked";
									break;
								}
							}
						}
					}
				}
			}

			//else if for radio buttons: check if a radio group is required. make the form sticky
			else if($elementsArr[$k]['type'] === 'radio'){
				if($elementsArr[$k]['action'] == "required" && !isset($GlobalPost[$k])){
					$elementsArr[$k]['errorOutput'] =  $elementsArr[$k]['errorMessage'];
					$elementsArr['masterStatus']['status'] = "error";
				}
				else{
					if(isset($GlobalPost[$k])){
						foreach($elementsArr[$k]['value'] as $ek=>$ev){
								if($GlobalPost[$k] === $ek){
								$elementsArr[$k]['value'][$ek] = "checked";
								break;
							}
						}	
					}
				}
			}
		}
		return $elementsArr;
	}

	//public function: created the option for the select boxes
	public function createOptions($elementsArr){
		$options = '';
		foreach($elementsArr['options'] as $k=>$v){
			if($elementsArr['selected'] == $k){
				$options .= "<option selected value=$k>$v</option>";
			}
			else {
				$options .= "<option value=$k>$v</option>";
			}
		}
		return $options;
	}

}
?>