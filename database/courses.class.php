<?php
require_once 'database.class.php';
class Courses extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function get_courses($sort = null, $keyword = null, $limit = 8, $offset = 0) {
        $sql = "SELECT * FROM courses";
        $params = [];

        if ($keyword) {
            $sql .= " WHERE title LIKE :keyword OR description LIKE :keyword";
            $params[':keyword'] = "%$keyword%";
        }

        if ($sort && $sort !== 'default') {
            $allowedSortColumns = ['price', 'rating'];
            $allowedSortOrders = ['asc', 'desc'];
            list($column, $order) = explode('-', $sort) + [null, null];

            if (in_array($column, $allowedSortColumns) && in_array(strtolower($order), $allowedSortOrders)) {
                $sql .= " ORDER BY $column " . strtoupper($order);
            }
        }

        if ($limit && $offset >= 0) {
            $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }

        $stmt = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>