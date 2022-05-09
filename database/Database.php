<?php
session_start();


class Database
{
    private $dsn = "mysql:host=localhost;dbname=longnvph07586_du_an_1";
    private $user = "root";
    private $pass = "";
    public $connection;

    public function __construct()
    {

        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

// User //

    public function totalRowCount()
    {
        $sqlUser = "select * from users";
        $stmtUser = $this->connection->prepare($sqlUser);
        $stmtUser->execute();
        $t_rows = $stmtUser->rowCount();
        return $t_rows;
    }

    public function readUser()
    {
        $dataAllUser = array();
        $sqlUser = "select * from users";
        $stmtUser = $this->connection->prepare($sqlUser);
        $stmtUser->execute();
        $resultUser = $stmtUser->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultUser as $rowUser
        ) {
            $dataAllUser[] = $rowUser;
        }
        return $dataAllUser;
    }

    public function getUserById($user_id)
    {
        $sqlUser = "select * from users where user_id=:user_id";
        $stmtUser = $this->connection->prepare($sqlUser);
        $stmtUser->execute(['user_id' => $user_id]);
        $resultUser = $stmtUser->fetch(PDO::FETCH_ASSOC);
        return $resultUser;
    }


    public function addUser($user_name, $user_email, $user_pass, $user_gender, $user_address, $user_phone, $user_avatar)
    {
        $sqlUser = "insert into users(user_name, user_email, user_pass, user_gender, user_address, user_phone, user_avatar) values (:user_name, :user_email, :user_pass, :user_gender, :user_address, :user_phone, :user_avatar)";
        $stmtUser = $this->connection->prepare($sqlUser);
        $stmtUser->execute(['user_name' => $user_name, 'user_email' => $user_email, 'user_pass' => $user_pass, 'user_gender' => $user_gender, 'user_address' => $user_address, 'user_phone' => $user_phone, 'user_avatar' => $user_avatar]);
        return true;
    }

    public function deleteUser($user_id)
    {
        $sqlUser = "delete from users where user_id=:user_id";
        $stmtUser = $this->connection->prepare($sqlUser);
        $stmtUser->execute(['user_id' => $user_id]);
        $resultUser = $stmtUser->fetch(PDO::FETCH_ASSOC);
        return $resultUser;
    }


    public function updateUser($user_id, $user_name, $user_email, $user_pass, $user_gender, $user_address, $user_phone, $user_avatar)
    {
        $sqlUser = "update users set user_name = :user_name, user_email = :user_email, user_pass = :user_pass, user_gender = :user_gender, user_address = :user_address, user_phone = :user_phone, user_avatar = :user_avatar where user_id = :user_id";
        $stmtUser = $this->connection->prepare($sqlUser);
        $stmtUser->execute(['user_name' => $user_name, 'user_email' => $user_email, 'user_pass' => $user_pass, 'user_gender' => $user_gender, 'user_address' => $user_address, 'user_phone' => $user_phone, 'user_avatar' => $user_avatar, 'user_id' => $user_id]);
        return true;
    }

    // End User //


    // Login, register //
    public function login($user_email, $user_pass)
    {
        $sql = "select * from users where user_email= :user_email and user_pass= :user_pass";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['user_email' => $user_email, 'user_pass' => $user_pass]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function register($user_name, $user_email, $user_pass, $user_gender, $user_address, $user_phone, $user_avatar)
    {
        $sql = "insert into users(user_name, user_email, user_pass, user_gender, user_address, user_phone, user_avatar) values (:user_name, :user_email, :user_pass, :user_gender, :user_address, :user_phone, :user_avatar)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['user_name' => $user_name, 'user_email' => $user_email, 'user_pass' => $user_pass, 'user_gender' => $user_gender, 'user_address' => $user_address, 'user_phone' => $user_phone, 'user_avatar' => $user_avatar]);
        return true;
    }

    public function loadUsers()
    {
        $sql = "select * from users";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // End Login, register //


    // Brands //

    public function addBrand($brand_name, $brand_image)
    {
        $sqlBrand = "insert into brands(brand_name, brand_image) values (:brand_name, :brand_image)";
        $stmtBrand = $this->connection->prepare($sqlBrand);
        $stmtBrand->execute(['brand_name' => $brand_name, 'brand_image' => $brand_image]);
        return true;
    }

    public function readBrand()
    {
        $dataAllBrand = array();
        $sqlBrand = "select * from brands";
        $stmtBrand = $this->connection->prepare($sqlBrand);
        $stmtBrand->execute();
        $resultBrand = $stmtBrand->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultBrand as $rowBrand
        ) {
            $dataAllBrand[] = $rowBrand;
        }
        return $dataAllBrand;
    }

    public function deleteBrand($brand_id)
    {
        $sqlBrand = "delete from brands where brand_id=:brand_id";
        $stmtBrand = $this->connection->prepare($sqlBrand);
        $stmtBrand->execute(['brand_id' => $brand_id]);
        $resultBrand = $stmtBrand->fetch(PDO::FETCH_ASSOC);
        return $resultBrand;
    }

    public function getBrandById($brand_id)
    {
        $sqlBrand = "select * from brands where brand_id=:brand_id";
        $stmtBrand = $this->connection->prepare($sqlBrand);
        $stmtBrand->execute(['brand_id' => $brand_id]);
        $resultBrand = $stmtBrand->fetch(PDO::FETCH_ASSOC);
        return $resultBrand;
    }

    public function updateBrand($brand_id, $brand_name, $brand_image)
    {
        $sqlBrand = "update brands set brand_name = :brand_name, brand_image = :brand_image where brand_id = :brand_id";
        $stmtBrand = $this->connection->prepare($sqlBrand);
        $stmtBrand->execute(['brand_name' => $brand_name, 'brand_image' => $brand_image, 'brand_id' => $brand_id]);
        return true;
    }

    public function readBrandById($brand_id)
    {
        $dataAllBrand = array();
        $sqlBrand = "select * from brands where brand_id = :brand_id";
        $stmtBrand = $this->connection->prepare($sqlBrand);
        $stmtBrand->execute(['brand_id' => $brand_id]);
        $resultBrand = $stmtBrand->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultBrand as $rowBrand
        ) {
            $dataAllBrand[] = $rowBrand;
        }
        return $dataAllBrand;
    }


