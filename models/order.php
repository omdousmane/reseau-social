  <?php

	class Order
	{
		private PDOStatement $statementReadAllProduct;
		private PDOStatement $statementReadAllProductType;
		private PDOStatement $statementCreateOneCmd;
		private PDOStatement $statementReadAllCmd;
		private PDOStatement $statementCreateOneDetailCmd;
		private PDOStatement $statementReadOneOrder;
		private PDOStatement $statementReadOne;
		private PDOStatement $statementReadOneFromComd;
		private PDOStatement $statementReadAllFromDetailCmd;
		private PDOStatement $statementGetNumberInvoice;


		function __construct(PDO $pdo)
		{
			$this->statementCreateOneCmd = $pdo->prepare('INSERT INTO `commande`(
		`number_invoice`,
    `client_id`,
    `status_cmd`,
    `montant_cmd`
		)
		VALUES(
		:number_invoice,
    :client_id,
    :status_cmd,
    :montant_cmd
		)');

			$this->statementCreateOneDetailCmd = $pdo->prepare('INSERT INTO `detail_commande`(
    `name_prod`,
    `id_cmd`,
    `id_prod`,
    `detail_qte`,
    `price_total_prod`
		)
		VALUES(
		:name_prod,
    :id_cmd,
    :id_prod,
    :detail_qte,
		:price_total_prod
		)');

			$this->statementReadAllFromDetailCmd		= $pdo->prepare('SELECT * FROM  detail_commande WHERE id_cmd=:id_cmd');
			$this->statementGetNumberInvoice     		= $pdo->prepare('SELECT `number_invoice` FROM `commande` INNER JOIN detail_commande ON detail_commande.id_cmd= commande.id_cmd WHERE commande.id_cmd=:id ORDER BY `number_invoice` DESC LIMIT 0, 1');
			$this->statementReadAllCmd				      = $pdo->prepare('SELECT * FROM commande WHERE client_id=:id');
			$this->statementReadOneOrder			      = $pdo->prepare('SELECT commande.montant_cmd, detail_commande.* FROM detail_commande LEFT JOIN commande ON detail_commande.id_cmd = commande.id_cmd  WHERE commande.id_cmd=:id');
			$this->statementReadOneFromComd         = $pdo->prepare('SELECT id_cmd FROM commande WHERE client_id=:id ORDER BY id_cmd DESC LIMIT 0, 1');
			$this->statementReadOne                 = $pdo->prepare('SELECT id_cmd FROM commande WHERE client_id=:id');
			$this->statementReadAllCommande         = $pdo->prepare('SELECT * FROM commande');
			$this->statementReadAllProduct          = $pdo->prepare('SELECT * FROM product');
			$this->statementReadAllProductType      = $pdo->prepare('SELECT * FROM type_prodct');
		}

		public function fetchGetNumberInvoice($id): array
		{
			$this->statementGetNumberInvoice->bindValue(':id', $id);
			$this->statementGetNumberInvoice->execute();
			return $this->statementGetNumberInvoice->fetch();
		}

		public function fetchAllFromDetailCmd($id): array
		{
			$this->statementReadAllFromDetailCmd->bindValue(':id_cmd', $id);
			$this->statementReadAllFromDetailCmd->execute();
			return $this->statementReadAllFromDetailCmd->fetchAll();
		}

		public function fetchAllCmdClient($id): array
		{
			$this->statementReadAllCmd->bindValue(':id', $id);
			$this->statementReadAllCmd->execute();
			return $this->statementReadAllCmd->fetchAll();
		}

		public function ReadOneFromComd($id)
		{
			$this->statementReadOneFromComd->bindValue(':id', $id);
			$this->statementReadOneFromComd->execute();
			return $this->statementReadOneFromComd->fetch();
		}

		public function fetchOne(string $id): array
		{
			$this->statementReadOne->bindValue(':id', $id);
			$this->statementReadOne->execute();
			return $this->statementReadOne->fetch();
		}

		public function fetchOneOrder(string $id): array
		{
			$this->statementReadOneOrder->bindValue(':id', $id);
			$this->statementReadOneOrder->execute();
			return $this->statementReadOneOrder->fetchAll();
		}

		public function registerCommande($commande)
		{
			$this->statementCreateOneCmd->bindValue(':number_invoice', $commande['number_invoice']);
			$this->statementCreateOneCmd->bindValue(':client_id', $commande['client_id']);
			$this->statementCreateOneCmd->bindValue(':status_cmd', $commande['status_cmd']);
			$this->statementCreateOneCmd->bindValue(':montant_cmd', $commande['montant_cmd']);
			$this->statementCreateOneCmd->execute();
		}

		public function registerDetailCommande(array $Detailcommande)
		{
			$this->statementCreateOneDetailCmd->bindValue(':name_prod', $Detailcommande['name_prod']);
			$this->statementCreateOneDetailCmd->bindValue(':id_cmd', $Detailcommande['id_cmd']);
			$this->statementCreateOneDetailCmd->bindValue(':id_prod', $Detailcommande['id_prod']);
			$this->statementCreateOneDetailCmd->bindValue(':detail_qte', $Detailcommande['detail_qte']);
			$this->statementCreateOneDetailCmd->bindValue(':price_total_prod', $Detailcommande['price_total_prod']);
			$this->statementCreateOneDetailCmd->execute();
		}


		function getAllProducts()
		{
			$this->statementReadAllProduct->execute();
			$user = $this->statementReadAllProduct->fetchAll();
			return $user ?? false;
		}

		function getAllProductsType()
		{
			$this->statementReadAllProductType->execute();
			$user = $this->statementReadAllProductType->fetchAll();
			return $user ?? false;
		}
	}
	return new Order($pdo);