
<?php

include_once 'userHandler.php';

/*!
* \brief       delete all that matches username in user
* \details     Search in the database user that matches username and delete it if it exists.
* \param       (VARCHAR) username The identifier of the row/rows in the user table to delete.
* \return    $success['response'] (bool) Returns true if the row/rows was/were deleted, false if not.
* \return    $success['success'] (bool) Returns true if the request was succesful, false if not.
* \return    $success['msg'] (string) Returns a message explaining the status of the execution.
** \return • 'user deleted.' -> When was able to delete the user row/rows.
** \return • 'It was not possible to erase the user row/rows requested. Try again later.' -> When it fails to delete the row.
** \return • 'This user did not exist.' -> When the user username was not found or did not exist. 
*/
function deleteByUsername($username) {
    $register = new user();
    $exists = $register->readUsername($username);

    if(count($exists) > 0) {
        $success['response'] = $register->deleteByUsername($username);
        $exists = $register->readUsername($username);
        if(count($exists) > 0) {
            $success['success'] = false;
            $success['msg'] = 'It was not possible to erase the user row/rows requested. Try again later.';
        }else {
            $success['success'] = true;
            $success['msg'] = 'user deleted.';
        }
    }else {
        $success['success'] = false;
        $success['msg'] = 'This user did not exists.';
    }
    return $success;
}
        
?>
    