    // End Brands //


// StatusProducts //


    public function addStatusProduct($statusProduct_name)
    {
        $sqlStatusProduct = "insert into statusproducts(statusProduct_name) values (:statusProduct_name)";
        $stmtStatusProduct = $this->connection->prepare($sqlStatusProduct);
        $stmtStatusProduct->execute(['statusProduct_name' => $statusProduct_name]);
        return true;
    }

    public function readStatusProduct()
    {
        $dataAllStatusProduct = array();
        $sqlStatusProduct = "select * from statusproducts";
        $stmtStatusProduct = $this->connection->prepare($sqlStatusProduct);
        $stmtStatusProduct->execute();
        $resultStatusProduct = $stmtStatusProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultStatusProduct as $rowStatusProduct
        ) {
            $dataAllStatusProduct[] = $rowStatusProduct;
        }
        return $dataAllStatusProduct;
    }


    public function deleteStatusProduct($statusProduct_id)
    {
        $sqlStatusProduct = "delete from statusproducts where statusProduct_id=:statusProduct_id";
        $stmtStatusProduct = $this->connection->prepare($sqlStatusProduct);
        $stmtStatusProduct->execute(['statusProduct_id' => $statusProduct_id]);
        $resultStatusProduct = $stmtStatusProduct->fetch(PDO::FETCH_ASSOC);
        return $resultStatusProduct;
    }

    public function getStatusProduct($statusProduct_id)
    {
        $sqlStatusProduct = "select * from statusproducts where statusProduct_id=:statusProduct_id";
        $stmtStatusProduct = $this->connection->prepare($sqlStatusProduct);
        $stmtStatusProduct->execute(['statusProduct_id' => $statusProduct_id]);
        $resultStatusProduct = $stmtStatusProduct->fetch(PDO::FETCH_ASSOC);
        return $resultStatusProduct;
    }

    public function updateStatusProduct($statusProduct_id, $statusProduct_name)
    {
        $sqlStatusProduct = "update statusproducts set statusProduct_name = :statusProduct_name where statusProduct_id = :statusProduct_id";
        $stmtStatusProduct = $this->connection->prepare($sqlStatusProduct);
        $stmtStatusProduct->execute(['statusProduct_name' => $statusProduct_name, 'statusProduct_id' => $statusProduct_id]);
        return true;
    }


// End StatusProducts //


// Products //

    public function addProduct($product_name, $product_image1, $product_image2, $product_image3, $product_price, $product_sale, $product_describe, $product_detail, $product_amountProduct, $product_dateUpdate, $brand_id, $statusProduct_id)
    {
        $sqlProduct = "insert into products(product_name, product_image1, product_image2, product_image3, product_price, product_sale, product_describe, product_detail, product_amountProduct, product_dateUpdate,brand_id, statusProduct_id) values (:product_name, :product_image1, :product_image2, :product_image3, :product_price, :product_sale, :product_describe, :product_detail, :product_amountProduct, :product_dateUpdate, :brand_id, :statusProduct_id)";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute(['product_name' => $product_name, 'product_image1' => $product_image1, 'product_image2' => $product_image2, 'product_image3' => $product_image3, 'product_price' => $product_price, 'product_sale' => $product_sale, 'product_describe' => $product_describe, 'product_detail' => $product_detail, 'product_amountProduct' => $product_amountProduct, 'product_dateUpdate' => $product_dateUpdate, 'brand_id' => $brand_id, 'statusProduct_id' => $statusProduct_id]);
        return true;
    }


    public function readProduct()
    {
        $dataAllProduct = array();
        $sqlProduct = "select * from products 
                inner join brands on products.brand_id = brands.brand_id
                inner join statusproducts on products.statusProduct_id = statusproducts.statusProduct_id";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute();
        $resultProduct = $stmtProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultProduct as $rowProduct
        ) {
            $dataAllProduct[] = $rowProduct;
        }
        return $dataAllProduct;
    }


    public function deleteProduct($product_id)
    {
        $sqlProduct = "delete from products where product_id=:product_id";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute(['product_id' => $product_id]);
        $resultProduct = $stmtProduct->fetch(PDO::FETCH_ASSOC);
        return $resultProduct;
    }

    public function getProduct($product_id)
    {
        $sqlProduct = "select * from products inner join brands on products.brand_id = brands.brand_id
                inner join statusproducts on products.statusProduct_id = statusproducts.statusProduct_id where product_id=:product_id";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute(['product_id' => $product_id]);
        $resultProduct = $stmtProduct->fetch(PDO::FETCH_ASSOC);
        return $resultProduct;
    }

    public function updateProduct($product_id, $product_name, $product_image1, $product_image2, $product_image3, $product_price, $product_sale, $product_describe, $product_detail, $product_amountProduct, $brand_id, $statusProduct_id)
    {
        $sqlProduct = "update products set product_name = :product_name, product_image1 = :product_image1, product_image2 = :product_image2, product_image3 = :product_image3, product_price = :product_price, product_sale = :product_sale, product_describe = :product_describe, product_detail = :product_detail, product_amountProduct = :product_amountProduct, brand_id = :brand_id , statusProduct_id = :statusProduct_id where product_id = :product_id";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute(['product_name' => $product_name, 'product_image1' => $product_image1, 'product_image2' => $product_image2, 'product_image3' => $product_image3, 'product_price' => $product_price, 'product_sale' => $product_sale, 'product_describe' => $product_describe, 'product_detail' => $product_detail, 'product_amountProduct' => $product_amountProduct, 'brand_id' => $brand_id, 'statusProduct_id' => $statusProduct_id, 'product_id' => $product_id]);
        return true;
    }


