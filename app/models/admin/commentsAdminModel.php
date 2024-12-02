<?php
class commentsAdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy tất cả bình luận
    public function getAllComments() {
        $sql = "SELECT * FROM tb_binhluan";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa bình luận theo ID
    public function deleteCommentById($id) {
        $sql = "DELETE FROM tb_binhluan WHERE id_binhLuan = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
