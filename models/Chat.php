  <?php

  class Chat
  {
    private PDOStatement $statementReadAllChat;
    private PDOStatement $statementInsetChat;
    private PDOStatement $statementReadSessionOnline;
    private PDOStatement $statementReadUser;



    function __construct(PDO $pdo)
    {
      $this->statementInsetChat = $pdo->prepare('INSERT INTO `messages`(
		`author`,
    `content`,
    `created_at`
		)
		VALUES(
		:author,
    :content,
    NOW()
		)');
      $this->statementReadUser = $pdo->prepare('SELECT * FROM user WHERE id_user=:id');
      $this->statementReadAllChat = $pdo->prepare('SELECT * FROM `messages` ORDER BY created_at DESC LIMIT 20');
      $this->statementReadSessionOnline = $pdo->prepare('SELECT * FROM `session` WHERE `status`= "on"');
    }

    public function registerMessages(array $messages)
    {
      $this->statementInsetChat->bindValue(':author', $messages['author']);
      $this->statementInsetChat->bindValue(':content', $messages['content']);
      $this->statementInsetChat->execute();
    }

    // recuperation de tout les messages 
    function getAllMessages(): array | false
    {
      $this->statementReadAllChat->execute();
      $user = $this->statementReadAllChat->fetchAll();
      return $user ?? false;
    }

    //recuperation des personnes connecter avec id non et prenom
    function onlineLoggedin(): array | false
    {
      $this->statementReadSessionOnline->execute();
      $userOnline = $this->statementReadSessionOnline->fetchAll();
      return $userOnline ?? false;
    }

    //recuperation des personnes connecter avec id non et prenom
    function getUserById(string $id): array | false
    {
      $this->statementReadUser->bindValue(':id', $id);
      $this->statementReadUser->execute();
      $user = $this->statementReadUser->fetchAll();
      return $user ?? false;
    }
  }
  return new Chat($pdo);