// End Products//


// ColorProducts //

    public function addColorProductDetail($colorProduct_name, $colorProduct_image, $product_id)
    {
        $sqlColorProduct = "insert into colorproducts(colorProduct_name, colorProduct_image,product_id) values (:colorProduct_name, :colorProduct_image, :product_id)";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute(['colorProduct_name' => $colorProduct_name, 'colorProduct_image' => $colorProduct_image, 'product_id' => $product_id]);
        return true;
    }

    public function readColorProduct()
    {
        $dataAllColorProduct = array();
        $sqlColorProduct = "select * from colorproducts 
            inner join products on colorproducts.product_id = products.product_id ";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute();
        $resultColorProduct = $stmtColorProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultColorProduct as $rowColorProduct
        ) {
            $dataAllColorProduct[] = $rowColorProduct;
        }
        return $dataAllColorProduct;
    }

    public function deleteColorProductDetail($colorProduct_id)
    {
        $sqlColorProduct = "delete from colorproducts where colorProduct_id=:colorProduct_id";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute(['colorProduct_id' => $colorProduct_id]);
        $resultColorProduct = $stmtColorProduct->fetch(PDO::FETCH_ASSOC);
        return $resultColorProduct;
    }

    public function getColorProductDetail($colorProduct_id)
    {
        $sqlColorProduct = "select * from colorproducts where colorProduct_id=:colorProduct_id";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute(['colorProduct_id' => $colorProduct_id]);
        $resultColorProduct = $stmtColorProduct->fetch(PDO::FETCH_ASSOC);
        return $resultColorProduct;
    }


    public function updateColorProduct($colorProduct_id, $colorProduct_name, $colorProduct_image, $product_id)
    {
        $sqlProduct = "update colorproducts set colorProduct_name = :colorProduct_name, colorProduct_image = :colorProduct_image, product_id = :product_id where colorProduct_id = :colorProduct_id";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute(['colorProduct_name' => $colorProduct_name, 'colorProduct_image' => $colorProduct_image, 'product_id' => $product_id, 'colorProduct_id' => $colorProduct_id]);
        return true;
    }


    public function countColorProduct($product_id)
    {
        $sqlColorProduct = "select count('product_id') as countColorProduct from colorproducts where product_id=:product_id";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute(['product_id' => $product_id]);
        $resultColorProduct = $stmtColorProduct->fetch(PDO::FETCH_ASSOC);
        return $resultColorProduct;
    }

    public function deleteColorProduct($product_id)
    {
        $sqlColorProduct = "delete from colorproducts where product_id=:product_id";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute(['product_id' => $product_id]);
        $resultColorProduct = $stmtColorProduct->fetch(PDO::FETCH_ASSOC);
        return $resultColorProduct;
    }


    public function getColorProduct($product_id)
    {
        $dataAllColorProduct = array();
        $sqlColorProduct = "select * from colorproducts where product_id=:product_id";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute(['product_id' => $product_id]);
        $resultColorProduct = $stmtColorProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultColorProduct as $rowColorProduct
        ) {
            $dataAllColorProduct[] = $rowColorProduct;
        }
        return $dataAllColorProduct;
    }



// End ColorProducts //


