<?php
/*the developer of this function is Maxim Skvortsov*/

function create_ms_form($arr_form_elements)
{
	$form_begin="<form id=\"$arr_form_elements[id_form]\">";
	$form_end='</form>';
	$form_elems='';
		if($arr_form_elements['input'])
		{
			for($i=1; $i<=$arr_form_elements['input']['count']; $i++)
			{
				$form_elems.='<div><input type="text" name="'.$arr_form_elements['input']['input_name'].$i.'" id="'.$arr_form_elements['input']['input_name'].$i.'"></div>';
			}
		}
		if($arr_form_elements['textarea'])
		{
			for($i=1; $i<=$arr_form_elements['textarea']['count']; $i++)
			{
				$form_elems.='<textarea name="'.$arr_form_elements['textarea']['textarea_name'].$i.'" id="'.$arr_form_elements['textarea']['textarea_name'].$i.'"></textarea>';
			}
		}
		if($arr_form_elements['input_subm'])
		{
			$form_elems.='<div><input type="submit" name="'.$arr_form_elements['input_subm']['btn_name'].'" id="'.$arr_form_elements['input_subm']['btn_id'].'"></div>';
		}

		return $form_begin.$form_elems.$form_end;
}

?>