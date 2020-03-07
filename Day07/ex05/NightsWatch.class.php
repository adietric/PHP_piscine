<?PHP

class NightsWatch {
	private $recr = [];

public function recruit($member_of_N_W) {
	$this->recr[] = $member_of_N_W;
	}

public function fight() {
	foreach ($this->recr as $value) {
		if ($value instanceof IFighter)
			$value->fight();
		}
    }
}

?>