// Memory Product //


    public function countMemoryProduct($product_id)
    {
        $sqlMemoryProduct = "select count('product_id') as countMemoryProduct from memoryproducts where product_id=:product_id";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['product_id' => $product_id]);
        $resultMemoryProduct = $stmtMemoryProduct->fetch(PDO::FETCH_ASSOC);
        return $resultMemoryProduct;
    }

    public function getMemoryProduct($product_id)
    {
        $dataAllMemoryProduct = array();
        $sqlMemoryProduct = "select * from memoryproducts where product_id=:product_id";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['product_id' => $product_id]);
        $resultMemoryProduct = $stmtMemoryProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultMemoryProduct as $rowMemoryProduct
        ) {
            $dataAllMemoryProduct[] = $rowMemoryProduct;
        }
        return $dataAllMemoryProduct;
    }


    public function readMemoryProduct()
    {
        $dataAllMemoryProduct = array();
        $sqlMemoryProduct = "select * from memoryproducts";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute();
        $resultMemoryProduct = $stmtMemoryProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultMemoryProduct as $rowMemoryProduct
        ) {
            $dataAllMemoryProduct[] = $rowMemoryProduct;
        }
        return $dataAllMemoryProduct;
    }


    public function addMemoryProduct($memoryProduct_name, $memoryProduct_price, $product_id)
    {
        $sqlMemoryProduct = "insert into memoryproducts(memoryProduct_name, memoryProduct_price,product_id) values (:memoryProduct_name, :memoryProduct_price, :product_id)";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['memoryProduct_name' => $memoryProduct_name, 'memoryProduct_price' => $memoryProduct_price, 'product_id' => $product_id]);
        return true;
    }

    public function deleteMemoryProduct($product_id)
    {
        $sqlMemoryProduct = "delete from memoryproducts where product_id=:product_id";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['product_id' => $product_id]);
        $resultMemoryProduct = $stmtMemoryProduct->fetch(PDO::FETCH_ASSOC);
        return $resultMemoryProduct;
    }

    public function deleteMemoryProductDetail($memoryProduct_id)
    {
        $sqlMemoryProduct = "delete from memoryproducts where memoryProduct_id=:memoryProduct_id";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['memoryProduct_id' => $memoryProduct_id]);
        $resultMemoryProduct = $stmtMemoryProduct->fetch(PDO::FETCH_ASSOC);
        return $resultMemoryProduct;
    }


    public function getMemoryProductDetail($memoryProduct_id)
    {
        $sqlMemoryProduct = "select * from memoryproducts where memoryProduct_id=:memoryProduct_id";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['memoryProduct_id' => $memoryProduct_id]);
        $resultMemoryProduct = $stmtMemoryProduct->fetch(PDO::FETCH_ASSOC);
        return $resultMemoryProduct;
    }


    public function updateMemoryProduct($memoryProduct_id, $memoryProduct_name, $memoryProduct_price, $product_id)
    {
        $sqlMemoryProduct = "update memoryproducts set memoryProduct_name = :memoryProduct_name, memoryProduct_price = :memoryProduct_price, product_id = :product_id where memoryProduct_id = :memoryProduct_id";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute(['memoryProduct_name' => $memoryProduct_name, 'memoryProduct_price' => $memoryProduct_price, 'product_id' => $product_id, 'memoryProduct_id' => $memoryProduct_id]);
        return true;
    }


    // End Memory Product //


    // Slider //

    public function addSlideShow($slideShow_image, $slideShow_name)
    {
        $sqlSlideShow = "insert into slideshows(slideShow_image, slideShow_name) values (:slideShow_image, :slideShow_name)";
        $stmtSlideShow = $this->connection->prepare($sqlSlideShow);
        $stmtSlideShow->execute(['slideShow_image' => $slideShow_image, 'slideShow_name' => $slideShow_name]);
        return true;
    }

    public function readSlideShow()
    {
        $dataAllSlideShow = array();
        $sqlSlideShow = "select * from slideshows";
        $stmtSlideShow = $this->connection->prepare($sqlSlideShow);
        $stmtSlideShow->execute();
        $resultSlideShow = $stmtSlideShow->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSlideShow as $rowSlideShow
        ) {
            $dataAllSlideShow[] = $rowSlideShow;
        }
        return $dataAllSlideShow;
    }

    public function deleteSlideShow($slideShow_id)
    {
        $sqlSlideShow = "delete from slideshows where slideShow_id=:slideShow_id";
        $stmtSlideShow = $this->connection->prepare($sqlSlideShow);
        $stmtSlideShow->execute(['slideShow_id' => $slideShow_id]);
        $resultSlideShow = $stmtSlideShow->fetch(PDO::FETCH_ASSOC);
        return $resultSlideShow;
    }

    public function getSlideShow($slideShow_id)
    {
        $sqlSlideShow = "select * from slideshows where slideShow_id=:slideShow_id";
        $stmtSlideShow = $this->connection->prepare($sqlSlideShow);
        $stmtSlideShow->execute(['slideShow_id' => $slideShow_id]);
        $resultSlideShow = $stmtSlideShow->fetch(PDO::FETCH_ASSOC);
        return $resultSlideShow;
    }

    public function updateSlideShow($slideShow_id, $slideShow_image, $slideShow_name)
    {
        $sqlSlideShow = "update slideshows set slideShow_name = :slideShow_name, slideShow_image = :slideShow_image where slideShow_id = :slideShow_id";
        $stmtSlideShow = $this->connection->prepare($sqlSlideShow);
        $stmtSlideShow->execute(['slideShow_image' => $slideShow_image, 'slideShow_name' => $slideShow_name, 'slideShow_id' => $slideShow_id]);
        return true;
    }

    // End Slider //


