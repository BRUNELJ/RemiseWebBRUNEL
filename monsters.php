<?php
	class Monster {
		private $name;

		private $strength;

		private $life;

		private $type;

		function __construct($name, $strength, $life, $type) {
			$this->name = $name;
			$this->strength = $strength;
			$this->life = $life;
			$this->type = $type;
		}

		function getName(){
			return $this->name;
		}

		function getStrength(){
			return $this->strength;
		}

		function getLife(){
			return $this->life;
		}

		function getType(){
			return $this->type;
		}


	}

	

?>