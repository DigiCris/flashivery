
<?php

include_once 'orderHandler.php';
/*!
* \brief       Reads all order table
* \details     Search in the database all order and returns them in an array.
* \param       (void) No param required.
* \return     $success['response'][N] (array) Returns the orders, where 'N' that indicates the position of the array to which the information about each order belongs.
     ** ['id']       (INT)    1 unique id for each order
     ** ['shop']       (VARCHAR)   Shoping name
     ** ['shopId']       (INT)   Shopping identifier
     ** ['order']       (VARCHAR)   What people asked for
     ** ['shipDate']       (DATE)   when people ordered it
     ** ['Status']       (VARCHAR)   If it's delivered or not
     ** ['price']       (VARCHAR)   total price of the order
     ** ['pickAddress']       (VARCHAR)   shopping location
     ** ['deliveryAddress']       (VARCHAR)   users location
     ** ['quarrelDescription']       (VARCHAR)   Description if there was a problem
     ** ['quarrelPicture']       (VARCHAR)   base64 picture if there was a problem
     ** ['reviewDescription']       (VARCHAR)   user's comments for shop reputation
     ** ['reviewLevel']       (INT)   How many stars users gave
     ** ['deliveryId']       (INT)   Id of the delivery guy
     ** ['deliveryMoney']       (VARCHAR)   How much of price goes to delivery
     ** ['userId']       (INT)   Id of the user that ordered
* \return      $success['success'] (bool) Returns true if the request was succesful, false if not.
* \return      $success['msg'] (string) Returns a message explaining the status of the execution.
* * \return • 'orders fetched.' -> When was able to read all the orders in the database.
* * \return • 'We could not fetch the orders.' -> When there are no orders loaded in the database or it could not be connected to it.
*/
function getAll() {
    $register = new order();
    $success['response'] = $register->readAll();

    if($success['response']) {
        $success['success'] = true;
        $success['msg'] = 'orders fetched.';
    }else {
        $success['success'] = false;
        $success['msg'] = 'We could not fetch the orders.';
    }
    return $success;
}
    
?>
    