// inFoShop //


    public function addinfo($infor_logo, $infor_address, $infor_email, $infor_phone, $infor_copyright)
    {
        $sqlinfo = "insert into infor(infor_logo, infor_address, infor_email, infor_phone, infor_copyright) values (:infor_logo, :infor_address, :infor_email, :infor_phone, :infor_copyright)";
        $stmtinfo = $this->connection->prepare($sqlinfo);
        $stmtinfo->execute(['infor_logo' => $infor_logo, 'infor_address' => $infor_address, 'infor_email' => $infor_email, 'infor_phone' => $infor_phone, 'infor_copyright' => $infor_copyright]);
        return true;
    }

    public function readInfo()
    {
        $dataAllInfo = array();
        $sqlInfo = "select * from infor";
        $stmtInfo = $this->connection->prepare($sqlInfo);
        $stmtInfo->execute();
        $resultInfo = $stmtInfo->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultInfo as $rowInfo
        ) {
            $dataAllInfo[] = $rowInfo;
        }
        return $dataAllInfo;
    }


    public function deleteInfo($infor_id)
    {
        $sqlInfo = "delete from infor where infor_id=:infor_id";
        $stmtInfo = $this->connection->prepare($sqlInfo);
        $stmtInfo->execute(['infor_id' => $infor_id]);
        $resultInfo = $stmtInfo->fetch(PDO::FETCH_ASSOC);
        return $resultInfo;
    }

    public function getInfo($infor_id)
    {
        $sqlInfo = "select * from infor where infor_id=:infor_id";
        $stmtInfo = $this->connection->prepare($sqlInfo);
        $stmtInfo->execute(['infor_id' => $infor_id]);
        $resultInfo = $stmtInfo->fetch(PDO::FETCH_ASSOC);
        return $resultInfo;
    }


    public function updateInfo($infor_id, $infor_logo, $infor_address, $infor_email, $infor_phone, $infor_copyright)
    {
        $sqlSlideShow = "update infor set infor_logo = :infor_logo, infor_address = :infor_address, infor_email = :infor_email, infor_phone = :infor_phone, infor_copyright = :infor_copyright where infor_id = :infor_id";
        $stmtSlideShow = $this->connection->prepare($sqlSlideShow);
        $stmtSlideShow->execute(['infor_logo' => $infor_logo, 'infor_address' => $infor_address, 'infor_email' => $infor_email, 'infor_phone' => $infor_phone, 'infor_copyright' => $infor_copyright, 'infor_id' => $infor_id]);
        return true;
    }





// End InfoShop //


// Show Row sell,topview, rate product index client //

    public function readSellProduct()
    {
        $dataSellProduct = array();
        $sqlSellProduct = "select * from products 
               inner join statusproducts on products.statusProduct_id = statusproducts.statusProduct_id
            where product_sale < product_price
            ";
        $stmtSellProduct = $this->connection->prepare($sqlSellProduct);
        $stmtSellProduct->execute();
        $resultSellProduct = $stmtSellProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSellProduct as $rowSellProduct
        ) {
            $dataSellProduct[] = $rowSellProduct;
        }
        return $dataSellProduct;
    }

    public function readNewProduct()
    {
        $dataNewProduct = array();
        $sqlNewProduct = "select * from products 
               inner join statusproducts on products.statusProduct_id = statusproducts.statusProduct_id
            order by  product_dateUpdate desc
            ";
        $stmtNewProduct = $this->connection->prepare($sqlNewProduct);
        $stmtNewProduct->execute();
        $resultNewProduct = $stmtNewProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultNewProduct as $rowNewProduct
        ) {
            $dataNewProduct[] = $rowNewProduct;
        }
        return $dataNewProduct;
    }


    public function readRateProduct()
    {
        $dataRateProduct = array();
        $sqlRateProduct = "select * from products 
               inner join statusproducts on products.statusProduct_id = statusproducts.statusProduct_id
            order by product_countView desc
            ";
        $stmtRateProduct = $this->connection->prepare($sqlRateProduct);
        $stmtRateProduct->execute();
        $resultRateProduct = $stmtRateProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultRateProduct as $rowRateProduct
        ) {
            $dataRateProduct[] = $rowRateProduct;
        }
        return $dataRateProduct;
    }

// End Show Row sell, top view index client //


// Show Row sell,topview, rate product productDuctDetail client //

    public function readRelatedProduct($brand_id, $product_id)
    {
        $dataRelatedProduct = array();
        $sqlRelatedProduct = "select * from products
inner join statusproducts on products.statusProduct_id = statusproducts.statusProduct_id
inner join brands on products.brand_id = brands.brand_id
where products.brand_id = :brand_id and products.product_id != :product_id";
        $stmtRelatedProduct = $this->connection->prepare($sqlRelatedProduct);
        $stmtRelatedProduct->execute(['brand_id' => $brand_id, 'product_id' => $product_id]);
        $resultRelatedProduct = $stmtRelatedProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultRelatedProduct as $rowRelatedProduct
        ) {
            $dataRelatedProduct[] = $rowRelatedProduct;
        }
        return $dataRelatedProduct;
    }
// End Show Row sell,topview, rate product productDuctDetail client //



public function page(){
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:3;
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    $numOffset = ($current_page-1) * $item_per_page;

    $queryPageination = "SELECT * FROM products";
    $totalRecords= $this->connection->prepare($queryPageination);
    $totalRecords->execute();
    $totalRecords = $totalRecords->rowCount();
    $totalPages = ceil($totalRecords/$item_per_page);

    if (isset($_GET['back_page'])){
        $current_page = 1;
    } elseif (isset($_GET['up_page'])){
        $current_page = $totalPages;

    }
    ?>                                 <li><span class="text-uppercase">Hiển thị <?= $item_per_page ?> - <?= $totalRecords?> sản phẩm</span></li>
<?php
    for ($num = 1; $num <= $totalPages; $num++) {
        if ($num != $current_page) {
            if ($num > $current_page - 4 && $num < $current_page + 4) { ?>
                <li class="active text-black"> <a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
                </li>
            <?php } } else { ?>
            <li class="text-danger"><?= $num ?></li>
        <?php }
    }

}



