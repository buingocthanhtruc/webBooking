<?php
function pdo_get_connection()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $servername = "103.169.35.190";
    $username = "user_book";
    $password = "Trucdev7204#";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=DB_BOOKING", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// ham thuc thi cau lenh 
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_execute_update($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            echo '<script>alert("Cập nhật trạng thái thành công !!!")</script>';
            echo "<script>location.href = 'index.php'</script>";
        } else {
            // echo "Không có gì được cập nhật!";
            echo '<script>alert("Bàn này đã được Book, không thể đồng ý bill này !!!")</script>';
            echo "<script>location.href = 'index.php'</script>";
            return "SAI";
            // die();
        }
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
pdo_get_connection();
