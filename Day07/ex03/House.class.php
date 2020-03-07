<?PHP

class House	{
	public function __construct()	{
		return ;
	}
	public function introduce()	{
		print('House ') . $this->getHouseName() . ' of ' . $this->getHouseSeat();
		print(' : "' . $this->getHouseMotto() . '"' . PHP_EOL);
		return;
	}
}

?>