// Fliter //

    public function readFliter()
    {
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:3;
        $current_page = !empty($_GET['page'])?$_GET['page']:1;
        $numOffset = ($current_page-1) * $item_per_page;
        $dataAllFindProduct = array();
        if (isset($_POST['find']) || isset($_SESSION['searchProductValue'])) {
            $sqlFindProduct = "select * from products
inner join memoryproducts on memoryproducts.product_id = products.product_id
inner join colorproducts on colorproducts.product_id = products.product_id
inner join brands on brands.brand_id = products.brand_id
inner join statusproducts on statusproducts.statusProduct_id = products.statusProduct_id 
where products.product_id != '' ";

            if (isset($_POST['tick_memoryProductFliter'])) {
                $sqlFindProduct .= " and ";
                $sqlFindProduct .= "memoryproducts.memoryProduct_name = ";
                foreach ($_POST['tick_memoryProductFliter'] as $memoryProductFliter) {
                    $sqlFindProduct .= "'$memoryProductFliter'";
                    $sqlFindProduct .= " and ";
                    $sqlFindProduct .= "products.product_id !='' ";

                }

            }
            if (isset($_POST['tick_colorProductFliter'])) {
                $sqlFindProduct .= " and ";
                $sqlFindProduct .= "colorproducts.colorProduct_name = ";
                foreach ($_POST['tick_colorProductFliter'] as $colorProductFliter) {
                    $sqlFindProduct .= "'$colorProductFliter'";
                    $sqlFindProduct .= " and ";
                    $sqlFindProduct .= "products.product_id !='' ";

                }
            }

            if (isset($_POST['tick_BrandProductFliter'])) {
                $sqlFindProduct .= " and ";
                $sqlFindProduct .= "brands.brand_name = ";
                foreach ($_POST['tick_BrandProductFliter'] as $brandProductFliter) {
                    $sqlFindProduct .= "'$brandProductFliter'";
                    $sqlFindProduct .= " and ";
                    $sqlFindProduct .= "products.product_id !='' ";

                }
            }
            if (isset($_POST['tick_statusProductFliter'])) {
                $sqlFindProduct .= " and ";
                $sqlFindProduct .= "statusproducts.statusProduct_name = ";
                foreach ($_POST['tick_statusProductFliter'] as $statusProductFliter) {
                    $sqlFindProduct .= "'$statusProductFliter'";
                    $sqlFindProduct .= " and ";
                    $sqlFindProduct .= "products.product_id !='' ";

                }
            }


            if (isset($_SESSION['searchProductValue'])) {
                $sqlFindProduct .= "and products.product_name like ";
                $sqlFindProduct .= "'%$_SESSION[searchProductValue]%'";
            }
            if (isset($_GET['brand'])){
                $sqlFindProduct .= " and brands.brand_id = ";
                $sqlFindProduct .= $_GET['brand'];
            }
            $sqlFindProduct .= " group by products.product_id ";

                $sqlFindProduct .= " order by product_sale asc ";



            $sqlFindProduct .= " limit " .$item_per_page. " offset $numOffset";
            $stmtFindProduct = $this->connection->prepare($sqlFindProduct);
            $stmtFindProduct->execute();
            $resultFindProduct = $stmtFindProduct->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultFindProduct as $rowFindProduct
            ) {
                $dataAllFindProduct[] = $rowFindProduct;
            }
            return $dataAllFindProduct;
        }
    }


    public function readSearchProductFliter()
    {
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:3;
        $current_page = !empty($_GET['page'])?$_GET['page']:1;
        $numOffset = ($current_page-1) * $item_per_page;

        $dataAllSearchProductFliter = array();
        $sqlSearchProductFliter = "select * from products
inner join memoryproducts on memoryproducts.product_id = products.product_id
inner join colorproducts on colorproducts.product_id = products.product_id
inner join brands on brands.brand_id = products.brand_id
inner join statusproducts on statusproducts.statusProduct_id = products.statusProduct_id
where products.product_id != '' ";

            if (isset($_GET['brand'])){
                $sqlSearchProductFliter .= "and brands.brand_id = ";
                $sqlSearchProductFliter .= $_GET['brand'];
            }
        $sqlSearchProductFliter .= " group by products.product_id";
        $sqlSearchProductFliter .= " order by product_sale asc";

        $sqlSearchProductFliter .= " limit " .$item_per_page. " offset $numOffset";
        $stmtSearchProductFliter = $this->connection->prepare($sqlSearchProductFliter);
        $stmtSearchProductFliter->execute();
        $resultSearchProductFliter = $stmtSearchProductFliter->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSearchProductFliter as $rowSearchProductFliter
        ) {
            $dataAllSearchProductFliter[] = $rowSearchProductFliter;
        }
        return $dataAllSearchProductFliter;
    }


    public function readColorProductFilter()
    {
        $dataAllColorProduct = array();
        $sqlColorProduct = "select DISTINCT colorproducts.colorProduct_name from colorproducts 
            inner join products on colorproducts.product_id = products.product_id ";
        $stmtColorProduct = $this->connection->prepare($sqlColorProduct);
        $stmtColorProduct->execute();
        $resultColorProduct = $stmtColorProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultColorProduct as $rowColorProduct
        ) {
            $dataAllColorProduct[] = $rowColorProduct;
        }
        return $dataAllColorProduct;
    }

    public function readMemoryProductFilter()
    {
        $dataAllMemoryProduct = array();
        $sqlMemoryProduct = "select DISTINCT memoryproducts.memoryProduct_name from memoryproducts";
        $stmtMemoryProduct = $this->connection->prepare($sqlMemoryProduct);
        $stmtMemoryProduct->execute();
        $resultMemoryProduct = $stmtMemoryProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultMemoryProduct as $rowMemoryProduct
        ) {
            $dataAllMemoryProduct[] = $rowMemoryProduct;
        }
        return $dataAllMemoryProduct;
    }



