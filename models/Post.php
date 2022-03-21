  <?php

  class Posts
  {
    private PDOStatement $statementReadAllPost;
    private PDOStatement $statementReadPostByCat;
    private PDOStatement $statementReadAllCat;
    private PDOStatement $statementReadCatByMail;
    private PDOStatement $statementInsetPost;

    function __construct(PDO $pdo)
    {
      $this->statementInsetPost = $pdo->prepare('INSERT INTO `posts`(
      `id_post`,
      `idCat`, 
      `content`, 
      `created_at`, 
      `idUser`, 
      `title`
      )VALUES(
      DEFAULT,
      :idCat,
      :content,
      NOW(),
      :idUser,
      :title
      )');
      $this->statementReadAllPost = $pdo->prepare('SELECT * FROM `posts` ORDER BY created_at ASC LIMIT 20');
      $this->statementReadAllCat = $pdo->prepare('SELECT * FROM `category`');
      $this->statementReadCatByMail = $pdo->prepare('SELECT id FROM `category` WHERE `nameCat` =:nameCat');
      $this->statementReadPostByCat = $pdo->prepare('SELECT * FROM `posts` WHERE `idCat` = (
        SELECT id FROM `category` WHERE `id`=:idCat) ORDER BY created_at DESC LIMIT 20');
    }

    //insertion des posts
    public function registerPost(array $post)
    {
      $this->statementInsetPost->bindValue(':idCat', $post['idCat']);
      $this->statementInsetPost->bindValue(':content', $post['content']);
      $this->statementInsetPost->bindValue(':idUser', $post['idUser']);
      $this->statementInsetPost->bindValue(':title', $post['title']);
      $this->statementInsetPost->execute();
    }

    //recuperation de toute les posts
    function getAllPosts(): array | false
    {
      $this->statementReadAllPost->execute();
      $posts = $this->statementReadAllPost->fetchAll();
      return $posts ?? false;
    }

    //recuperation de toute les categorie
    function getAllCategorie(): array | false
    {
      $this->statementReadAllCat->execute();
      $categories = $this->statementReadAllCat->fetchAll();
      return $categories ?? false;
    }

    //recuperation de l'idee de la category a partir du nom
    function getIdCategorieByMail(string $nameCat): array | false
    {
      $this->statementReadCatByMail->bindValue(':nameCat', $nameCat);
      $this->statementReadCatByMail->execute();
      $idCat = $this->statementReadCatByMail->fetch();
      return $idCat ?? false;
    }
  }
  return new Posts($pdo);