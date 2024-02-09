<?php
include('database.php');
include('data.php');
class backend
{
    //login users
    public function doLogin($email, $password)
    {
        return $this->login($email, $password);
    }
    //update the price of the quantity
    public function updateCartIdPrice($id, $quantity)
    {
        return $this->doUpdateCartIdPrice($id, $quantity);
    }

    public function DoLockAccount($id, $disabled)
    {
        return $this->getDisplayLock($id, $disabled);
    }
    public function DoUnlockAccount($id, $disabled)
    {
        return $this->getDisplayUnLock($id, $disabled);
    }

    //register users
    public function doRegister($name, $email, $password, $role, $image, $qr_image, $current_add, $permanent_add, $shop_name, $contact_no, $gender, $birthday)
    {
        return $this->register($name, $email, $password, $role, $image, $qr_image, $current_add, $permanent_add, $shop_name, $contact_no, $gender, $birthday);
    }
    // public function doReport($queryType, $selectType, $shopname, $sellername, $image,$orderNo,$comment)
    // {
    //     return $this->report($queryType, $selectType, $shopname, $sellername, $image,$orderNo,$comment);
    // }
    //getproduct to display seller side
    public function doGetAllProducts($userId)
    {
        return $this->getAllProducts($userId);
    }

    public function getDisplayAll()
    {
        return $this->doDisplayAll();
    }
    //dispaly product into costumer index
    public function doGetAllProductFromIndex()
    {
        return $this->displayAllData();
    }
    //add info to the costumer user
    public function doAddUserInfo($name, $email, $image, $current_add, $permanent_add, $contact_no, $gender, $birthday, $id)
    {
        return $this->addUserInfo($name, $email, $image, $current_add, $permanent_add, $contact_no, $gender, $birthday, $id);
    }
    public function doGetProductById($product_ID)
    {
        return $this->getProductById($product_ID);
    }

    //add to cart 
    public function doAddToCart($id, $product_ID)
    {
        return $this->getAddToCart($id, $product_ID);
    }
    //display product to cart by costumer
    public function doDisplayCart($id)
    {
        return $this->getDisplayCart($id);
    }
    //delete product from cart by costumer
    public function doDeleteCart($id)
    {
        return $this->getDeleteCart($id);
    }
    //add to wishlist
    public function doAddToWishlist($id, $product_ID)
    {
        return $this->getAddToWishlist($id, $product_ID);
    }
    public function doWL($id, $product_ID)
    {
        return $this->getWL($id, $product_ID);
    }
    //display product to wishlist by costumer
    public function doDisplayWishlist($id)
    {
        return $this->getDisplayWishlist($id);
    }
    //not functional delete from wishlist
    public function doDeleteWishlist($id)
    {
        return $this->getDeleteWishlist($id);
    }
    public function getSellerProduct($product_ID)
    {
        return $this->doSellerProduct($product_ID);
    }
    // public function doCheckOut($id, $cart_id)
    // {
    //     return $this->getCheckOut($id, $cart_id);
    // }
    //not functional display OrderInfo
    public function doDisplayOrderInfo($id)
    {
        return $this->getDisplayOrderInfo($id);
    }
    public function doViewOrderInfo($id)
    {
        return $this->getViewOrderInfo($id);
    }
    //not functional
    public function doDisplayCustomerInfo()
    {
        return $this->getDisplayCustomerInfo();
    }
    //not functional
    public function doDisplaySellerInfo()
    {
        return $this->getDisplaySellerInfo();
    }
    public function doDisplayReportInfo()
    {
        return $this->getDisplayReportInfo();
    }
    //orders.php
    public function doDisplayOrdersSellers($id)
    {
        return $this->getDisplaySellerorders($id);
    }

    public function doDisplayMyOrders($id)
    {
        return $this->getDisplayMyOrders($id);
    }
    // orders.php delete
    public function doDeleteOrdersSeller($id)
    {
        return $this->getDeleteOrdersSeller($id);
    }
    // order.php view
    public function doViewOrdersSeller($id)
    {
        return $this->getDisplayVieworders($id);
    }

    //order.php updatestatus
    public function doUpdateStatus($id)
    {
        return $this->getUpdateStatus($id);
    }