// End Fliter //


// Comment //
    public function addComment($comment_content, $comment_date, $comment_image, $comment_parent, $product_id, $user_id)
    {
        $sqlComment = "insert into comments(comment_content, comment_date, comment_image, comment_parent, product_id, user_id) values (:comment_content, :comment_date, :comment_image, :comment_parent, :product_id, :user_id)";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['comment_content' => $comment_content, 'comment_date' => $comment_date, 'comment_image' => $comment_image, 'comment_parent' => $comment_parent, 'product_id' => $product_id, 'user_id' => $user_id]);
        return true;
    }


    public function readCommentByProduct($product_id, $comment_parent)
    {
        $dataAllComment = array();
        $sqlComment = "select * from comments where product_id = :product_id and comment_parent=:comment_parent";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['product_id' => $product_id, 'comment_parent' => $comment_parent]);
        $resultComment = $stmtComment->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultComment as $rowComment
        ) {
            $dataAllComment[] = $rowComment;
        }
        return $dataAllComment;
    }


    public function deletecomment($comment_id)
    {
        $dataAllComment = array();
        $sqlComment = "delete from comments where comment_id = :comment_id ";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['comment_id' => $comment_id]);
        $resultComment = $stmtComment->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultComment as $rowComment
        ) {
            $dataAllComment[] = $rowComment;
        }
        return $dataAllComment;
    }

    public function deletecommentByProduct($product_id)
    {
        $dataAllComment = array();
        $sqlComment = "delete from comments where product_id = :product_id ";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['product_id' => $product_id]);
        $resultComment = $stmtComment->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultComment as $rowComment
        ) {
            $dataAllComment[] = $rowComment;
        }
        return $dataAllComment;
    }

    public function getComment($comment_id)
    {
        $sqlComment = "select * from comments where comment_id=:comment_id";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['comment_id' => $comment_id]);
        $resultComment = $stmtComment->fetch(PDO::FETCH_ASSOC);
        return $resultComment;
    }

    public function updateComment($comment_id, $comment_content, $comment_image)
    {
        $sqlComment = "update comments set comment_content = :comment_content, comment_image = :comment_image where comment_id = :comment_id";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['comment_content' => $comment_content, 'comment_image' => $comment_image, 'comment_id' => $comment_id]);
        return true;
    }

    public function getCommentByUser($user_id)
    {
        $dataAllCommentByUser = array();
        $sqlComment = "select * from comments where user_id=:user_id";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['user_id' => $user_id]);
        $resultComment = $stmtComment->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultComment as $rowComment
        ) {
            $dataAllCommentByUser[] = $rowComment;
        }
        return $dataAllCommentByUser;
    }


    public function getCommentByProduct($product_id)
    {
        $dataAllCommentByProduct = array();
        $sqlProduct = "select * from comments where product_id=:product_id";
        $stmtProduct = $this->connection->prepare($sqlProduct);
        $stmtProduct->execute(['product_id' => $product_id]);
        $resultProduct = $stmtProduct->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultProduct as $rowCommentByProduct
        ) {
            $dataAllCommentByProduct[] = $rowCommentByProduct;
        }
        return $dataAllCommentByProduct;
    }


    public function countCommentByProduct($product_id)
    {
        $sqlCommentByProduc = "select count('product_id') as countCommentByProduct from comments where product_id=:product_id";
        $stmtCommentByProduct = $this->connection->prepare($sqlCommentByProduc);
        $stmtCommentByProduct->execute(['product_id' => $product_id]);
        $resultCommentByProduct = $stmtCommentByProduct->fetch(PDO::FETCH_ASSOC);
        return $resultCommentByProduct;
    }


// End Comment //


// Cart //

    public function readOrder()
    {
        $dataAllOrder = array();
        $sqlOrder = "select * from orders";
        $stmtOrder = $this->connection->prepare($sqlOrder);
        $stmtOrder->execute();
        $resultOrder = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultOrder as $rowOrder
        ) {
            $dataAllOrder[] = $rowOrder;
        }
        return $dataAllOrder;
    }

    public function deleteOrderById($order_id)
    {
        $dataAllOrder = array();
        $sqlOrder = "delete from orders where order_id = :order_id ";
        $stmtOrder = $this->connection->prepare($sqlOrder);
        $stmtOrder->execute(['order_id' => $order_id]);
        $resultOrder = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultOrder as $rowComment
        ) {
            $dataAllOrder[] = $rowComment;
        }
        return $dataAllOrder;
    }

    public function getOrder($order_id)
    {
        $sqlOrder = "select * from orders where order_id=:order_id";
        $stmtOrder = $this->connection->prepare($sqlOrder);
        $stmtOrder->execute(['order_id' => $order_id]);
        $resultOrder = $stmtOrder->fetch(PDO::FETCH_ASSOC);
        return $resultOrder;
    }


    public function updateOrder($order_id, $order_orderStatus)
    {
        $sqlComment = "update orders set order_orderStatus = :order_orderStatus where order_id = :order_id";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['order_orderStatus' => $order_orderStatus, 'order_id' => $order_id]);
        return true;
    }


    public function acceptBuy($product_id, $order_qtyProduct, $order_memoryProduct_name, $order_colorProduct_name, $order_totalProduct, $user_id, $dateBuy)
    {
        $sqlComment = "insert into orders(product_id, order_qtyProduct, order_memoryProduct_name, order_colorProduct_name, order_totalProduct, user_id, dateBuy) values (:product_id, :order_qtyProduct, :order_memoryProduct_name, :order_colorProduct_name, :order_totalProduct, :user_id, :dateBuy)";
        $stmtComment = $this->connection->prepare($sqlComment);
        $stmtComment->execute(['product_id' => $product_id, 'order_qtyProduct' => $order_qtyProduct, 'order_memoryProduct_name' => $order_memoryProduct_name, 'order_colorProduct_name' => $order_colorProduct_name, 'order_totalProduct' => $order_totalProduct, 'user_id' => $user_id, 'dateBuy' => $dateBuy]);
        return true;
    }


    public function readOrderByUser($user_id)
    {
        $dataAllOrderByUser = array();
        $sqlOrderByUser = "select * from orders where user_id = :user_id order by dateBuy desc ";
        $stmtOrderByUser = $this->connection->prepare($sqlOrderByUser);
        $stmtOrderByUser->execute(['user_id' => $user_id]);
        $resultOrderByUsert = $stmtOrderByUser->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultOrderByUsert as $rowOrderByUser
        ) {
            $dataAllOrderByUser[] = $rowOrderByUser;
        }
        return $dataAllOrderByUser;
    }


