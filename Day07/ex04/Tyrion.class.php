<?php

class Tyrion extends Lannister {
	public function punchline($character) {
		if (get_parent_class($character) === 'Lannister')
			return "Not even if I'm drunk !";
		else return "Let's do this.";
	}
}

?>