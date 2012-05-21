<?php
	
	require_once(TOOLKIT . '/class.section.php');

	class Extension_lazy_input_correction extends Extension {
		
	/*-------------------------------------------------------------------------
		Delegates:
	-------------------------------------------------------------------------*/
		
		public function getSubscribedDelegates() {
			return array(
				array(
					'page' => '/frontend/',
					'delegate' => 'EventPreSaveFilter',
					'callback' => '__filterInput'
				)
			);
		}

		public function __filterInput($context) {
			$section = new Section(Symphony::Engine());
			$section->set('id', $context['event']->getSource());

			$section_fields_schema = $section->fetchFieldsSchema();

			foreach($section_fields_schema as $field_schema) {
				if($field_schema['type'] == 'input') {
					
					// clean any surrounding whitespace
					$field = trim($context['fields'][$field_schema['element_name']]);

					$words = explode(' ', $field);
					
					// multiple words in input
					if(is_array($words)) {
						$lazy = false;

						foreach($words as $word) {
							if(preg_match('/^[a-z]{1}/', $word) || (preg_match('/^[A-Z]{1}/', $word) && preg_match('/[A-Z]{1}$/', $word))){
								$lazy = true;

								break;
							}
						}

						if($lazy) {
							$field = strtolower($field);
							$context['fields'][$field_schema['element_name']] = ucwords($field);
						} else {
							// return trimmed field
							$context['fields'][$field_schema['element_name']] = $field;
						}
					// single word in input
					} elseif(preg_match('/^[a-z]{1}/', $field) || (preg_match('/^[A-Z]{1}/', $field) && preg_match('/[A-Z]{1}$/', $field))) {

						$field = strtolower($field);
						$context['fields'][$field_schema['element_name']] = ucwords($field);
					} else {
						// return trimmed field
						$context['fields'][$field_schema['element_name']] = $field;
					}
				}
			}
		}
	}
	
?>