// End Cart //


// ChangeInfo With Member //


    public function changeInfoUser($user_id, $user_name, $user_phone, $user_email, $user_address, $user_avatar)
    {
        $sqlchangeInfoUser = "update users set user_name = :user_name, user_phone = :user_phone , user_email = :user_email, user_address = :user_address , user_avatar = :user_avatar where user_id = :user_id";
        $stmtchangeInfoUser = $this->connection->prepare($sqlchangeInfoUser);
        $stmtchangeInfoUser->execute(['user_name' => $user_name, 'user_phone' => $user_phone, 'user_email' => $user_email, 'user_address' => $user_address, 'user_avatar' => $user_avatar, 'user_id' => $user_id]);
        return true;
    }



// End ChangeInfo With Member //


// Validate //

public function checkEmail($user_email){
    $sqlEmail = "select * from users where user_email=:user_email";
    $stmtEmail = $this->connection->prepare($sqlEmail);
    $stmtEmail->execute(['user_email' => $user_email]);
    $rowCheckEmail = $stmtEmail->rowCount();
    return $rowCheckEmail;
}

    public function checkPassword($user_email,$user_pass){
        $sqlPass = "select * from users where user_pass=:user_pass and user_email=:user_email";
        $stmtPass = $this->connection->prepare($sqlPass);
        $stmtPass->execute(['user_email' => $user_email, 'user_pass' => $user_pass]);
        $rowCheckPassword = $stmtPass->rowCount();
        return $rowCheckPassword;
    }

    public function checkPhone($user_phone){
        $sqlPass = "select * from users where user_phone=:user_phone";
        $stmtPass = $this->connection->prepare($sqlPass);
        $stmtPass->execute(['user_phone' => $user_phone]);
        $rowCheckPassword = $stmtPass->rowCount();
        return $rowCheckPassword;
    }

    public function checkProduct($product_name){
        $sqlCheckProduct = "select * from products where product_name like :product_name";
        $stmtCheckProduct = $this->connection->prepare($sqlCheckProduct);
        $stmtCheckProduct->execute(['product_name' => $product_name]);
        $rowCheckProduct = $stmtCheckProduct->rowCount();
        return $rowCheckProduct;
    }

    public function checkBrand($brand_name){
        $sqlCheckBrand = "select * from brands where brand_name like :brand_name";
        $stmtCheckBrand = $this->connection->prepare($sqlCheckBrand);
        $stmtCheckBrand->execute(['brand_name' => $brand_name]);
        $rowCheckBrand = $stmtCheckBrand->rowCount();
        return $rowCheckBrand;
    }

    public function checkStatusProducts($statusProduct_name){
        $sqlcheckStatusProducts = "select * from statusproducts where statusProduct_name like :statusProduct_name";
        $stmtcheckStatusProducts = $this->connection->prepare($sqlcheckStatusProducts);
        $stmtcheckStatusProducts->execute(['statusProduct_name' => $statusProduct_name]);
        $rowcheckStatusProducts = $stmtcheckStatusProducts->rowCount();
        return $rowcheckStatusProducts;
    }

    public function checkColorProduct($colorProduct_name,$product_id){
        $sqlcheckColorProduct = "select * from colorproducts where colorProduct_name like :colorProduct_name and product_id=:product_id";
        $stmtcheckColorProduct = $this->connection->prepare($sqlcheckColorProduct);
        $stmtcheckColorProduct->execute(['colorProduct_name' => $colorProduct_name, 'product_id' => $product_id]);
        $rowcheckSColorProduct = $stmtcheckColorProduct->rowCount();
        return $rowcheckSColorProduct;
    }

    public function checkMemoryProduct($memoryProduct_name,$product_id){
        $sqlcheckMemoryProduct = "select * from memoryproducts where memoryProduct_name like :memoryProduct_name and product_id=:product_id";
        $stmtcheckMemoryProduct = $this->connection->prepare($sqlcheckMemoryProduct);
        $stmtcheckMemoryProduct->execute(['memoryProduct_name' => $memoryProduct_name, 'product_id' => $product_id]);
        $rowcheckSMemoryProduct = $stmtcheckMemoryProduct->rowCount();
        return $rowcheckSMemoryProduct;
    }


// Validate //

}


$ob = new Database();

?>

