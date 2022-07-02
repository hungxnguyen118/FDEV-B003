-- SELECT (DISTINCT) các cột, toán tử tính toán
-- FROM tên bảng JOIN tên bảng ON điều kết nối giữa các bảng
-- WHERE điều kiện lọc (AND, OR, IN, BETWEEN cái gì đó AND cái gì đó, LIKE điều kiện giống, IS NOT NULL, IS NULL)
-- GROUP BY tên cột cần gom nhóm
-- HAVING điều kiện cột sau khi gom nhóm
-- ORDER BY cột cần sắp xếp (ASC - default, DESC)
-- LIMIT (0,10/10)
-- UNION (ALL, LEFT, RIGHT)
-- (câu lệnh truy vấn tương tự)

-- Bài 3
-- câu 1
SELECT ten_nha_xuat_ban, dia_chi, dien_thoai FROM `bs_nha_xuat_ban`;

-- câu 2
SELECT ho_ten, dia_chi, dien_thoai
FROM `bs_nguoi_dung`;

-- câu 3
SELECT ten_tac_gia, gioi_thieu
FROM `bs_tac_gia`;

-- câu 4
SELECT ho_ten, dia_chi, email, ngay_sinh, dien_thoai
FROM `bs_nguoi_dung`
ORDER BY ho_ten;

-- câu 5
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia
FROM `bs_sach`
ORDER BY ten_sach, don_gia DESC, gia_bia DESC;

-- câu 6
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia
FROM `bs_sach`
WHERE ten_sach LIKE 'Series%';

-- câu 7
SELECT id, tieu_de, noi_dung_tom_tat, noi_dung_chi_tiet, hinh_dai_dien, trang_thai
FROM `bs_tin_tuc`
WHERE hinh_dai_dien LIKE '%.jpg';

-- câu 8
SELECT *
FROM `bs_sach`
WHERE ten_sach LIKE '%Tái bản%';

-- câu 9
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia
FROM `bs_sach`
WHERE don_gia > 100000
ORDER BY ten_sach;

-- câu 10
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia, id_loai_sach, id_nha_xuat_ban
FROM `bs_sach`
WHERE id_loai_sach = '17' AND id_nha_xuat_ban = '11'
ORDER BY ten_sach;

-- câu 11
SELECT *
FROM `bs_sach`
WHERE trong_luong > 500 OR gia_bia > 150000;

-- câu 12
SELECT *
FROM `bs_sach`
WHERE don_gia BETWEEN 500000 AND 2500000;


-- câu 13
SELECT *
FROM `bs_sach`
WHERE id_loai_sach IN (56, 90, 92) AND trong_luong >= 300
ORDER BY trong_luong;

-- câu 14
SELECT *
FROM `bs_sach`
WHERE id_loai_sach = 45 AND don_gia <= 60000;

-- câu 15
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia
FROM `bs_sach`
WHERE gioi_thieu LIKE '%huyền bí%' OR gioi_thieu LIKE '%du lịch%';

-- câu 16
SELECT *
FROM `bs_sach`
WHERE trong_luong IN (280,350,380);

-- câu 17
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia
FROM `bs_sach`
ORDER BY don_gia DESC
LIMIT 10;

-- câu 18
SELECT ten_sach, sku, gioi_thieu, kich_thuoc, trong_luong, don_gia, gia_bia
FROM `bs_sach`
WHERE gioi_thieu LIKE '%mạnh%' OR gioi_thieu LIKE '%magic%'
ORDER BY don_gia DESC
LIMIT 3;

-- câu 19
SELECT *
FROM `bs_nha_xuat_ban`
WHERE dia_chi IS NOT NULL AND dien_thoai IS NOT NULL AND email IS NOT NULL;

SELECT *
FROM `bs_nha_xuat_ban`
WHERE (email + dia_chi + dien_thoai) IS NOT NULL;

-- câu 20
SELECT *
FROM `bs_sach`
WHERE so_trang > 500 AND trong_luong > 500;



-- Bài 4
-- câu 1
SELECT ten_nha_xuat_ban, email, dia_chi, dien_thoai, COUNT(s.id) as so_sach
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
GROUP BY nxb.id;

