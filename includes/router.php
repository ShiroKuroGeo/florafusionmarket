<?php
session_start();
require("backend.php");

$method = $_POST['method'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo 'Function not exist';
}

function Login()
{
    $backend = new backend();
    echo $backend->doLogin($_POST['email'], $_POST['password']);
}

function Register()
{
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['image']['name'])) {
        $filename = $location . $_FILES["image"]['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
            $filename = $_FILES["image"]['name'];
        }
    }
    $location = "../assets/img/";    
    $qrname = "";

    if ($_POST['role'] == '2') {
        if (isset($_FILES['gcash_image']['name'])) {
            $qrname = $location . $_FILES["gcash_image"]['name'];
            
            if (move_uploaded_file($_FILES['gcash_image']['tmp_name'], $qrname)) {
                $qrname = $_FILES["gcash_image"]['name'];
            }
        }
    }

    echo $backend->doRegister($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'],$filename,$qrname,$_POST['current_add'],$_POST['permanent_add'],$_POST['shop_name'],$_POST['contact_no'],$_POST['gender'], $_POST['birthday']);
}
// function AddReport()
// {
//     $backend = new backend();
//     $location = "../assets/img/";
//     $filename = "";
//     if (isset($_FILES['image']['name'])) {
//         $filename = $location . $_FILES["image"]['name'];
//         if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
//             $filename = $_FILES["image"]['name'];
//         }
//     }
//     $queryType = $_POST['queryType'];
//     $selectType = $_POST['selectType'];
//     $shopname = $_POST['shopname'];
//     $sellername = $_POST['sellername'];
//     $orderNo = $_POST['orderNo'];
//     $comment = $_POST['comment'];

//     echo $backend->doReport($queryType, $selectType, $shopname, $sellername, $filename,$orderNo, $comment, $_SESSION['id']);

// }


