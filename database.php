<?php
class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database.db');
        $this->db->exec('CREATE TABLE IF NOT EXISTS responses (
            id INTEGER PRIMARY KEY AUTOINCREMENT, 
            question TEXT UNIQUE, 
            answer TEXT
        )');
    }

    public function getResponse($question) {
        $stmt = $this->db->prepare('SELECT answer FROM responses WHERE question = :question');
        $stmt->bindValue(':question', strtolower(trim($question)), SQLITE3_TEXT);
        $result = $stmt->execute();
        
        if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            return $row['answer'];
        }
        return null;
    }

    public function addResponse($question, $answer) {
        $stmt = $this->db->prepare('INSERT OR IGNORE INTO responses (question, answer) VALUES (:question, :answer)');
        $stmt->bindValue(':question', strtolower(trim($question)), SQLITE3_TEXT);
        $stmt->bindValue(':answer', $answer, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updateResponse($question, $answer) {
        $stmt = $this->db->prepare('UPDATE responses SET answer = :answer WHERE question = :question');
        $stmt->bindValue(':question', strtolower(trim($question)), SQLITE3_TEXT);
        $stmt->bindValue(':answer', $answer, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function __destruct() {
        $this->db->close();
    }
}
?>
