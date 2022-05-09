<?php
require '../database/Database.php';

date_default_timezone_set("Asia/Ho_Chi_Minh");
$db = new Database();

// User //
if (isset($_POST['addUser'])) {
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $checkEmail = $db->checkEmail($user_email);
    $checkPhone = $db->checkPhone($user_phone);


    if ($checkEmail > 0) {
        $registerStatusError = "Email Đã Tồn Tại";
    } elseif ($checkPhone > 0) {
        $registerStatusError = "Số Điện Thoại Đã Tồn Tại";
    } else {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_gender = $_POST['user_gender'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_avatar = '../uploads/' . $_FILES['user_avatar']['name'];
        move_uploaded_file($_FILES['user_avatar']['tmp_name'], '../uploads/' . $_FILES['user_avatar']['name']);
        $db->addUser($user_name, $user_email, $user_pass, $user_gender, $user_address, $user_phone, $user_avatar);
    }
}


if (isset($_GET['deleteUser'])) {
    $user_id = $_GET['deleteUser'];
    $db->deleteUser($user_id);
    header('location:../admin/users.php');

}

$user_update = false;
$user_id = "";
$user_name = "";
$user_email = "";
$user_pass = "";
$user_gender = "";
$user_address = "";
$user_phone = "";
$user_avatar = "";

if (isset($_GET['editUser'])) {
    $user_id = $_GET['editUser'];
    $rowUser = $db->getUserById($user_id);
    $user_id = $rowUser['user_id'];
    $user_name = $rowUser['user_name'];
    $user_email = $rowUser['user_email'];
    $user_pass = $rowUser['user_pass'];
    $user_gender = $rowUser['user_gender'];
    $user_address = $rowUser['user_address'];
    $user_phone = $rowUser['user_phone'];
    $user_avatar = $rowUser['user_avatar'];
    $user_update = true;
}


if (isset($_POST['updateUser'])) {
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $checkEmail = $db->checkEmail($user_email);
    $checkPhone = $db->checkPhone($user_phone);


    if ($checkEmail > 0) {
        $registerStatusError = "Email Đã Tồn Tại";
    } elseif ($checkPhone > 0) {
        $registerStatusError = "Số Điện Thoại Đã Tồn Tại";
    } else {
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_gender = $_POST['user_gender'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_avatar = $_POST['user_avatar'];
        $user_avatar_Old = $_POST['user_avatar_Old'];

        if (isset($_FILES['user_avatar']['name']) && ($_FILES['user_avatar']['name'] != "")) {
            $user_avatar = "../uploads/" . $_FILES['user_avatar']['name'];
            unlink($user_avatar_Old);
            move_uploaded_file($_FILES['user_avatar']['tmp_name'], $user_avatar);
        } else {
            $user_avatar = $user_avatar_Old;
        }

        $db->updateUser($user_id, $user_name, $user_email, $user_pass, $user_gender, $user_address, $user_phone, $user_avatar);
        header('location:../admin/users.php');

    }
}


if (isset($_GET['detailUser'])) {
    $user_id = $_GET['detailUser'];
    $row = $db->getUserById($user_id);

}


// End User //


// Login, Register//

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $row = $db->login($user_email, $user_pass);

    $checkEmail = $db->checkEmail($user_email);
    $checkPass = $db->checkPassword($user_email, $user_pass);

    if ($checkEmail < 1) {
        $statusLogin = "Email Không Tồn Tại";
    } elseif ($checkPass < 1) {
        $statusLogin = "Mật khẩu Sai";
    } elseif ($row['user_role'] == "member" && $user_email == $row['user_email'] && $user_pass == $row['user_pass']) {
        $_SESSION["loged"] = true;
        $_SESSION["member"] = true;
        header("Location:../client");
    } elseif ($row['user_role'] == "admin" && $user_email == $row['user_email'] && $user_pass == $row['user_pass']) {
        $_SESSION["loged"] = true;
        $_SESSION["admin"] = true;
        header("Location:../client/");
    }


    if (isset($_SESSION["loged"])) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_pass = $row['user_pass'];
        $user_gender = $row['user_gender'];
        $user_address = $row['user_address'];
        $user_phone = $row['user_phone'];
        $user_avatar = $row['user_avatar'];

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_pass'] = $user_pass;
        $_SESSION['user_gender'] = $user_gender;
        $_SESSION['user_address'] = $user_address;
        $_SESSION['user_phone'] = $user_phone;
        $_SESSION['user_avatar'] = $user_avatar;
        unset($_SESSION['register']);
    }
}