function addUserInfo()
{
    $backend = new Backend(); 
    $location = "../assets/img/";
    $filename = $_SESSION['image']; 

    if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
        $newFilename = $location . $_FILES["file"]['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $newFilename)) {
            $filename = $_FILES["file"]['name'];
        }
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $current_add = $_POST['current_add'];
    $permanent_add = $_POST['permanent_add'];
    $contact_no = $_POST['contact_no'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    // Update session variables
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['current_add'] = $current_add;
    $_SESSION['permanent_add'] = $permanent_add;
    $_SESSION['contact_no'] = $contact_no;
    $_SESSION['gender'] = $gender;
    $_SESSION['birthday'] = $birthday;
    $_SESSION['image'] = $filename;
    
    
    echo $backend->doAddUserInfo($name, $email, $filename, $current_add, $permanent_add, $contact_no, $gender, $birthday, $_SESSION['id']);
}
function getProductById()
{
    $backend = new backend();
    echo $backend->doGetProductById($_POST['product_ID']);
}
function sellerProduct()
{
    $backend = new backend();
    echo $backend->getSellerProduct($_POST['product_ID']);
}
// function getByIdPay()
// {
//     $backend = new backend();
//     echo $backend->doGetByIdPay($_POST['id']);
// }
function getAllProducts()
{
    $backend = new backend();
    echo $backend->doGetAllProducts($_SESSION['id']);
}
function getAllProductFromIndex()
{
    $backend = new backend();
    echo $backend->doGetAllProductFromIndex();
}
function adminProd()
{
    $backend = new backend();
    echo $backend->getAdminProd();
}
function admininven()
{
    $backend = new backend();
    echo $backend->getAdminInven();
}
function displayAll(){
    $backend = new backend();
    echo $backend->getDisplayAll();
}
function addToCart(){
    $backend = new backend();
    echo $backend->doAddToCart($_SESSION['id'],$_POST['product_ID']);
}
function DisplayCart(){
    $backend = new backend();
    echo $backend->doDisplayCart($_SESSION['id']);
}
function DeleteCart(){
    $backend = new backend();
    echo $backend->doDeleteCart($_POST['id']);
}
function addToWishlist(){
    $backend = new backend();
    echo $backend->doAddToWishlist($_SESSION['id'],$_POST['product_ID']);
}
function wl(){
    $backend = new backend();
    echo $backend->doWL($_SESSION['id'],$_POST['product_ID']);
}
function updateCartIdPrice(){
    $backend = new backend();
    echo $backend->updateCartIdPrice($_POST['cart_id'], $_POST['quantity']);
}
function dipslayWishlist(){
    $backend = new backend();
    echo $backend->doDisplayWishlist($_SESSION['id']);
}
function deleteWishlist(){
    $backend = new backend();
    echo $backend->doDeleteWishlist($_POST['id']);
}
// function checkOut(){
//     $backend = new backend();
//     echo $backend->doCheckOut($_SESSION['id'],$_POST['id']);
// }
function displayOrderInfo(){
    $backend = new backend();
    echo $backend->doDisplayOrderInfo($_SESSION['id']);
}
function viewOrderInfo(){
    $backend = new backend();
    echo $backend->doViewOrderInfo($_POST['id']);
}
//not display
function displayCustomerInfo(){
    $backend = new backend();
    echo $backend->doDisplayCustomerInfo();
}
function displayReportInfo(){
    $backend = new backend();
    echo $backend->doDisplayReportInfo();
}
//not display
function displaySellerInfo(){
    $backend = new backend();
    echo $backend->doDisplaySellerInfo();
}
function UnlockAccount(){
    $backend = new backend();
    echo $backend->DoUnlockAccount($_POST['id'] ,  $_POST['disabled']);
}
function LockAccount(){
    $backend = new backend();
    echo $backend->DoLockAccount($_POST['id'] ,  $_POST['disabled']);
}

// orders.php
function displayAllOrders(){
    $backend = new backend();
    echo $backend->doDisplayOrdersSellers($_SESSION['id']);
}
// orders.php
function displayAllMyOrders(){
    $backend = new backend();
    echo $backend->doDisplayMyOrders($_SESSION['id']);
}
// delete order.php 
function deletesellersOrders(){
    $backend = new backend();
    echo $backend->doDeleteOrdersSeller($_POST['id']);
}

// view order.php 
function viewsellersOrders(){
    $backend = new backend();
    echo $backend->doViewOrdersSeller($_POST['id']);
}

//order.php updatestatus
function updatestatusOrders(){
    $backend = new backend();
    echo $backend->doUpdateStatus($_POST['id']);
}
function updatestatusPacked(){
    $backend = new backend();
    echo $backend->doUpdateStatusPacked($_POST['id']);
}
function updatestatusShipped(){
    $backend = new backend();
    echo $backend->doUpdateStatusShipped($_POST['id']);
}
function updatestatusArrived(){
    $backend = new backend();
    echo $backend->doUpdateStatusArrived($_POST['id']);
}

function updatestatusReceive(){
    $backend = new backend();
    echo $backend->doUpdateStatusReceive($_POST['id']);
}

// index.php display all products
function displayallprod(){
    $backend = new backend();
    echo $backend->doDisplayAllP();
}

//index.php individual
function displayIndip(){
    $backend = new backend();
    echo $backend->doDisplayEdiP($_POST['id']);
}

//sellers_report
function displaySellReport(){
    $backend = new backend();
    echo $backend->doDisplaySellersRe($_SESSION['id']);
}

function displayViewReport(){
    $backend = new backend ();
    echo $backend->doViewSeller($_POST['id']);
}

function displayTotalAmount(){
    $backend = new backend();
    echo $backend->doTotalAmount($_POST['id']);
}

function addSellprod(){
    $backend = new backend();
    $location = "../assets/img/";
    $filename = '';
    if (isset($_FILES['file']['name'])) {

        $finalfile = $location . $_FILES["file"]['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $finalfile)) {
            $filename = $_FILES["file"]['name'];
        }

    }
    $location = "../assets/img/";
    $filename2 = '';
    if (isset($_FILES['file2']['name'])) {

        $finalfile = $location . $_FILES["file2"]['name'];
        if (move_uploaded_file($_FILES['file2']['tmp_name'], $finalfile)) {
            $filename2 = $_FILES["file2"]['name'];
        }

    }
    $location = "../assets/img/";
    $filename3 = '';
    if (isset($_FILES['file3']['name'])) {

        $finalfile = $location . $_FILES["file3"]['name'];
        if (move_uploaded_file($_FILES['file3']['tmp_name'], $finalfile)) {
            $filename3 = $_FILES["file3"]['name'];
        }

    }
    echo $backend->doSelleraddprod($_SESSION['id'],$filename,$filename2,$filename3,$_POST['pname'],$_POST['pquantity'],$_POST['pprice'],$_POST['desc']);
}

function displayAllinve(){
    $backend = new backend();
    echo $backend->doDisplayAllInve($_SESSION['id']);
}

function displayUPAllinve(){
    $backend = new backend();
    echo $backend->doDisplaydAllInve($_POST['id']);
}

function updateinve(){
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['fileToUpload']['name'])) {
        $filename = $location . $_FILES["fileToUpload"]['name'];
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $filename)) {
            $filename = $_FILES["fileToUpload"]['name'];
        }
    }
    $location = "../assets/img/";
    $filename2 = "";
    if (isset($_FILES['fileToUpload2']['name'])) {
        $filename2 = $location . $_FILES["fileToUpload2"]['name'];
        if (move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $filename2)) {
            $filename2 = $_FILES["fileToUpload2"]['name'];
        }
    }
    $location = "../assets/img/";
    $filename3 = "";
    if (isset($_FILES['fileToUpload3']['name'])) {
        $filename3 = $location . $_FILES["fileToUpload3"]['name'];
        if (move_uploaded_file($_FILES['fileToUpload3']['tmp_name'], $filename3)) {
            $filename3 = $_FILES["fileToUpload3"]['name'];
        }
    }
    echo $backend->doUpdateInven($filename,$filename2,$filename3,$_POST['pname'],$_POST['pquantity'],$_POST['pprice'],$_POST['desc'], $_POST['status'],$_POST['id']);
}
function deleteIn(){
    $backend = new backend();
    echo $backend->doDeleteInve($_POST['id']);
}

