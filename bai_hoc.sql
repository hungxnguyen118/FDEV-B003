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
SELECT ten_nha_xuat_ban, dien_thoai, AVG(s.id) as gia_trung_binh
FROM bs_nha_xuat_ban nxb JOIN bs_sach s ON nxb.id = s.id_nha_xuat_ban
GROUP BY nxb.id;



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
    LIMIT 1;
);