    public function doUpdateStatusPacked($id)
    {
        return $this->getUpdateStatusPacked($id);
    }
    public function doUpdateStatusShipped($id)
    {
        return $this->getUpdateStatusShipped($id);
    }
    public function doUpdateStatusArrived($id)
    {
        return $this->getUpdateStatusArrived($id);
    }
    public function doUpdateStatusReceive($id)
    {
        return $this->getUpdateStatusReceive($id);
    }

    // index.php display all products
    public function doDisplayAllP()
    {
        return $this->getDisplayAllProd();
    }

    // index individual prod
    public function doDisplayEdiP($id)
    {
        return $this->getDisplayEdiProd($id);
    }

    //sellers_report 
    public function doDisplaySellersRe($id)
    {
        return $this->getSelleresReport($id);
    }

    public function doViewSeller($id)
    {
        return $this->getViewSelleres($id);
    }

    //TOTAL AMOUNT
    public function doTotalAmount($id)
    {
        return $this->getTotalSellere($id);
    }

    //ADD PRODUCT INVENTORY
    public function doSelleraddprod($userID, $product_image, $product_image2, $product_image3, $product_name, $product_qty, $product_price, $product_des)
    {
        return $this->selleraddprod($userID, $product_image, $product_image2, $product_image3, $product_name, $product_qty, $product_price, $product_des);
    }

    //DISPLAY INVENTORY SELLER
    public function doDisplayAllInve($id)
    {
        return $this->getAllInventory($id);
    }

    //ADD PRODUCT INVENTORY
    public function doUpdateInven($product_image, $product_name2, $product_name3, $product_name, $product_qty, $product_price, $product_des, $stats, $id)
    {
        return $this->getUpdateInventory($product_image, $product_name2, $product_name3, $product_name, $product_qty, $product_price, $product_des, $stats, $id);
    }
    public function doBecomeS($qr_image, $shop_name, $permanent_add, $id)
    {
        return $this->getBecomeS($qr_image, $shop_name, $permanent_add, $id);
    }
    public function doDisplaydAllInve($id)
    {
        return $this->getdUpdateInventory($id);
    }

    public function doDeleteInve($id)
    {
        return $this->getDeleteInventory($id);
    }

    //chart seller 
    public function doDisplaySchart($id)
    {
        return $this->getchartseller($id);
    }
    public function getAdminChart()
    {
        return $this->doChartAdmin();
    }
    public function doHistory($id)
    {
        return $this->getHistory($id);
    }

    public function doDisplayPurch($id)
    {
        return $this->getDisplayPurch($id);
    }
    public function doLockseller($id)
    {
        return $this->getLockseller($id);
    }
    public function doPayment($paymethod, $image, $id)
    {
        return $this->getPayment($paymethod, $image, $id);
    }
    public function doAddReview($review_id, $id, $seller_id, $product_ID, $review_text)
    {
        return $this->getAddReview($review_id, $id, $seller_id, $product_ID, $review_text);
    }

    public function doAddVote($store_id, $sellerId, $id,  $rating)
    {
        return $this->getAddVote($store_id, $sellerId, $id, $rating);
    }
    public function getDisplayReview()
    {
        return $this->doDisplayReview();
    }
    public function getdisplayBestStore()
    {
        return $this->DoBestStore();
    }
    public function doRevByID($product_ID)
    {
        return $this->getRevByID($product_ID);
    }
    public function doDisplayINFO($id)
    {
        return $this->getDisplayINFO($id);
    }
    public function prodUsers($id)
    {
        return $this->getProdUsers($id);
    }
    public function userProdByID($product_ID)
    {
        return $this->prodByID($product_ID);
    }
    public function getAdminProd()
    {
        return $this->doAdminProd();
    }
    public function getAdminInven()
    {
        return $this->doAdminInven();
    }
    // public function doGetByIdPay($cart_id)
    // {
    //     return $this->getByIdPay($cart_id);
    // }
    public function DoSellerID($userID)
    {

        $_SESSION['sellerID'] = $userID;
        // unset($_SESSION['sellerID']);
    }
    public function DoDisplaySellerProfile()
    {
        return $this->getDisplaySellerProfile();
    }
    public function dataDisplaySellerProducts()
    {
        return $this->getDataDisplaySellerProducts();
    }
    public function doReports($typeOfComplaints, $selectType, $shopName, $sellerName, $orderNo, $yourName, $email, $phoneNo, $comments, $image)
    {
        return $this->getReports($typeOfComplaints, $selectType, $shopName, $sellerName, $orderNo, $yourName, $email, $phoneNo, $comments, $image);
    }
    public function doStartChat($seller_id)
    {
        return $this->handleStartChat($seller_id);
    }
    public function doGetInboxData()
    {
        return $this->HandleGetInboxData();
    }
    public function DoGetInboxById($inbox_id, $sender_id, $receiver_id)
    {
        return $this->HandleGetInboxById($inbox_id, $sender_id, $receiver_id);
    }
    public function DoSendChat($inbox_id, $sender_id, $receiver_id, $message)
    {
        return $this->HandleSendChat($inbox_id, $sender_id, $receiver_id, $message);
    }
    public function DoSelectID($id)
    {
        return $this->getSelectID($id);
    }
    public function doPlaceOrder($paymethod, $image, $cartData)
    {
        return $this->doPlaceOrderHandler($paymethod, $image, $cartData);
    }
    public function doDisplayReport()
    {
        return $this->getDisplayReport();
    }
    public function doDeleteHisto($id)
    {
        return $this->getDeleteHisto($id);
    }

