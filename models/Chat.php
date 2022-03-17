  <?php

  class Chat
  {
    private PDOStatement $statementReadAllChat;
    private PDOStatement $statementInsetChat;


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

      $this->statementReadAllChat = $pdo->prepare('SELECT * FROM `messages` ORDER BY created_at DESC LIMIT 20');
    }

    public function registerMessages(array $messages)
    {
      $this->statementInsetChat->bindValue(':author', $messages['author']);
      $this->statementInsetChat->bindValue(':content', $messages['content']);
      $this->statementInsetChat->execute();
    }

    function getAllMessages(): array | false
    {
      $this->statementReadAllChat->execute();
      $user = $this->statementReadAllChat->fetchAll();
      return $user ?? false;
    }
  }
  return new Chat($pdo);