-- câu 2
SELECT ls.*, COUNT(s.id)
FROM bs_loai_sach ls JOIN bs_sach s ON ls.id = s.id_loai_sach
WHERE id_loai_cha = 2
GROUP BY ls.id;

-- câu 3
SELECT ten_nha_xuat_ban, dien_thoai, AVG(s.don_gia) as gia_trung_binh
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
GROUP BY nxb.id;

-- câu 4
SELECT ten_nha_xuat_ban, dien_thoai, MAX(s.don_gia) as gia_max
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
GROUP BY nxb.id;

SELECT ten_nha_xuat_ban, dien_thoai, MIN(s.don_gia) as gia_max
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
GROUP BY nxb.id;

-- câu 5
SELECT s.ten_sach, SUM(so_luong) as tong_so_luong
FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
    JOIN bs_don_hang dh ON ctdh.id_don_hang = dh.id
WHERE YEAR(ngay_dat) = 2016
GROUP BY s.id
ORDER BY tong_so_luong DESC
LIMIT 10;

-- câu 6
SELECT s.ten_sach, SUM(thanh_tien) as tong_doanh_thu
FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
    JOIN bs_don_hang dh ON ctdh.id_don_hang = dh.id
WHERE YEAR(ngay_dat) = 2016
GROUP BY s.id
ORDER BY tong_doanh_thu DESC
LIMIT 10;

-- câu 7
SELECT s.ten_sach, SUM(thanh_tien) as tong_doanh_thu
FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
    JOIN bs_don_hang dh ON ctdh.id_don_hang = dh.id
WHERE YEAR(ngay_dat) = 2016 AND MONTH(ngay_dat) = 3
GROUP BY s.id
ORDER BY tong_doanh_thu DESC
LIMIT 3;

-- câu 8
SELECT dh.id, SUM(so_luong) as tong_so_luong, SUM(thanh_tien) as tong_tien
FROM bs_chi_tiet_don_hang ctdh JOIN bs_don_hang dh ON ctdh.id_don_hang = dh.id
GROUP BY dh.id

-- câu 9
SELECT dh.id, SUM(thanh_tien) as tong_tien
FROM bs_chi_tiet_don_hang ctdh JOIN bs_don_hang dh ON ctdh.id_don_hang = dh.id
GROUP BY dh.id
HAVING tong_tien > 500000;

-- câu 10
SELECT tg.*, COUNT(s.id) as tong_so_sach
FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
GROUP BY tg.id;

-- câu 11
SELECT tg.ten_tac_gia, s.ten_sach, MAX(s.gia_bia) as gia_bia_cao_nhat
FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
GROUP BY tg.id;

SELECT tg.ten_tac_gia, s.ten_sach, MIN(s.gia_bia) as gia_bia_cao_nhat
FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
GROUP BY tg.id;

-- câu 12
SELECT tg.ten_tac_gia, COUNT(DISTINCT nxb.id) as so_nha_xuat_ban
FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
    JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
GROUP BY tg.id
ORDER BY so_nha_xuat_ban DESC
LIMIT 3;

-- câu 13
SELECT nxb.ten_nha_xuat_ban, COUNT(DISTINCT s.id) as so_sach
FROM bs_sach s JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
WHERE dia_chi LIKE '%Hà Nội%'
GROUP BY nxb.id
ORDER BY so_sach DESC
LIMIT 5;

-- câu 14
SELECT nxb.ten_nha_xuat_ban, COUNT(DISTINCT tg.id) as so_tac_gia
FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
    JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
GROUP BY nxb.id
ORDER BY so_tac_gia DESC
LIMIT 3;


-- Bài 5
-- câu 1
SELECT *
FROM bs_nha_xuat_ban
WHERE id NOT IN (SELECT nxb.id
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON s.id_nha_xuat_ban = nxb.id
WHERE trong_luong IN (280, 300, 350)
GROUP BY nxb.id);

-- câu 2
SELECT *
FROM bs_nguoi_dung
WHERE id NOT IN (SELECT DISTINCT id_nguoi_dung
FROM bs_don_hang
WHERE id_nguoi_dung IS NOT NULL);