//seller chart
function doDSchart(){
    $backend = new backend();
    echo $backend->doDisplaySchart($_SESSION['id']);
}
function doAdminchart(){
    $backend = new backend();
    echo $backend->getAdminChart();
}

function displayPurchace(){
    $backend = new backend();
    echo $backend->doDisplayPurch($_SESSION['id']);
}
function history(){
    $backend = new backend();
    echo $backend->doHistory($_SESSION['id']);
}
function payMethod(){
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['image']['name'])) {
        $filename = $location . $_FILES["image"]['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
            $filename = $_FILES["image"]['name'];
        }
    }
    echo $backend->doPayment($_POST['paymethod'],$filename, $_POST['cart_id']);
}
function displayINFO(){
    $backend = new backend();
    echo $backend->doDisplayINFO($_SESSION['id']);
}
function addReview(){
    $backend = new backend();
    echo $backend->doAddReview($_POST['review_id'],$_SESSION['id'],$_POST['seller_id'],$_POST['product_ID'],$_POST['reviewText']);
}
function displayReview(){
    $backend = new backend();
    echo $backend->getDisplayReview();
}
function displayBestStore(){
    $backend = new backend();
    echo $backend->getdisplayBestStore();
}
function getRevBYproductID(){
    $backend = new backend();
    echo $backend->doRevByID($_POST['product_ID']);
}
function displayProdUsers(){
    $backend = new backend();
    echo $backend->prodUsers($_SESSION['id']);
}
function getUserProdByID(){
    $backend = new backend();
    echo $backend->userProdByID($_POST['product_ID']);
}
function getSellerID(){
    $backend = new backend();
    echo $backend->DoSellerID($_POST['userID']);
}
function displaySellerProfile(){
    $backend = new backend();
    echo $backend->DoDisplaySellerProfile();
}
function dataDisplaySellerProducts()
{
    $backend = new backend();
    echo $backend->dataDisplaySellerProducts();
}
function addVote(){
    $backend = new backend();
    echo $backend->doAddVote($_POST['stores_id'],$_POST['seller_id'],$_SESSION['id'],$_POST['rating']);
}
function becomeS(){
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['qr_image']['name'])) {
        $filename = $location . $_FILES["qr_image"]['name'];
        if (move_uploaded_file($_FILES['qr_image']['tmp_name'], $filename)) {
            $filename = $_FILES["qr_image"]['name'];
        }
    }
    echo $backend ->doBecomeS($filename,$_POST['shop_name'],$_POST['permanent_add'],$_SESSION['id']);
}
function reports()
{
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['image']['name'])) {
        $filename = $location . $_FILES["image"]['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
            $filename = $_FILES["image"]['name'];
        }
    }
    echo $backend->doReports($_POST['queryType'],$_POST['selectType'],$_POST['shopName'],$_POST['sellerName'],$_POST['orderNo'],$_POST['yourName'],$_POST['email'],$_POST['phoneNo'],$_POST['comments'],$filename);
}
function startChat()
{
    $backend = new backend();
    echo $backend->doStartChat($_POST['seller_id']);
}
function getInboxData()
{
    $backend = new backend();
    echo $backend->doGetInboxData();
}
function getInboxById()
{
    $backend = new backend();
    echo $backend->DoGetInboxById($_POST['inbox_id'], $_POST['sender_id'], $_POST['receiver_id']);
}
function sendChat()
{
    $backend = new backend();
    echo $backend->DoSendChat($_POST['inbox_id'], $_POST['sender_id'], $_POST['receiver_id'], $_POST['message']);
}
function selectID()
{
    $backend = new backend();
    echo $backend->DoSelectID($_POST['id']);
}
function placeOrder(){
    $backend = new backend();
    $location = "../assets/img/";
    $filename = "";
    if (isset($_FILES['image']['name'])) {
        $filename = $location . $_FILES["image"]['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
            $filename = $_FILES["image"]['name'];
        }else {
            // Handle file upload error
            echo "File upload failed with error code: " . $_FILES['image']['error'];
        }
    }
    echo $backend->doPlaceOrder($_POST['paymethod'],$filename, $_POST['cartData']);
}
function displayReport()
{
    $backend = new backend();
    echo $backend->doDisplayReport();
}
function DeleteHISTO()
{
    $backend = new backend();
    echo $backend->doDeleteHisto($_POST['id']);
}
?>