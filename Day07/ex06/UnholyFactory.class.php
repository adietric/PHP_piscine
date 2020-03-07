<?PHP

class UnholyFactory {
	private $_tab = [];
	private $_classes = [];

	public function absorb($perso) {
	if (array_search($perso->class_name, $this->_tab) === false
		&& get_parent_class($perso) === 'Fighter') {
		$this->_tab[] = $perso->class_name;
		$this->_classes[] = $perso;
		echo "(Factory absorbed a fighter of type ".$perso->class_name.")\n";
		}
		else if (get_parent_class($perso) !== 'Fighter')
			echo "(Factory can't absorb this, it's not a fighter)\n";
		else
			echo "(Factory already absorbed a fighter of type ". $perso->class_name . ")\n";
		}
	public function fabricate($perso) {
		if (array_search($perso, $this->_tab) === false) {
			echo "(Factory hasn't absorbed any fighter of type " .$perso. ")\n";
			return null;
		}
		else
		{
			echo "(Factory fabricates a fighter of type ".$perso.")\n";
			return $this->_classes[array_search($perso, $this->_tab)];
		}
	}
}

?>