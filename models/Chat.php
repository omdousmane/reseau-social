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
      `id_smg`,
      `idDestinataire`, 
      `idEmetteur`, 
      `content`, 
      `created_at`
      )VALUES(
      DEFAULT,
      :onlineUser,
      :currentUser,
      :content,
      NOW()
      )');
      $this->statementReadUser = $pdo->prepare('SELECT * FROM user WHERE id_user=:id');
      $this->statementReadAllChat = $pdo->prepare('SELECT messages.*, user.lastname
                                                  FROM messages , user
                                                  WHERE messages.idDestinataire = user.id_user
                                                  AND idDestinataire IN (:onlineUser,:currentUser)
                                                  AND idEmetteur IN (:currentUser, :onlineUser) 
                                                  ORDER BY created_at DESC LIMIT 20');
      $this->statementReadSessionOnline = $pdo->prepare('SELECT * FROM `session` WHERE `status`= "on" AND `userid` != :onlineUser');
    }

    public function registerMessages(array $messages)
    {
      $this->statementInsetChat->bindValue(':onlineUser', $messages['onlineUser']);
      $this->statementInsetChat->bindValue(':currentUser', $messages['currentUser']);
      $this->statementInsetChat->bindValue(':content', $messages['content']);
      if ($this->statementInsetChat->execute()) {
        return true;
      } else {
        return false;
      }
    }


    // recuperation de tout les messages 
    function getAllMessages(array $messages): array | false
    {
      $this->statementReadAllChat->bindValue(':onlineUser', (int) $messages['onlineUser']);
      $this->statementReadAllChat->bindValue(':currentUser', (int) $messages['currentUser']);
      $this->statementReadAllChat->execute();
      $messages = $this->statementReadAllChat->fetchAll();
      return $messages ?? false;
    }


    //recuperation des personnes connecter avec id non et prenom
    function onlineLoggedin(int $onlineUser): array | false
    {
      $this->statementReadSessionOnline->bindValue(':onlineUser', $onlineUser);
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