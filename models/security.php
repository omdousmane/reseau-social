<?php

class AuthDB
{
    private PDOStatement $statementRegister;
    private PDOStatement $statementReadSession;
    private PDOStatement $statementReadUser;
    private PDOStatement $statementReadUserFromEmail;
    private PDOStatement $statementCreateSession;
    private PDOStatement $statementDeleteSession;
    private PDOStatement $statementReadUserFromEmails;
    private PDOStatement $statementReadUserSpeudo;

    function __construct(PDO $pdo)
    {
        $this->statementRegister = $pdo->prepare('INSERT INTO user(
            id_user,
            firstname,
            lastname,
            speudo,
            images,
            email,
            password
            )VALUES(
            DEFAULT,
            :firstname,
            :lastname,
            :speudo,
            :images,
            :email,
            :password
            )');

        $this->statementReadSession = $pdo->prepare('SELECT * FROM session WHERE id=:id');
        $this->statementReadUser = $pdo->prepare('SELECT * FROM user WHERE id_user=:id');
        $this->statementReadUserFromEmail = $pdo->prepare('SELECT email FROM user WHERE email LIKE :email ORDER BY email ASC;');
        $this->statementReadUserFromEmails = $pdo->prepare('SELECT * FROM user WHERE email=:email');
        $this->statementReadUserSpeudo = $pdo->prepare('SELECT * FROM user WHERE speudo=:speudo');
        $this->statementCreateSession = $pdo->prepare('INSERT INTO session(
            `id`,
            `userid`, 
            `status`
        )
         VALUES (
            :sessionid,
            :userid,
            :status
        )');
        $this->statementDeleteSession = $pdo->prepare('DELETE FROM session WHERE id=:id');
    }

    function login(array $session): void
    {
        var_dump($session);
        $sessionId = bin2hex(random_bytes(32));
        $this->statementCreateSession->bindValue(':sessionid', $sessionId);
        $this->statementCreateSession->bindValue(':userid', $session['userId']);
        $this->statementCreateSession->bindValue(':status', $session['status']);
        $this->statementCreateSession->execute();
        $signature = hash_hmac('sha256', $sessionId, '4cd30a3e9bd36ae867730f712e15b4d29d0473916d5d61e8425346f277c63cf9');
        setcookie('session', $sessionId, time() + 60 * 60 * 24 * 14, '', '', false, true);
        setcookie('signature', $signature, time() + 60 * 60 * 24 * 14, "", "", false, true);
        return;
    }

    function register(array $user): void
    {
        // var_dump($user);
        $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
        $this->statementRegister->bindValue(':firstname', $user['firstname']);
        $this->statementRegister->bindValue(':lastname', $user['lastname']);
        $this->statementRegister->bindValue(':speudo', $user['speudo']);
        $this->statementRegister->bindValue(':images', $user['images']);
        $this->statementRegister->bindValue(':email', $user['email']);
        $this->statementRegister->bindValue(':password', $hashedPassword);
        $this->statementRegister->execute();
        return;
    }

    function isLoggedin(): array | false
    {
        $sessionId = $_COOKIE['session'] ?? '';
        $signature = $_COOKIE['signature'] ?? '';
        if ($sessionId && $signature) {
            $hash = hash_hmac('sha256', $sessionId, '4cd30a3e9bd36ae867730f712e15b4d29d0473916d5d61e8425346f277c63cf9');
            if (hash_equals($hash, $signature)) {
                $this->statementReadSession->bindValue(':id', $sessionId);
                $this->statementReadSession->execute();
                $session =  $this->statementReadSession->fetch();
                if ($session) {
                    $this->statementReadUser->bindValue(':id', $session['userid']);
                    $this->statementReadUser->execute();
                    $user = $this->statementReadUser->fetch();
                }
            }
        }
        return $user ?? false;
    }

    function logout(string $sessionId): void
    {
        $this->statementDeleteSession->bindValue(':id', $sessionId);
        $this->statementDeleteSession->execute();
        setcookie('session', '', time() - 1);
        setcookie('signature', '', time() - 1);
        return;
    }

    function getUserFromEmail(string $email): array | false
    {
        $this->statementReadUserFromEmail->bindValue(':email', $email . '%');
        $this->statementReadUserFromEmail->execute();
        return $this->statementReadUserFromEmail->fetchall();
    }
    function getUserFromEmails(string $email): array | false
    {
        $this->statementReadUserFromEmails->bindValue(':email', $email);
        $this->statementReadUserFromEmails->execute();
        return $this->statementReadUserFromEmails->fetch();
    }
    function getUserFromspeudo(string $speudo): array | false
    {
        $this->statementReadUserSpeudo->bindValue(':speudo', $speudo);
        $this->statementReadUserSpeudo->execute();
        return $this->statementReadUserSpeudo->fetch();
    }
}
return new AuthDB($pdo);