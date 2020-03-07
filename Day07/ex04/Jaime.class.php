<?php

class Jaime extends Lannister   {
	public function punchline($character) {
		if (get_parent_class($character) === 'Lannister' && get_class($character) !== 'Cersei')
			return "Not even if I'm drunk !";
		else if (get_parent_class($character) === 'Lannister' && get_class($character) === 'Cersei')
			return "With pleasure, but only in a tower in Winterfell, then.";
		else return "Let's do this.";
    }
}

?>