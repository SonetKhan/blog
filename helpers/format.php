<?php 

class Format{
	public function textShorten($text,$limit = 50)
	{
		$text = $text."";
		$text = substr($text, 0,50);
		$text = substr($text, 0,strrpos($text, ' '));
		$text = $text."....";

		return $text;


	}
	public function validation($data)
	{
		$data = trim($data);

		$data = stripcslashes($data);

		$data = htmlspecialchars($data);

		return $data;

	}
}

?>