-- câu 3
SELECT DISTINCT nd.id, tai_khoan, ho_ten, tong_tien
FROM bs_nguoi_dung nd JOIN bs_don_hang dh ON nd.id = dh.id_nguoi_dung
WHERE tong_tien = (
    SELECT tong_tien
    FROM bs_don_hang
    ORDER BY tong_tien DESC
    LIMIT 1
);

SELECT DISTINCT nd.id, tai_khoan, ho_ten, tong_tien
FROM bs_nguoi_dung nd JOIN bs_don_hang dh ON nd.id = dh.id_nguoi_dung
WHERE tong_tien = (
    SELECT MAX(tong_tien)
    FROM bs_don_hang
);

-- câu 4
SELECT ls.id, ls.ten_loai_sach, COUNT(s.id) AS so_sach
FROM bs_loai_sach ls LEFT JOIN bs_sach s ON ls.id = s.id_loai_sach
WHERE id_loai_cha = (SELECT id
    FROM bs_loai_sach
    WHERE ten_loai_sach LIKE '%Sách Văn Học - Tiểu Thuyết%')
GROUP BY ls.id;

-- câu 5
SELECT *
FROM bs_sach
WHERE id_nha_xuat_ban = (SELECT id_nha_xuat_ban
FROM bs_sach
WHERE sku = '9780723295273');

-- câu 6
SELECT *
FROM bs_loai_sach
WHERE id NOT IN (SELECT DISTINCT ls.id
    FROM bs_loai_sach ls JOIN bs_sach s ON ls.id = s.id_loai_sach)

-- cau 7
SELECT *
FROM bs_sach
WHERE id_loai_sach = (SELECT id
    FROM (SELECT ls.id, COUNT(DISTINCT s.id) AS so_sach
    FROM bs_loai_sach ls JOIN bs_sach s ON ls.id = s.id_loai_sach
    GROUP BY ls.id
    ORDER BY so_sach DESC
    LIMIT 1) AS temp);

-- câu 8
SELECT *
FROM bs_sach
WHERE id_tac_gia IN (
    SELECT id
    FROM (
        SELECT nxb.id, COUNT(DISTINCT nxb.id) AS so_nha_xuat_ban
        FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
            JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
        GROUP BY tg.id
        HAVING so_nha_xuat_ban = (
            SELECT COUNT(DISTINCT nxb.id) AS so_nha_xuat_ban
            FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
                JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
            GROUP BY tg.id
            ORDER BY so_nha_xuat_ban DESC
            LIMIT 1
        )
        ORDER BY so_nha_xuat_ban DESC
    ) AS temp
);

-- câu 9
SELECT *
FROM bs_sach
WHERE id_nha_xuat_ban IN (SELECT id
    FROM (
        SELECT nxb.id, COUNT(DISTINCT tg.id) AS so_tac_gia
        FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
            JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
        GROUP BY nxb.id
        HAVING so_tac_gia >= (
            SELECT MIN(so_tac_gia)
            FROM (SELECT COUNT(DISTINCT tg.id) AS so_tac_gia
            FROM bs_tac_gia tg JOIN bs_sach s ON tg.id = s.id_tac_gia
                JOIN bs_nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban
            GROUP BY nxb.id
            ORDER BY so_tac_gia DESC
            LIMIT 3) as TEMP
        )
    ) AS temp2
);



-- bài 6
-- câu 1
SELECT ROUND(AVG(tong_tien), -3)
FROM bs_don_hang

-- câu 2
SELECT *
FROM bs_don_hang
WHERE MONTH(ngay_dat) = 2 AND YEAR(ngay_dat) = 2016;

-- câu 3
SELECT *, DATEDIFF(CURDATE(), ngay_dat) as khoang_cach_ngay
FROM bs_don_hang
ORDER BY khoang_cach_ngay DESC

-- câu 4
SELECT UPPER(ten_nha_xuat_ban), dia_chi, dien_thoai
FROM bs_nha_xuat_ban;

-- câu 5
SELECT DISTINCT s.id, ten_sach, CONCAT(s.don_gia, ' VNĐ'), CONCAT(trong_luong, ' gr')
FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
    JOIN bs_don_hang dh ON dh.id = ctdh.id_don_hang


