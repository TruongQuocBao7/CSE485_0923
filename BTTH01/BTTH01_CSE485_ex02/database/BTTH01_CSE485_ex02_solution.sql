-- Bài 1 a
SELECT baiviet.*
FROM baiviet
INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
WHERE theloai.ten_tloai = 'Nhạc trữ tình';

-- Bài 2 b
SELECT baiviet.*
FROM baiviet
INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
WHERE tacgia.ten_tgia = 'Nhacvietplus';

-- Bài 3 c
SELECT theloai.*
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
WHERE baiviet.ma_tloai IS NULL;

-- Bài 4 d
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

-- Bài 5 e
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS so_baiviet
FROM theloai
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ten_tloai
ORDER BY so_baiviet DESC
LIMIT 1;

-- Bài 6 f
SELECT tacgia.ten_tgia, COUNT(*) AS so_baiviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
GROUP BY tacgia.ten_tgia
ORDER BY so_baiviet DESC
LIMIT 2;

-- Bài 7 g
SELECT baiviet.*
FROM baiviet
WHERE baiviet.ten_bhat LIKE '%yêu%' OR baiviet.ten_bhat LIKE '%thương%' OR baiviet.ten_bhat LIKE '%anh%' OR baiviet.ten_bhat LIKE '%em%';

-- Bài 8 h
SELECT baiviet.*
FROM baiviet
WHERE baiviet.tieude LIKE '%yêu%' OR baiviet.tieude LIKE '%thương%' OR baiviet.tieude LIKE '%anh%' OR baiviet.tieude LIKE '%em%'
   OR baiviet.ten_bhat LIKE '%yêu%' OR baiviet.ten_bhat LIKE '%thương%' OR baiviet.ten_bhat LIKE '%anh%' OR baiviet.ten_bhat LIKE '%em%';

-- Bài 9 i
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, baiviet.tieude, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;

SELECT * FROM vw_Music;

-- Bài 10 j
DELIMITER //

CREATE PROCEDURE sp_DSBaiViet(IN pTenTloai VARCHAR(255))
BEGIN
    DECLARE vTloaiID INT;
    
    -- Lấy ID của thể loại dựa trên tên thể loại
    SELECT ma_tloai INTO vTloaiID FROM theloai WHERE ten_tloai = pTenTloai;
    
    -- Kiểm tra xem thể loại có tồn tại hay không
    IF vTloaiID IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Thể loại không tồn tại.';
    ELSE
        -- Truy vấn danh sách bài viết của thể loại
        SELECT baiviet.*
        FROM baiviet
        WHERE baiviet.ma_tloai = vTloaiID;
    END IF;
END //

DELIMITER ;

CALL sp_DSBaiViet('Nhạc trữ tình');

DROP PROCEDURE IF EXISTS sp_DSBaiViet;

-- Bài 11 k
ALTER TABLE theloai
ADD COLUMN SLBaiViet INT DEFAULT 0;

UPDATE theloai AS tl
SET tl.SLBaiViet = (
    SELECT COUNT(*) 
    FROM baiviet AS bv
    WHERE bv.ma_tloai = tl.ma_tloai
);

DELIMITER //

CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    IF NEW.ma_tloai IS NOT NULL THEN
        UPDATE theloai
        SET SLBaiViet = SLBaiViet + 1
        WHERE ma_tloai = NEW.ma_tloai;
    END IF;
END //

DELIMITER ;

DROP TRIGGER IF EXISTS tg_CapNhatTheLoai;

--Bài 12 l
btth01_cse485 CREATE TABLE Users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL,
   role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);