    private function login($email, $password)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $password = md5($password);
                $query = $con->getCon()->prepare($DT->doLoginData());
                $query->execute(array($email, $password));
                $role = null;
                $status = null;

                while ($row = $query->fetch()) {
                    $role = $row['role'];
                    $status = $row['status'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['current_add'] = $row['current_add'];
                    $_SESSION['shop_name'] = $row['shop_name'];
                    $_SESSION['permanent_add'] = $row['permanent_add'];
                    $_SESSION['contact_no'] = $row['contact_no'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['birthday'] = $row['birthday'];
                }

                if ($role == '1') {
                    if ($status == '1') {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $con->closeConnection();
                        return 1;
                    }
                } else if ($role == '2') {
                    if ($status == '1') {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $con->closeConnection();
                        return 2;
                    }
                } else if ($role == '0') {
                    if ($status == '1') {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $con->closeConnection();
                        return 0;
                    }
                } else if ($role == '3') {
                    if ($status == '1') {
                        $con->closeConnection();
                        return 3;
                    }
                } else {
                    return 401;
                }
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    // private function report($queryType, $selectType, $shopname, $sellername, $image,$orderNo,$comment)
    // {
    //     try {
    //         $con = new database();
    //         if ($con->getStatus()) {
    //             $DT = new data();
    //             $query = $con->getCon()->prepare($DT->doReportData());
    //             $query->execute(array($queryType, $selectType, $shopname, $sellername, $image,$orderNo,$comment));
    //             $result = $query->fetch();
    //             if (!$result) {
    //                 $con->closeConnection();
    //                 return 1;
    //             } else {
    //                 $con->closeConnection();
    //                 return 2;
    //             }
    //         } else {
    //             $con->closeConnection();
    //             return 3;
    //         }
    //     } catch (PDOException $th) {
    //         return $th;
    //     }
    // }

    private function register($name, $email, $password, $role, $image, $qr_image, $current_add, $permanent_add, $shop_name, $contact_no, $gender, $birthday)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doRegisterData());
                $query->execute(array($name, $email, md5($password), $role, $image, $qr_image, $current_add, $permanent_add, $shop_name, $contact_no, $gender, $birthday));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return 1;
                } else {
                    $con->closeConnection();
                    return 2;
                }
            } else {
                $con->closeConnection();
                return 3;
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function addUserInfo($name, $email, $image, $current_add, $permanent_add, $contact_no, $gender, $birthday, $id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddUserInfoData());
                $query->execute(array($name, $email, $image, $current_add, $permanent_add, $contact_no, $gender, $birthday, $id));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return "Successfully";
                } else {
                    $con->closeConnection();
                    return "Try Again";
                }
            } else {
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getDisplayLock($id, $disabled)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();

                $userQuery = $con->getCon()->prepare($DT->UpdateLock());
                $userQuery->execute(array($disabled, $id));

                $productsQuery = $con->getCon()->prepare($DT->UpdateDisabledProducts());
                $productsQuery->execute(array($id));

                $con->closeConnection();
                return "SuccessfullyUpdated";
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getDisplayUnLock($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();

                // Update user_table
                $userQuery = $con->getCon()->prepare($DT->UpdateUnlockData());
                $userQuery->execute([$id]);

                // Update products table
                $productsQuery = $con->getCon()->prepare($DT->UpdateUnDisabledProducts());
                $productsQuery->execute(array($id));

                $con->closeConnection();
                return "SuccessfullyUpdated";
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function doDisplayAll()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayAllData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function doUpdateCartIdPrice($id, $quantity)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doUpdatePrice());
                $query->execute(array($quantity, $id));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return "SuccessfullyUpdated";
                } else {
                    $con->closeConnection();
                    return "FailedToInsert";
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    // private function getByIdPay($cart_id)
    // {
    //     try {
    //         $con = new database();
    //         if ($con->getStatus()) {
    //             $DT = new data();
    //             $query = $con->getCon()->prepare($DT->doGetByIdpay());
    //             $query->execute(array($cart_id));
    //             $result = $query->fetchAll();
    //             $con->closeConnection();
    //             return json_encode($result);
    //         } else {
    //             return "NotConnectedToDatabase";
    //         }
    //     } catch (PDOException $th) {
    //         return $th;
    //     }
    // }
    private function getProductById($product_ID)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doGetProductByIdData());
                $query->execute(array($product_ID));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getAllProducts($userId)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getAllProductsQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function displayAllData()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getAllProductFromIndex());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function getAddToCart($id, $product_ID)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query2 = $con->getCon()->prepare($DT->alreadyInCart());
                $query2->execute(array($id, $product_ID));
                $result2 = $query2->fetch();
                if (!$result2) {
                    $query = $con->getCon()->prepare($DT->geTAddToCartData());
                    $query->execute(array($id, $product_ID));
                    $result = $query->fetch();

                    $con->closeConnection();
                    if (!$result) {
                        $con->closeConnection();
                        return 200;
                    } else {
                        $con->closeConnection();
                        return 202;
                    }
                } else {
                    $con->closeConnection();
                    return 202;
                }
            } else {
                return 500;
            }
        } catch (PDOException $th) {
            return 500;
        }
    }

    private function getDisplayCart($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayCartData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDeleteCart($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDeleteCartData());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                if (!$result) {
                    return 200;
                } else {
                    return 404;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function getWL($id, $product_ID)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query2 = $con->getCon()->prepare($DT->alreadyExist());
                $query2->execute(array($id, $product_ID));
                $result2 = $query2->fetch();
                if (!$result2) {
                    $query = $con->getCon()->prepare($DT->ADDWL());
                    $query->execute(array($id, $product_ID));
                    $result = $query->fetch();

                    $con->closeConnection();
                    if (!$result) {
                        $con->closeConnection();
                        return 200;
                    } else {
                        $con->closeConnection();
                        return 202;
                    }
                } else {
                    $con->closeConnection();
                    return 202;
                }
            } else {
                return 500;
            }
        } catch (PDOException $th) {
            return 500;
        }
    }
    public function getAddToWishlist($id, $product_ID)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query2 = $con->getCon()->prepare($DT->alreadyExist());
                $query2->execute(array($id, $product_ID));
                $result2 = $query2->fetch();
                if (!$result2) {
                    $query = $con->getCon()->prepare($DT->getAddToWishlistData());
                    $query->execute(array($id, $product_ID));
                    $result = $query->fetch();

                    $con->closeConnection();
                    if (!$result) {
                        $con->closeConnection();
                        return 200;
                    } else {
                        $con->closeConnection();
                        return 202;
                    }
                } else {
                    $con->closeConnection();
                    return 202;
                }
            } else {
                return 500;
            }
        } catch (PDOException $th) {
            return 500;
        }
    }
    private function getDisplayWishlist($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayWishlistData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //not functional
    private function getDeleteWishlist($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDeleteWishlistData());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                if (!$result) {
                    return 200;
                } else {
                    return 404;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    // public function getCheckOut($id, $cart_id)
    // {
    //     try {
    //         $con = new database();
    //         if ($con->getStatus()) {
    //             $DT = new data();
    //             $query = $con->getCon()->prepare($DT->doCheckOut());
    //             $query->execute(array($id,$cart_id));
    //             $result = $query->fetch();
    //             $con->closeConnection();
    //             if (!$result) {
    //                 // $this->updateStatus($cart_id);
    //                 $con->closeConnection();
    //                 return 200;
    //             } else {
    //                 $con->closeConnection();
    //                 return 404;
    //             }
    //         } else {
    //             return "NotConnectedToDatabase";
    //         }
    //     } catch (PDOException $th) {
    //         return $th;
    //     }
    // }
    public function updateStatus($cart_id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query2 = $con->getCon()->prepare($DT->updateStatus());
                $query2->execute(array($cart_id));
                $result = $query2->fetch();
                $con->closeConnection();
                if (!$result) {
                    $con->closeConnection();
                    return 200;
                } else {
                    $con->closeConnection();
                    return 404;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayOrderInfo($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayOrderDetailsData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getViewOrderInfo($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayDetialsData());
                $query->execute(array($id));
                $result = $query->fetchall();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayReportInfo()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getDisplayReportData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayCustomerInfo()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getCustomerData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplaySellerInfo()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getSellerData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    // orders.php
    private function getDisplaySellerorders($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayOrdersseller());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    // customer.php
    private function getDisplayMyOrders($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayMyOrder());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    //orders.php delete
    private function getDeleteOrdersSeller($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayOrderDelete());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //order.php viewdetails
    private function getDisplayVieworders($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayOrderView());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //order.php updatestatus
    private function getUpdateStatus($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $queries = $DT->deliveredItem();

                foreach ($queries as $query) {
                    $stmt = $con->getCon()->prepare($query);
                    $stmt->execute([$id]);
                }

                $con->closeConnection();
                return json_encode(["success" => true, "message" => "Order delivered successfully"]);
            } else {
                return json_encode(["success" => false, "message" => "Not connected to the database"]);
            }
        } catch (PDOException $th) {
            return json_encode(["success" => false, "message" => $th->getMessage()]);
        }
    }
    private function getUpdateStatusPacked($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $queries = $DT->PackedItem();

                foreach ($queries as $query) {
                    $stmt = $con->getCon()->prepare($query);
                    $stmt->execute([$id]);
                }

                $con->closeConnection();
                return json_encode(["success" => true, "message" => "Order Packed successfully"]);
            } else {
                return json_encode(["success" => false, "message" => "Not connected to the database"]);
            }
        } catch (PDOException $th) {
            return json_encode(["success" => false, "message" => $th->getMessage()]);
        }
    }

    private function getUpdateStatusShipped($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $queries = $DT->ShippedItem();

                foreach ($queries as $query) {
                    $stmt = $con->getCon()->prepare($query);
                    $stmt->execute([$id]);
                }

                $con->closeConnection();
                return json_encode(["success" => true, "message" => "Order Shipped successfully"]);
            } else {
                return json_encode(["success" => false, "message" => "Not connected to the database"]);
            }
        } catch (PDOException $th) {
            return json_encode(["success" => false, "message" => $th->getMessage()]);
        }
    }
    private function getUpdateStatusArrived($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $queries = $DT->ArrivedItem();

                foreach ($queries as $query) {
                    $stmt = $con->getCon()->prepare($query);
                    $stmt->execute([$id]);
                }

                $con->closeConnection();
                return json_encode(["success" => true, "message" => "Order Arrived successfully"]);
            } else {
                return json_encode(["success" => false, "message" => "Not connected to the database"]);
            }
        } catch (PDOException $th) {
            return json_encode(["success" => false, "message" => $th->getMessage()]);
        }
    }
    private function getUpdateStatusReceive($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $queries = $DT->ReceiveItem();

                foreach ($queries as $query) {
                    $stmt = $con->getCon()->prepare($query);
                    $stmt->execute([$id]);
                }

                $con->closeConnection();
                return json_encode(["success" => true, "message" => "Order Receive successfully"]);
            } else {
                return json_encode(["success" => false, "message" => "Not connected to the database"]);
            }
        } catch (PDOException $th) {
            return json_encode(["success" => false, "message" => $th->getMessage()]);
        }
    }
    // index.php getallproducts
    private function getDisplayAllProd()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayallprod());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    // index.php getIndividual prod
    private function getDisplayEdiProd($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayediprod());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //sellers_report
    private function getSelleresReport($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displaySelleresReport());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getViewSelleres($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayMonthSellers());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getTotalSellere($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displaytotalamount());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //INVENTORY ADD PROD
    private function selleraddprod($userID, $product_image, $product_image2, $product_image3, $product_name, $product_qty, $product_price, $product_des)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddinventory());
                $query->execute(array($userID, $product_image, $product_image2, $product_image3, $product_name, $product_qty, $product_price, $product_des));

                $result = $query->fetchAll();
                if (!$result) {
                    $con->closeConnection();
                    return "Successfully";
                } else {
                    $con->closeConnection();
                    return "Try Again";
                }
            } else {
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //inventory get seller prod
    private function getAllInventory($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayInventory());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }


    //INVENTORY UPDATE  updateinventory
    private function getUpdateInventory($product_image, $product_name2, $product_name3, $product_name, $product_qty, $product_price, $product_des, $stats, $id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->updateinventory());
                $query->execute(array($product_image, $product_name2, $product_name3, $product_name, $product_qty, $product_price, $product_des, $stats, $id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //inventory get update info prod
    private function getdUpdateInventory($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayUpdateINfo());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //inventory get delete 
    private function getDeleteInventory($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->deleteInve());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    //seller chart 
    private function getchartseller($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->dchart());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function doChartAdmin()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->adminchart());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getDisplayPurch($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getPurch());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getHistory($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getHisto());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getLockseller($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->LockSeller());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                if (!$result) {
                    return 200;
                } else {
                    return 404;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function getPayment($paymethod, $image, $id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query2 = $con->getCon()->prepare($DT->paymentData());
                $query2->execute(array($paymethod, $image, $id));
                $result = $query2->fetch();
                $con->closeConnection();
                if (!$result) {
                    $this->updateStatus($id);
                    $con->closeConnection();
                    return 200;
                } else {
                    $con->closeConnection();
                    return 404;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getAddReview($review_id, $id, $seller_id, $product_ID, $review_text)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddReview());
                $query->execute(array($review_id, $id, $seller_id, $product_ID, $review_text));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return 200;
                } else {
                    $con->closeConnection();
                    return "Try Again";
                }
            } else {
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getAddVote($store_id, $sellerId, $id, $rating)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doAddVoteData());
                $query->execute(array($store_id, $sellerId, $id, $rating));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return 200;
                } else {
                    $con->closeConnection();
                    return "Try Again";
                }
            } else {
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function doDisplayReview()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayReview());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function DoBestStore()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayBestStoreData());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getRevByID($product_ID)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getRevByIDdata());
                $query->execute(array($product_ID));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayINFO($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->DisplayINFO());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getProdUsers($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->doProdUsers());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function prodByID($product_ID)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->getProdByID());
                $query->execute(array($product_ID));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function doAdminProd()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->AdminProd());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function doAdminInven()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->AdminInven());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplaySellerProfile()
    {
        try {
            $con = new database();
            $sellerID = $_SESSION["sellerID"];
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->dataDisplaySellerProfile());
                $query->execute([$sellerID]);

                $result = $query->fetch();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDataDisplaySellerProducts()
    {
        try {
            $con = new database();
            $sellerID = $_SESSION["sellerID"];
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->dataDisplaySellerProducts());
                $query->execute([$sellerID]);

                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function doSellerProduct($product_ID)
    {
        try {
            $con = new database();
            $sellerID = $_SESSION["sellerID"];
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->sellerProducts());
                $query->execute($product_ID);

                $result = $query->fetch();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getBecomeS($qr_image, $shop_name, $permanent_add, $id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->becomeS());
                $query->execute(array($qr_image, $permanent_add, $shop_name, $id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getReports($typeOfComplaints, $selectType, $shopName, $sellerName, $orderNo, $yourName, $email, $phoneNo, $comments, $image)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->report());
                $query->execute(array($typeOfComplaints, $selectType, $shopName, $sellerName, $orderNo, $yourName, $email, $phoneNo, $comments, $image));
                $result = $query->fetch();
                if (!$result) {
                    $con->closeConnection();
                    return "Successfully";
                } else {
                    $con->closeConnection();
                    return "Try Again";
                }
            } else {
                $con->closeConnection();
                return "ERROR 404";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function handleStartChat($seller_id)
    {
        try {

            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();

                $checkInboxQuery = $con->getCon()->prepare($DT->checkIfExistInbox());
                $checkInboxQuery->execute([$seller_id, $_SESSION['id']]);
                $checkInboxResult = $checkInboxQuery->fetch(PDO::FETCH_ASSOC);

                if (!$checkInboxResult) {
                    $query = $con->getCon()->prepare($DT->startInboxQuery());
                    $query->execute([$_SESSION['id'], $seller_id]);

                    $con->closeConnection();

                    return 'success';
                } else {
                    return 'existInbox';
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function HandleGetInboxData()
    {
        try {
            $con = new database();

            if ($con->getStatus()) {
                $DT = new data();

                $loggedInUserId = $_SESSION['id'];

                $query = $con->getCon()->prepare($DT->getInboxDataQuery());
                $query->execute([$loggedInUserId, $loggedInUserId, $loggedInUserId, $loggedInUserId]);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($result);
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function HandleGetInboxById($inbox_id, $sender_id, $receiver_id)
    {
        try {
            $con = new database();
            $message = "Hi, is this available?";
            $DT = new data();

            if ($con->getStatus()) {

                $checkInboxQuery = $con->getCon()->prepare($DT->checkIfExistMessageInbox());
                $checkInboxQuery->execute([$inbox_id]);
                $checkInboxResult = $checkInboxQuery->fetch(PDO::FETCH_ASSOC);


                // If not exist conversation
                if (!$checkInboxResult) {
                    $insertMessageQuery = $con->getCon()->prepare($DT->insertMessageQuery());
                    $insertMessageQuery->execute([$inbox_id, $sender_id, $receiver_id, $message]);

                    return 'startedChat';
                } else {
                    $getConversationQuery = $con->getCon()->prepare($DT->getConversationQuery());
                    $getConversationQuery->execute([$inbox_id]);
                    $getConversationResult = $getConversationQuery->fetchAll(PDO::FETCH_ASSOC);

                    return json_encode(['result' => 'fetchData', 'data' => $getConversationResult]);
                }
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function HandleSendChat($inbox_id, $sender_id, $receiver_id, $message)
    {
        try {
            $con = new database();
            $DT = new data();

            if ($con->getStatus()) {
                $insertMessageQuery = $con->getCon()->prepare($DT->insertMessageQuery());
                $insertMessageQuery->execute([$inbox_id, $sender_id, $receiver_id, $message]);

                return 'sentChat';
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getSelectID($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->SELECTID());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function doPlaceOrderHandler($paymethod, $image, $cartData)
    {
        try {
            $con = new database();
            $cartData = json_decode($cartData, true);
            $customer_id = $cartData[0]['customer_id'];
            $seller_id = $cartData[0]['seller_id'];
            $product_id = $cartData[0]['product_id'];
            $quantity = $cartData[0]['quantity'];
            $product_price = $cartData[0]['product_price'];
            $cart_id = $cartData[0]['cart_id'];
            $status = 0;

            if ($con->getStatus()) {
                $DT = new data();
                $con->getCon()->beginTransaction();

                try {
                    if ($seller_id == $_SESSION['id']) {
                        return 'Not able to use your own account.';
                    } else {
                        // Insert Query to Orders
                        $insertQuery = $con->getCon()->prepare($DT->dataOrderProcess()[0]);
                        $insertQuery->execute([$customer_id, $seller_id, $product_id, $quantity, $product_price * $quantity, $status]);

                        $transactionId = $con->getCon()->lastInsertId();

                        // Update Cart status to 1
                        $updateQuery = $con->getCon()->prepare($DT->deleteCartQuery());
                        $updateQuery->execute([$cart_id]);

                        // Update Product quantity
                        $updateProductQtyQuery = $con->getCon()->prepare($DT->dataOrderProcess()[2]);
                        $updateProductQtyQuery->execute([$quantity, $product_id]);

                        // Insert Transaction
                        $insertQueryTransaction = $con->getCon()->prepare($DT->dataOrderTransactionProcess());
                        $insertQueryTransaction->execute([$customer_id, $seller_id, $product_id, $product_price * $quantity, $quantity, $paymethod, $image, $status]);

                        $con->getCon()->commit();
                        $con->closeConnection();

                        return $transactionId;
                    }
                } catch (PDOException $e) {
                    // Rollback the transaction in case of an error
                    $con->getCon()->rollBack();
                    return "Error: " . $e->getMessage();
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDisplayReport()
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->displayReport());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getDeleteHisto($id)
    {
        try {
            $con = new database();
            if ($con->getStatus()) {
                $DT = new data();
                $query = $con->getCon()->prepare($DT->DELETEHISTO());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
}
