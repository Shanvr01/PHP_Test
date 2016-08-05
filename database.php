<?php 
	class mysql_database {
		public $conn;

		function __construct($servername, $username, $password, $dbname)
		{
			$database = new mysqli($servername, $username, $password, $dbname);

			if ($database->connect_error) {
				exit('No Database Connection');
			} else {
				$this->conn = $database;
				return true;
			}
		}

		public function fetch($query)
		{
			return $this->conn->query($query);
		}

		public function update($query)
		{
			return $this->conn->query($query);
		}

		public function insert($query)
		{
			return $this->conn->query($query);
		}
	}
	$db = new mysql_database('localhost', 'root', '', 'dvd_shop');

	// echo "<pre>";
	// print_r($db->fetch('SELECT * FROM customer'));
	// exit;



	// class car {
	// 	public $color = 'red';
	// 	public $make = 'BMW';
	// 	private $safety = 'on';

	// 	function __construct($color, $make) {
	// 		$this->make = $make;
	// 		$this->color = $color;
	// 		echo "This is a $this->make and it is $this->color";
	// 	}

	// 	public function start() {
	// 		echo "$this->make goes vroom";
	// 	}

	// 	public function stop($reason) {
	// 		echo "Turn off $this->make, because $reason";
	// 	}
	// }

	// $myFirstCar = new car('blue', 'Mazda');
	// $myFirstCar->start();

	// $mySecondCar = new car('red', 'Toyota');
	// $mySecondCar->start();

	// $myFirstCar->stop('i said so');