if (isset($_POST['register'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_repass = $_POST['user_repass'];
    $user_gender = $_POST['user_gender'];
    $user_address = $_POST['user_address'];
    $user_phone = $_POST['user_phone'];
    $user_avatar = '../uploads/' . $_FILES['user_avatar']['name'];
    $row = $db->loadUsers();
    $checkEmail = $db->checkEmail($user_email);
    $checkPass = $db->checkPassword($user_email, $user_pass);
    $checkPhone = $db->checkPhone($user_phone);

    if ($user_pass != $user_repass) {
        $registerStatusError = "Mât Khẩu Không khớp";
        exit();
    } else {
        if ($checkEmail > 0) {
            $registerStatusError = "Email Đã Tồn Tại";
        } elseif ($checkPhone > 0) {
            $registerStatusError = "Số Điện Thoại Đã Tồn Tại";
        } else {
            move_uploaded_file($_FILES['user_avatar']['tmp_name'], '../uploads/' . $_FILES['user_avatar']['name']);
            $db->addUser($user_name, $user_email, $user_pass, $user_gender, $user_address, $user_phone, $user_avatar);
            $_SESSION['register'] = 1;
            header("Location: ../client/login.php");
        }
    }

}

// End Login, Register //


// Brands //
$brand_update = false;
$brand_id = "";
$brand_name = "";
$brand_image = "";

if (isset($_POST['addBrand'])) {
    $brand_name = $_POST['brand_name'];
    $checkBrand = $db->checkBrand($brand_name);
    if ($checkBrand > 0) {
        $statusCheckBrand = "Hãng Này Đã Tồn Tại";
    } else {
        $brand_name = $_POST['brand_name'];
        $brand_image = '../uploads/' . $_FILES['brand_image']['name'];
        move_uploaded_file($_FILES['brand_image']['tmp_name'], '../uploads/' . $_FILES['brand_image']['name']);
        $db->addBrand($brand_name, $brand_image);
        header('location:../admin/brands.php');
    }
}

if (isset($_GET['deleteBrand'])) {
    $brand_id = $_GET['deleteBrand'];
    $db->deleteBrand($brand_id);
    header("Location:../admin/brands.php");

}


if (isset($_GET['editBrand'])) {
    $brand_id = $_GET['editBrand'];
    $rowBrand = $db->getBrandById($brand_id);
    $brand_id = $rowBrand['brand_id'];
    $brand_name = $rowBrand['brand_name'];
    $brand_image = $rowBrand['brand_image'];

    $brand_update = true;
}


if (isset($_POST['updateBrand'])) {
    $brand_name = $_POST['brand_name'];
    $checkBrand = $db->checkBrand($brand_name);
    if ($checkBrand > 0) {
        $statusCheckBrand = "Hãng Này Đã Tồn Tại";
    } else {
        $brand_name = $_POST['brand_name'];
        $brand_image = $_POST['brand_image'];
        $brand_image_Old = $_POST['brand_image_Old'];

        if (isset($_FILES['brand_image']['name']) && ($_FILES['brand_image']['name'] != "")) {
            $brand_image = "../uploads/" . $_FILES['brand_image']['name'];
            unlink($brand_image_Old);
            move_uploaded_file($_FILES['brand_image']['tmp_name'], $brand_image);
        } else {
            $brand_image = $brand_image_Old;
        }

        $db->updateBrand($brand_id, $brand_name, $brand_image);
        header('location:../admin/brands.php');

    }
}

// End Brands //


// StatusProducts //
$statusProduct_update = false;
$statusProduct_name = "";

if (isset($_POST['addStatusProduct'])) {
    $statusProduct_name = $_POST['statusProduct_name'];
    $checkStatusProduct = $db->checkStatusProducts($statusProduct_name);
    if ($checkStatusProduct > 0) {
        $statusCheckProductError = " Trạng Thái Này Đã Tồn Tại";
    } else {
        $statusProduct_name = $_POST['statusProduct_name'];
        $db->addStatusProduct($statusProduct_name);
    }
}


if (isset($_GET['deleteStatusProduct'])) {
    $statusProduct_id = $_GET['deleteStatusProduct'];
    $db->deleteStatusProduct($statusProduct_id);
    header("Location:../admin/statusProducts.php");

}


if (isset($_GET['editStatusProduct'])) {
    $statusProduct_id = $_GET['editStatusProduct'];
    $rowStatusProduct = $db->getStatusProduct($statusProduct_id);
    $statusProduct_id = $rowStatusProduct['statusProduct_id'];
    $statusProduct_name = $rowStatusProduct['statusProduct_name'];
    $statusProduct_update = true;
}


if (isset($_POST['updateStatusProduct'])) {
    $statusProduct_name = $_POST['statusProduct_name'];
    $checkStatusProduct = $db->checkStatusProducts($statusProduct_name);
    if ($checkStatusProduct > 0) {
        $statusCheckProductError = " Trạng Thái Này Đã Tồn Tại";
    } else {
        $statusProduct_name = $_POST['statusProduct_name'];
        $db->updateStatusProduct($statusProduct_id, $statusProduct_name);
        header('location:../admin/statusProducts.php');
    }
}

// End StatusProducts //


// Products //

$product_update = false;
$product_id = "";
$product_name = "";
$product_image1 = "";
$product_image2 = "";
$product_image3 = "";
$product_price = "";
$product_sale = "";
$product_describe = "";
$product_detail = "";
$product_amountProduct = "";
$brand_id = "";
$statusProduct_id = "";


if (isset($_POST['addProduct'])) {
    $product_name = $_POST['product_name'];
    $checkProduct = $db->checkProduct($product_name);

    if ($checkProduct > 0) {
        $statusCheckProduct = "Sản Phẩm Này Đã Tồn Tại";
    } else {

        $product_name = $_POST['product_name'];
        $product_image1 = '../uploads/' . $_FILES['product_image1']['name'];
        $product_image2 = '../uploads/' . $_FILES['product_image2']['name'];
        $product_image3 = '../uploads/' . $_FILES['product_image3']['name'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_describe = $_POST['product_describe'];
        $product_detail = $_POST['product_detail'];
        $product_amountProduct = $_POST['product_amountProduct'];
        $product_dateUpdate = date("Y-m-d");
        $brand_id = $_POST['brand_id'];
        $statusProduct_id = $_POST['statusProduct_id'];

        move_uploaded_file($_FILES['product_image1']['tmp_name'], '../uploads/' . $_FILES['product_image1']['name']);
        move_uploaded_file($_FILES['product_image2']['tmp_name'], '../uploads/' . $_FILES['product_image2']['name']);
        move_uploaded_file($_FILES['product_image3']['tmp_name'], '../uploads/' . $_FILES['product_image3']['name']);

        $db->addProduct($product_name, $product_image1, $product_image2, $product_image3, $product_price, $product_sale, $product_describe, $product_detail, $product_amountProduct, $product_dateUpdate, $brand_id, $statusProduct_id);
        header('location:../admin/products.php');

    }
}

if (isset($_GET['deleteProduct'])) {
    $product_id = $_GET['deleteProduct'];
    $db->deleteProduct($product_id);
    header("Location:../admin/products.php");

}


if (isset($_GET['editProduct'])) {
    $product_id = $_GET['editProduct'];
    $rowProduct = $db->getProduct($product_id);
    $product_name = $rowProduct['product_name'];
    $product_image1 = $rowProduct['product_image1'];
    $product_image2 = $rowProduct['product_image2'];
    $product_image3 = $rowProduct['product_image3'];
    $product_price = $rowProduct['product_price'];
    $product_sale = $rowProduct['product_sale'];
    $product_describe = $rowProduct['product_describe'];
    $product_detail = $rowProduct['product_detail'];
    $product_amountProduct = $rowProduct['product_amountProduct'];
    $product_update = true;
}


if (isset($_POST['updateProduct'])) {
    $product_name = $_POST['product_name'];
    $checkProduct = $db->checkProduct($product_name);

    if ($checkProduct > 0) {
        $statusCheckProduct = "Sản Phẩm Này Đã Tồn Tại";
    } else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_describe = $_POST['product_describe'];
        $product_detail = $_POST['product_detail'];
        $product_amountProduct = $_POST['product_amountProduct'];
        $brand_id = $_POST['brand_id'];
        $statusProduct_id = $_POST['statusProduct_id'];
        $product_image1_Old = $_POST['product_image1_Old'];
        $product_image2_Old = $_POST['product_image2_Old'];
        $product_image3_Old = $_POST['product_image3_Old'];

        if (isset($_FILES['product_image1']['name']) && ($_FILES['product_image1']['name'] != "")) {
            $product_image1 = "../uploads/" . $_FILES['product_image1']['name'];
            unlink($product_image1_Old);
            move_uploaded_file($_FILES['product_image1']['tmp_name'], $product_image1);
        } else {
            $product_image1 = $product_image1_Old;
        }
        if (isset($_FILES['product_image2']['name']) && ($_FILES['product_image2']['name'] != "")) {
            $product_image2 = "../uploads/" . $_FILES['product_image2']['name'];
            unlink($product_image2_Old);
            move_uploaded_file($_FILES['product_image2']['tmp_name'], $product_image2);
        } else {
            $product_image2 = $product_image2_Old;
        }
        if (isset($_FILES['product_image3']['name']) && ($_FILES['product_image3']['name'] != "")) {
            $product_image3 = "../uploads/" . $_FILES['product_image3']['name'];
            unlink($product_image3_Old);
            move_uploaded_file($_FILES['product_image3']['tmp_name'], $product_image3);
        } else {
            $product_image3 = $product_image3_Old;
        }
        $db->updateProduct($product_id, $product_name, $product_image1, $product_image2, $product_image3, $product_price, $product_sale, $product_describe, $product_detail, $product_amountProduct, $brand_id, $statusProduct_id);
        header('location:../admin/products.php');
    }
}

if (isset($_GET['productDetail'])) {
    $product_id = $_GET['productDetail'];
    $rowProductDetail = $db->getProduct($product_id);
    $brand_id = $rowProductDetail['brand_id'];
}

// End Products//

// Color Product //

$colorProduct_update = false;
$colorProduct_id = "";
$colorProduct_name = "";
$colorProduct_image = "";


if (isset($_POST['addColorProductDetail'])) {
    $colorProduct_name = $_POST['colorProduct_name'];
    $product_id = $_POST['product_id'];
    $checkColorProduct = $db->checkColorProduct($colorProduct_name, $product_id);
    if ($checkColorProduct > 0) {
        $statusColorProduct = "Màu Này Đã Tồn Tại Cho Sản Phẩm Này";
    } else {
        $colorProduct_name = $_POST['colorProduct_name'];
        $product_id = $_POST['product_id'];
        $colorProduct_image = '../uploads/' . $_FILES['colorProduct_image']['name'];
        move_uploaded_file($_FILES['colorProduct_image']['tmp_name'], '../uploads/' . $_FILES['colorProduct_image']['name']);
        $db->addColorProductDetail($colorProduct_name, $colorProduct_image, $product_id);
        header("Refresh:0");
    }
}


if (isset($_POST['deleteColorProductById'])) {
    $colorProduct_id = $_POST['colorProduct_id'];
    $db->deleteColorProductDetail($colorProduct_id);
}


if (isset($_POST['editColorProductById'])) {
    $colorProduct_id = $_POST['colorProduct_id'];
    $rowColorProduct = $db->getColorProductDetail($colorProduct_id);
    $colorProduct_id = $rowColorProduct['colorProduct_id'];
    $colorProduct_name = $rowColorProduct['colorProduct_name'];
    $colorProduct_image = $rowColorProduct['colorProduct_image'];
    $colorProduct_update = true;
}


if (isset($_POST['updateColorProductDetail'])) {
    $colorProduct_name = $_POST['colorProduct_name'];
    $product_id = $_POST['product_id'];
    $checkColorProduct = $db->checkColorProduct($colorProduct_name, $product_id);
    if ($checkColorProduct > 0) {
        $statusColorProduct = "Màu Này Đã Tồn Tại Cho Sản Phẩm Này";
    } else {
        $colorProduct_id = $_POST['colorProduct_id'];
        $colorProduct_name = $_POST['colorProduct_name'];
        $colorProduct_image_Old = $_POST['colorProduct_image_Old'];
        $rowColorProduct = $db->getColorProductDetail($colorProduct_id);

        $product_id = $rowColorProduct['product_id'];

        if (isset($_FILES['colorProduct_image']['name']) && ($_FILES['colorProduct_image']['name'] != "")) {
            $colorProduct_image = "../uploads/" . $_FILES['colorProduct_image']['name'];
            unlink($colorProduct_image_Old);
            move_uploaded_file($_FILES['colorProduct_image']['tmp_name'], $colorProduct_image);
        } else {
            $colorProduct_image = $colorProduct_image_Old;
        }

        $db->updateColorProduct($colorProduct_id, $colorProduct_name, $colorProduct_image, $product_id);
        header("location: ../admin/colorProductDetail.php?detailColorProduct=" . $product_id);
    }
}


if (isset($_GET['detailColorProduct'])) {
    $product_id = $_GET['detailColorProduct'];
}

if (isset($_GET['deleteColorProduct'])) {
    $product_id = $_GET['deleteColorProduct'];
    $db->deleteColorProduct($product_id);
    header('location:../admin/colorProducts.php');
}

// End Color Product //


// MemoryProduct //
$memoryProduct_update = false;
$memoryProduct_id = "";
$memoryProduct_name = "";
$memoryProduct_price = "";

if (isset($_GET['detailMemoryProduct'])) {
    $product_id = $_GET['detailMemoryProduct'];
}


if (isset($_POST['addMemoryProductDetail'])) {
    $memoryProduct_name = $_POST['memoryProduct_name'];
    $product_id = $_POST['product_id'];
    $checkMemoryProduct = $db->checkMemoryProduct($memoryProduct_name,$product_id);
    if ($checkMemoryProduct>0){
        $statusCheckMemoryProduct = "Dùng Lượng Này Đã Tồn Tại Cho Sản Phẩm Này";
    } else {
    $memoryProduct_name = $_POST['memoryProduct_name'];
    $memoryProduct_price = $_POST['memoryProduct_price'];
    $product_id = $_POST['product_id'];
    $db->addMemoryProduct($memoryProduct_name, $memoryProduct_price, $product_id);
    header("Refresh:0");
}}


if (isset($_GET['deleteMemoryProduct'])) {
    $product_id = $_GET['deleteMemoryProduct'];
    $db->deleteMemoryProduct($product_id);
    header('location:../admin/memoryProducts.php');
}

if (isset($_POST['deleteMemoryProductDetail'])) {
    $memoryProduct_id = $_POST['memoryProduct_id'];
    $db->deleteMemoryProductDetail($memoryProduct_id);
}


if (isset($_POST['editMemoryProductDetail'])) {
    $memoryProduct_id = $_POST['memoryProduct_id'];
    $rowMemoryProduct = $db->getMemoryProductDetail($memoryProduct_id);
    $product_id = $rowMemoryProduct['product_id'];
    $memoryProduct_id = $rowMemoryProduct['memoryProduct_id'];
    $memoryProduct_name = $rowMemoryProduct['memoryProduct_name'];
    $memoryProduct_price = $rowMemoryProduct['memoryProduct_price'];
    $memoryProduct_update = true;
}


if (isset($_POST['updateMemoryProductDetail'])) {
$memoryProduct_name = $_POST['memoryProduct_name'];
$product_id = $_POST['product_id'];
$checkMemoryProduct = $db->checkMemoryProduct($memoryProduct_name,$product_id);
if ($checkMemoryProduct>0){
    $statusCheckMemoryProduct = "Dùng Lượng Này Đã Tồn Tại Cho Sản Phẩm Này";
} else {
    $memoryProduct_id = $_POST['memoryProduct_id'];
    $memoryProduct_name = $_POST['memoryProduct_name'];
    $memoryProduct_price = $_POST['memoryProduct_price'];
    $product_id = $_POST['product_id'];
    $db->updateMemoryProduct($memoryProduct_id, $memoryProduct_name, $memoryProduct_price, $product_id);
    header("location: ../admin/memoryProductDetail.php?detailMemoryProduct=" . $product_id);
}}

// End MemoryProduct //


// SlideShow //

$slideShow_update = false;
$slideShow_image = "";
$slideShow_name = "";


if (isset($_POST['addSlideShow'])) {
    $slideShow_name = $_POST['slideShow_name'];
    $slideShow_image = '../uploads/' . $_FILES['slideShow_image']['name'];
    move_uploaded_file($_FILES['slideShow_image']['tmp_name'], '../uploads/' . $_FILES['slideShow_image']['name']);
    $db->addSlideShow($slideShow_image, $slideShow_name);
    header('location:../admin/slideShow.php');

}


if (isset($_GET['deleteSlideShow'])) {
    $slideShow_id = $_GET['deleteSlideShow'];
    $db->deleteSlideShow($slideShow_id);
    header("Location:../admin/slideShow.php");

}


if (isset($_GET['editSlideShow'])) {
    $slideShow_id = $_GET['editSlideShow'];
    $rowSlideShow = $db->getSlideShow($slideShow_id);
    $slideShow_id = $rowSlideShow['slideShow_id'];
    $slideShow_name = $rowSlideShow['slideShow_name'];
    $slideShow_image = $rowSlideShow['slideShow_image'];

    $slideShow_update = true;
}

if (isset($_POST['updateSlideShow'])) {
    $slideShow_name = $_POST['slideShow_name'];
    $slideShow_image = $_POST['slideShow_image'];
    $slideShow_image_Old = $_POST['slideShow_image_Old'];

    if (isset($_FILES['slideShow_image']['name']) && ($_FILES['slideShow_image']['name'] != "")) {
        $slideShow_image = "../uploads/" . $_FILES['slideShow_image']['name'];
        unlink($slideShow_image_Old);
        move_uploaded_file($_FILES['slideShow_image']['tmp_name'], $slideShow_image);
    } else {
        $slideShow_image = $slideShow_image_Old;
    }

    $db->updateSlideShow($slideShow_id, $slideShow_image, $slideShow_name);
    header('location:../admin/slideShow.php');
}


// End SlideShow //


// inFoShop //

$info_update = false;
$infor_logo = "";
$infor_address = "";
$infor_email = "";
$infor_phone = "";
$infor_copyright = "";


if (isset($_POST['addinfo'])) {
    $infor_logo = '../uploads/' . $_FILES['infor_logo']['name'];
    $infor_address = $_POST['infor_address'];
    $infor_email = $_POST['infor_email'];
    $infor_phone = $_POST['infor_phone'];
    $infor_copyright = $_POST['infor_copyright'];
    move_uploaded_file($_FILES['infor_logo']['tmp_name'], '../uploads/' . $_FILES['infor_logo']['name']);
    $db->addinfo($infor_logo, $infor_address, $infor_email, $infor_phone, $infor_copyright);
    header('location:../admin/info.php');

}


if (isset($_GET['deleteInfo'])) {
    $infor_id = $_GET['deleteInfo'];
    $db->deleteInfo($infor_id);
    header("Location:../admin/info.php");

}

if (isset($_GET['editInfo'])) {
    $infor_id = $_GET['editInfo'];
    $rowInfo = $db->getInfo($infor_id);
    $infor_id = $rowInfo['infor_id'];
    $infor_logo = $rowInfo['infor_logo'];
    $infor_address = $rowInfo['infor_address'];
    $infor_email = $rowInfo['infor_email'];
    $infor_phone = $rowInfo['infor_phone'];
    $infor_copyright = $rowInfo['infor_copyright'];

    $info_update = true;
}


if (isset($_POST['updateinfo'])) {
    $infor_logo = $_POST['infor_logo'];
    $infor_address = $_POST['infor_address'];
    $infor_email = $_POST['infor_email'];
    $infor_phone = $_POST['infor_phone'];
    $infor_copyright = $_POST['infor_copyright'];
    $infor_logo_Old = $_POST['infor_logo_Old'];

    if (isset($_FILES['infor_logo']['name']) && ($_FILES['infor_logo']['name'] != "")) {
        $infor_logo = "../uploads/" . $_FILES['infor_logo']['name'];
        unlink($infor_logo_Old);
        move_uploaded_file($_FILES['infor_logo']['tmp_name'], $infor_logo);
    } else {
        $infor_logo = $infor_logo_Old;
    }

    $db->updateInfo($infor_id, $infor_logo, $infor_address, $infor_email, $infor_phone, $infor_copyright);
    header('location:../admin/info.php');
}


// End InfoShop //


// Fliter //
//click xóa tùy chọn lọc //

if (isset($_POST['deleteOptionFilter'])) {
    header('location:../client/store.php');
}
//


if (isset($_POST['searchProductProduct'])) {
    $_SESSION['searchProductValue'] = $_POST['searchProductValue'];
    header('location:../client/store.php');
}
if (isset($_GET['deleteKeyWord'])) {
    $_SESSION['searchProductValue'] = '';
    header('location:../client/store.php');
}

// End Fliter //


// Comment //


$comment_content = "";
$comment_image = "";
$update_comment = false;

if (isset($_FILES['comment_image'])) {
    $comment_content = $_POST['comment_content'];
    $comment_date = date("Y-m-d H:i:s");
    $comment_image = '../uploads/' . $_FILES['comment_image']['name'];
    $comment_parent = 0;
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    move_uploaded_file($_FILES['comment_image']['tmp_name'], '../uploads/' . $_FILES['comment_image']['name']);
    $db->addComment($comment_content, $comment_date, $comment_image, $comment_parent, $product_id, $user_id);
}

if (isset($_FILES['reComment_image'])) {
    $reComment_content = $_POST['reComment_content'];
    $comment_date = date("Y-m-d H:i:s");
    $reComment_image = '../uploads/' . $_FILES['reComment_image']['name'];
    $comment_parent = $_POST['comment_parent'];
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    move_uploaded_file($_FILES['reComment_image']['tmp_name'], '../uploads/' . $_FILES['reComment_image']['name']);
    $db->addComment($reComment_content, $comment_date, $reComment_image, $comment_parent, $product_id, $user_id);
}


if (isset($_POST['deleteComment'])) {
    $comment_id = $_POST['comment_id'];
    $db->deletecomment($comment_id);
}


if (isset($_POST['editComment'])) {
    $comment_id = $_POST['comment_id'];
    $rowComment = $db->getComment($comment_id);
    $comment_content = $rowComment['comment_content'];
    $comment_image = $rowComment['comment_image'];
    $update_comment = true;
}

if (isset($_FILES['updateComment_image'])) {
    $comment_id = $_POST['comment_id'];
    $comment_content = $_POST['comment_content'];
    $comment_image_Old = $_POST['comment_image_Old'];
    if (isset($_FILES['updateComment_image']['name']) && ($_FILES['updateComment_image']['name'] != "")) {
        $comment_image = "../uploads/" . $_FILES['updateComment_image']['name'];
        unlink($comment_image_Old);
        move_uploaded_file($_FILES['updateComment_image']['tmp_name'], $comment_image);
    } else {
        $comment_image = $comment_image_Old;
    }

    $db->updateComment($comment_id, $comment_content, $comment_image);
}


if (isset($_GET['deletecommentByProduct'])) {
    $product_id = $_GET['deletecommentByProduct'];
    $db->deletecommentByProduct($product_id);
    header("Location: ../admin/comments.php");
}


if (isset($_POST['deleteCommentById'])) {
    $comment_id = $_POST['comment_id'];
    $db->deletecomment($comment_id);
}
// End Comment //


// cart //
if (isset($_POST['addCart'])) {
    $_SESSION['cart'][$product_id] = array(
        'product_id' => $product_id,
        'order_qtyProduct' => $_POST['order_qtyProduct'],
        'order_memoryProduct_name' => $_POST['order_memoryProduct_name'],
        'order_colorProduct_name' => $_POST['order_colorProduct_name'],
        'order_totalProduct' => $_POST['order_qtyProduct'] * $_POST['product_sale'],
        'user_id' => $_SESSION['user_id']
    );
}


if (isset($_POST['acceptBuy'])) {
    header("Location: ../client/billOrderSuccess.php");
}


if (isset($_GET['orderSuccess'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $dateBuy = date("Y-m-d H:i:s");
        $db->acceptBuy($value['product_id'], $value['order_qtyProduct'], $value['order_memoryProduct_name'], $value['order_colorProduct_name'], $value['order_totalProduct'], $value['user_id'], $dateBuy);
    }
    unset($_SESSION['cart']);
    header("Location: ../client/store.php");
}


if (isset($_POST['deleteProductCart'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
}


if (isset($_POST['deleteOrderById'])) {
    $order_id = $_POST['order_id'];
    $db->deleteOrderById($order_id);
}
$order_update = false;

if (isset($_POST['updateOrderById'])) {
    $order_id = $_POST['order_id'];
    $order_orderStatus = "Đã Duyệt";
    $rowOrder = $db->updateOrder($order_id, $order_orderStatus);
}

// End cart //


// ChangeInfo With Member //

if (isset($_POST['changeInfoUser'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_address = $_POST['user_address'];
    $user_avatar_Old = $_POST['user_avatar_Old'];

    if (isset($_FILES['user_avatar']['name']) && ($_FILES['user_avatar']['name'] != "")) {
        $user_avatar = "../uploads/" . $_FILES['user_avatar']['name'];
        unlink($user_avatar_Old);
        move_uploaded_file($_FILES['user_avatar']['tmp_name'], $user_avatar);
    } else {
        $user_avatar = $user_avatar_Old;
    }

    $db->changeInfoUser($user_id, $user_name, $user_phone, $user_email, $user_address, $user_avatar);

}


// End ChangeInfo With Member //


?>