-- câu 6
SELECT CONCAT(nd.id, ten_nguoi_dung) AS id_ten_nguoi_dung, IF(id_loai_user >= 4, 'quản trị', 'thành viên') AS loai_nguoi_dung
FROM bs_nguoi_dung nd JOIN bs_loai_nguoi_dung lnd ON nd.id_loai_user = lnd.id

-- câu 7
SELECT *, IF(gia_bia <= 100000, 'sách giá trung bình', 'sách giá cao' ) as danh_gia
FROM bs_sach
WHERE trong_luong BETWEEN 200 AND 500;

-- câu 8
SELECT *, CONCAT(CASE 
            WHEN DAYOFWEEK(ngay_dat) = 1 THEN 'Chủ nhật' 
            WHEN DAYOFWEEK(ngay_dat) = 2 THEN 'Thứ 2'
            WHEN DAYOFWEEK(ngay_dat) = 3 THEN 'Thứ 3' 
            WHEN DAYOFWEEK(ngay_dat) = 4 THEN 'Thứ 4'
            WHEN DAYOFWEEK(ngay_dat) = 5 THEN 'Thứ 5' 
            WHEN DAYOFWEEK(ngay_dat) = 6 THEN 'Thứ 6'
            WHEN DAYOFWEEK(ngay_dat) = 7 THEN 'Thứ 7' 
        END, ' ngày ', DAY(ngay_dat), ' tháng ', MONTH(ngay_dat), ' năm ', YEAR(ngay_dat)) AS ngay_dat_dinh_dang
FROM bs_don_hang
ORDER BY ngay_dat;

-- câu 9
SELECT *, CASE 
    WHEN DATEDIFF(CURDATE(), thoi_gian_dang_nhap) > 35 THEN 'Đã lâu rồi chưa đăng nhập'
    WHEN DATEDIFF(CURDATE(), thoi_gian_dang_nhap) IS NULL THEN 'Chưa đăng nhập lần nào'
    ELSE 'Không có gì để nói'
END
AS ket_qua
FROM bs_nguoi_dung



-- bài 7
-- câu 1
SELECT s.ten_sach, SUM(so_luong) as thong_ke_so_luong
FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
    JOIN bs_don_hang dh ON dh.id = ctdh.id_don_hang
WHERE MONTH(ngay_dat) = 3 AND YEAR(ngay_dat) = 2016
GROUP BY s.id

-- câu 2
SELECT nxb.ten_nha_xuat_ban, COUNT(s.id) AS so_sach
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON s.id_nha_xuat_ban = nxb.id
GROUP BY nxb.id
HAVING so_sach > 9

-- câu 3
SELECT nxb.ten_nha_xuat_ban, COUNT(s.id) AS so_sach, 
    CASE
        WHEN COUNT(s.id) < 5 THEN 'có ít sách'
        WHEN COUNT(s.id) <= 10 THEN 'có khá nhiều sách'
        ELSE 'có rất nhiều sách'
    END
    AS nhan_xet
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON s.id_nha_xuat_ban = nxb.id
GROUP BY nxb.id

-- câu 4
SELECT tg.ten_tac_gia, COUNT(s.id) AS so_sach, 
    CASE
        WHEN COUNT(s.id) < 5 THEN 'có ít sách'
        WHEN COUNT(s.id) <= 10 THEN 'có khá nhiều sách'
        ELSE 'có rất nhiều sách'
    END
    AS nhan_xet
FROM bs_tac_gia tg JOIN bs_sach s ON s.id_tac_gia = tg.id
GROUP BY tg.id


-- bài 8
-- câu 3
INSERT INTO bs_sach_tam
SELECT *
FROM bs_sach

