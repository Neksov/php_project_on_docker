<?php
class Films {
    private PDO $pdo;

    public function __construct(Database $db) {
        $this->pdo = $db->getConnection();
    }

    public function getAll($category = null): array
    {
        try {
            $query = "SELECT * FROM `films`";

            if (!empty($category)) {
                $query .= " WHERE genre = :genre";
            }

            $query .= " ORDER BY `id` DESC";

            $stmt = $this->pdo->prepare($query);

            if (!empty($category)) {
                $stmt->bindValue(":genre", $category, PDO::PARAM_STR);
            }

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Ошибка в getAll(): " . $e->getMessage());
            return [];
        }
    }

    public function getGenres(): array
    {
        try {
            $query = "SELECT DISTINCT genre FROM `films` ORDER BY genre ASC";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            error_log("Ошибка в getGenres(): " . $e->getMessage());
            return [];
        }
    }

    public function create($title, $genre, $year, $description) {
        try {
            $query = "INSERT INTO films (title, genre, year, description) VALUES (:title, :genre, :year, :description)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
            $stmt->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->execute();

            return $this->pdo->lastInsertId();
        } catch (PDOException $e){
            error_log($e->getMessage());
            return ["Ошибка добавления фильма"];
        }
    }

    public function getById($id) {
        if (!is_numeric($id) || $id <= 0) {
            return null;
        }

        try {
            $query = "SELECT * FROM `films` WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $film = $stmt->fetch(PDO::FETCH_ASSOC);

            return $film ?: null;
        } catch (PDOException $e) {
            error_log("Ошибка в getById(): " . $e->getMessage());
            return null;
        }
    }

    public function delete($id) {
        if (!is_numeric($id) || $id <= 0) {
            return null;
        }

        $query = "DELETE FROM `films` WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                error_log("Фильм с ID {$id} не найден. ");
                return null;
            }

            return true;
        } catch (PDOException $e) {
            error_log("Ошибка при удалении фильма: " . $e->getMessage());
            return null;
        }
    }

    public function update($id, $title, $genre, $year, $description) {
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }

        $query = "SELECT title, genre, year, description FROM `films` WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $currentFilm = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$currentFilm) {
            return "Фильм с таким ID не найден";
        }

        if (
            $currentFilm['title'] === $title &&
            $currentFilm['genre'] === $genre &&
            $currentFilm['year'] == $year &&
            $currentFilm['description'] === $description
        ) {
            return "Данные фильма уже актуальны, обновление не требуется";
        }

        $query = "UPDATE `films` SET title = :title, genre = :genre, year = :year, description = :description WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
            $stmt->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->execute();

            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            error_log("Ошибка обновления фильма: " . $e->getMessage());
            return false;
        }
    }
}