-- thống kê sách được ban nhiều nhất trong tháng 6 năm 2016
CREATE TABLE IF NOT EXISTS bs_sach_ban_nhieu_nhat_6_2016(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_sach` varchar(255) DEFAULT NULL,
  `id_tac_gia` int(255) DEFAULT NULL,
  `gioi_thieu` text,
  `doc_thu` varchar(255) DEFAULT NULL,
  `id_loai_sach` int(11) DEFAULT NULL,
  `id_nha_xuat_ban` int(11) DEFAULT NULL,
  `so_trang` int(11) DEFAULT NULL,
  `ngay_xuat_ban` varchar(50) DEFAULT NULL,
  `kich_thuoc` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `trong_luong` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `don_gia` int(11) DEFAULT NULL,
  `gia_bia` int(11) DEFAULT NULL,
  `noi_bat` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO bs_sach_ban_nhieu_nhat_6_2016
SELECT id, ten_sach, id_tac_gia, gioi_thieu, doc_thu, id_loai_sach, id_nha_xuat_ban, 
so_trang, ngay_xuat_ban, kich_thuoc, sku, trong_luong, trang_thai, hinh, don_gia,
gia_bia, noi_bat
FROM (
    SELECT s.*, SUM(so_luong) as tong_so_sach_ban
    FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
        JOIN bs_don_hang dh ON dh.id = ctdh.id_don_hang
    WHERE MONTH(ngay_dat) = 6 AND YEAR(ngay_dat) = 2016
    GROUP BY s.id
    ORDER BY tong_so_sach_ban DESC
    LIMIT 5
) AS temp;



--câu 4
CREATE TABLE IF NOT EXISTS bs_sach_nxb_tre(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_sach` varchar(255) DEFAULT NULL,
  `id_tac_gia` int(255) DEFAULT NULL,
  `gioi_thieu` text,
  `doc_thu` varchar(255) DEFAULT NULL,
  `id_loai_sach` int(11) DEFAULT NULL,
  `id_nha_xuat_ban` int(11) DEFAULT NULL,
  `so_trang` int(11) DEFAULT NULL,
  `ngay_xuat_ban` varchar(50) DEFAULT NULL,
  `kich_thuoc` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `trong_luong` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `don_gia` int(11) DEFAULT NULL,
  `gia_bia` int(11) DEFAULT NULL,
  `noi_bat` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO bs_sach_nxb_tre
SELECT *
FROM bs_sach
WHERE id_nha_xuat_ban = (
    SELECT id
    FROM bs_nha_xuat_ban
    WHERE ten_nha_xuat_ban = 'NXB Trẻ'
);



-- bài 9
--câu 1
SELECT *
FROM bs_sach
--WHERE ten_sach = 'Harry Potter 7 Volume Children\'S Paperback Boxed Set'

UPDATE bs_sach
SET don_gia = 999000
--WHERE ten_sach = 'Harry Potter 7 Volume Children\'S Paperback Boxed Set';

-- câu 2
SELECT *
FROM bs_nguoi_dung
WHERE tai_khoan = 'admin';

UPDATE bs_nguoi_dung
SET ho_ten = 'Super User'
WHERE tai_khoan = 'admin'; 

-- câu 3
SELECT *
FROM bs_loai_sach
WHERE ten_loai_sach = 'Combo - Series Sách Đặc Sắc';

UPDATE bs_loai_sach
SET ten_loai_sach = 'Tuyển tập sách đặc sắc'
WHERE ten_loai_sach = 'Combo - Series Sách Đặc Sắc'; 

-- câu 4
SELECT *
FROM bs_sach
WHERE id_nha_xuat_ban = (
    SELECT id
    FROM bs_nha_xuat_ban
    WHERE ten_nha_xuat_ban LIKE '%NXB Kim Đồng%'
);

UPDATE bs_sach
SET don_gia = don_gia - 3000
WHERE id_nha_xuat_ban = (
    SELECT id
    FROM bs_nha_xuat_ban
    WHERE ten_nha_xuat_ban LIKE '%NXB Kim Đồng%'
);

-- câu 5
SELECT id
FROM (
    SELECT s.id, SUM(so_luong) as tong_so_sach_ban
    FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
    GROUP BY s.id
    ORDER BY tong_so_sach_ban DESC
    LIMIT 10
) AS temp

UPDATE bs_sach
SET don_gia = don_gia + don_gia * 0.05
WHERE id IN (
    SELECT id
    FROM (
        SELECT s.id, SUM(so_luong) as tong_so_sach_ban
        FROM bs_sach s JOIN bs_chi_tiet_don_hang ctdh ON s.id = ctdh.id_sach
        GROUP BY s.id
        ORDER BY tong_so_sach_ban DESC
        LIMIT 10
    ) AS temp
);

-- câu 6
ALTER TABLE bs_don_hang
ADD tong_tien_test INT DEFAULT NULL;

SELECT dh.id, SUM(thanh_tien) as tong_tien_test
FROM bs_don_hang dh JOIN bs_chi_tiet_don_hang ctdh ON dh.id = ctdh.id_don_hang
GROUP BY dh.id;

UPDATE bs_don_hang
SET tong_tien_test = (
    SELECT SUM(thanh_tien) as tong_tien_test
    FROM bs_don_hang dh JOIN bs_chi_tiet_don_hang ctdh ON dh.id = ctdh.id_don_hang
    GROUP BY dh.id
);


-- bài 10
-- câu 1
SELECT *
FROm bs_sach
WHERE id = 91;

DELETE FROM bs_sach
WHERE id = 91;

-- câu 2
SELECT *
FROM bs_sach
WHERE id_nha_xuat_ban = (
    SELECT id
    FROM bs_nha_xuat_ban
    WHERE ten_nha_xuat_ban = 'Amazon'
)

DELETE FROM bs_sach
WHERE id_nha_xuat_ban = (
    SELECT id
    FROM bs_nha_xuat_ban
    WHERE ten_nha_xuat_ban = 'Amazon'
)

-- câu 3
SELECT *
FROM bs_sach
WHERE don_gia < 50000

DELETe FROM bs_sach
WHERE don_gia < 50000

-- câu 4
SELECT *
FROM bs_sach
WHERE id_tac_gia = (
    SELECT id
    FROM bs_tac_gia
    WHERE ten_tac_gia = 'Âu Dương Mặc Tâm'
) AND don_gia > 50000

DELETE FROM bs_sach
WHERE id_tac_gia = (
    SELECT id
    FROM bs_tac_gia
    WHERE ten_tac_gia = 'Âu Dương Mặc Tâm'
) AND don_gia > 50000


-- câu 5
SELECT *
FROM bs_sach
WHERE id NOT IN (
    SELECT id
    FROM bs_sach
    WHERE gioi_thieu LIKE '%trẻ%'
);

DELETE FROM bs_sach
WHERE id NOT IN (
    SELECT id
    FROM bs_sach
    WHERE gioi_thieu LIKE '%trẻ%'
);


-- câu 6
SELECT *
FROM bs_nha_xuat_ban
WHERE id NOT IN (
    SELECT nxb.id
    FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
)


SELECT nxb.id
FROM bs_nha_xuat_ban nxb LEFT JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
WHERE s.id IS NULL


DELETE FROM bs_nha_xuat_ban
WHERE id IN (
    SELECT nxb.id
    FROM bs_nha_xuat_ban nxb LEFT JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
    WHERE s.id IS NULL
)


-- bài 11
-- câu 1
SELECT ho_ten, ngay_sinh, dia_chi
FROM nhan_vien

-- câu 2
SELECT ho_ten, cmnd, muc_luong
FROM nhan_vien
WHERE ho_ten LIKE 'N%'

-- câu 3
SELECT ho_ten, cmnd, muc_luong
FROM nhan_vien
ORDER BY muc_luong DESC, ho_ten ASC

-- câu 4
SELECT ho_ten
FROM nhan_vien
WHERE id_don_vi = 1

-- câu 5
SELECT *
FROM phieu_phan_cong
WHERE YEAR(ngay_bat_dau) = 2014 AND MONTH(ngay_bat_dau) = 11;

-- câu 6
SELECT *
FROM phieu_phan_cong
WHERE (id_nhan_vien = (
    SELECT id
    FROM nhan_vien
    WHERE ho_ten = 'Trần thanh thụy Lan'
)
AND YEAR(ngay_bat_dau) = 2014) AND MONTH(ngay_bat_dau) IN (10, 11, 12);


-- câu 7
SELECT *
FROM nhan_vien
WHERE ho_ten LIKE '%Trang%';

-- câu 8
SELECT *
FROM nhan_vien
WHERE muc_luong BETWEEN 5000000 AND 10000000
ORDER BY muc_luong DESC;

-- câu 9
SELECT *
FROM nhan_vien
WHERE muc_luong > 9000000;

-- câu 10
SELECT *, COUNT(kn.id_ngoai_ngu) as so_luong_ngon_ngu
FROM nhan_vien nv JOIN kha_nang kn ON nv.id = kn.id_nhan_vien
GROUP BY nv.id
HAVING so_luong_ngon_ngu >= 2;

-- câu 11
SELECT *, COUNT(kn.id_ngoai_ngu) as so_luong_ngon_ngu
FROM nhan_vien nv JOIN kha_nang kn ON nv.id = kn.id_nhan_vien
WHERE id_ngoai_ngu IN (SELECT id
    FROM ngoai_ngu
    WHERE ten IN ('Anh', 'Pháp', 'Đức')
)
GROUP BY nv.id
HAVING so_luong_ngon_ngu >= 3;

-- câu 12
SELECT dv.*, COUNT(nv.id) AS tong_so_nhan_vien
FROM nhan_vien nv JOIN don_vi dv ON nv.id_don_vi = dv.id
GROUP BY dv.id;

-- câu 13
SELECT dv.*, AVG(muc_luong) AS luong_trung_binh
FROM nhan_vien nv JOIN don_vi dv ON nv.id_don_vi = dv.id
WHERE ten = 'Đơn vị C'
GROUP BY dv.id;

-- câu 14
SELECT lcv.*, COUNT(ppc.id) as tong_so_luong
FROM loai_cong_viec lcv JOIN phieu_phan_cong ppc ON lcv.id = ppc.id_loai_cong_viec
GROUP BY lcv.id
ORDER BY tong_so_luong DESC
LIMIT 1;

-- câu 15
SELECT nv.*, YEAR(CURDATE()) - YEAR(ngay_sinh) as tuoi
FROM nhan_vien nv JOIN don_vi dv ON nv.id_don_vi = dv.id
WHERE dv.ten = 'Đơn vị D'
ORDER BY tuoi
LIMIT 1

-- câu 16
SELECT dv.*, MIN(muc_luong), MAX(muc_luong)
FROM nhan_vien nv JOIN don_vi dv ON nv.id_don_vi = dv.id
GROUP BY dv.id

-- câu 17
SELECT lcv.*, nc.ten
FROM loai_cong_viec lcv JOIN yeu_cau yc ON lcv.id = yc.id_loai_cong_viec
    JOIN ngoai_ngu nc ON nc.id = yc.id_ngoai_ngu
WHERE nc.ten = 'Brazil'

-- câu 18
SELECT lcv.*, COUNT(yc.id_ngoai_ngu) AS so_ngoai_ngu_yeu_cau
FROM loai_cong_viec lcv JOIN yeu_cau yc ON lcv.id = yc.id_loai_cong_viec
GROUP BY lcv.id
HAVING so_ngoai_ngu_yeu_cau = 1;

-- câu 19
SELECT *
FROM (
    SELECT temp.id
    FROM (
        SELECT nv.id, nv.ho_ten, kn.id_ngoai_ngu
        FROM nhan_vien nv JOIN kha_nang kn ON nv.id = kn.id_nhan_vien
        WHERE nv.id = 10
    ) temp RIGHT JOIN
    (
        SELECT lcv.id, lcv.ten, yc.id_ngoai_ngu
        FROM loai_cong_viec lcv JOIN yeu_cau yc ON lcv.id = yc.id_loai_cong_viec
        WHERE lcv.id = 1
    ) temp2
    ON temp.id_ngoai_ngu = temp2.id_ngoai_ngu
    WHERE temp.id IS NULL
) tt
JOIN
(
    SELECT nv.id, ppc.ngay_bat_dau, ppc.so_ngay, ADDDATE(ppc.ngay_bat_dau, ppc.so_ngay) as ngay_ket_thuc, 
        '2015-01-20' as ngay_start_yc, ADDDATE('2015-01-20', 2) as ngay_stop_yc,
        IF((ppc.ngay_bat_dau > '2015-01-20' AND ADDDATE(ppc.ngay_bat_dau, ppc.so_ngay) < ADDDATE('2015-01-20', 2)), 'FAIL', 'TRUE') as result
    FROM nhan_vien nv JOIN phieu_phan_cong ppc ON nv.id = ppc.id_nhan_vien
    WHERE nv.id = 10
    HAVING result = 'FAIL'
) tt2
ON tt.id = tt2.id
