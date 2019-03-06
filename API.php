<?php

require_once("php/cards.php");

function processRequest(){
    $action = getRequestParameter("action");
    switch ($action) {
        case 'toggleNewComment':
            processNewComment();
            break;
        case 'toggleNewPost':
            processNewPost();
            break;

        case 'toggleLike':
            processLike();
            break;
        case 'toggleDislike':
            processDislike();
            break;

        case 'toggleTotalLike':
            processTotalLike();
            break;
        case 'toggleTotalDislike':
            processTotalDislike();
            break;

        case 'toggleBookmarkUp':
            processBookmarkUp();
            break;
        case 'toggleBookmarkDown':
            processBookmarkDown();
            break;
        case 'toggleTotalBookmarkUp':
            processTotalBookmarkUp();
            break;
        case 'toggleTotalBookmarkDown':
            processTotalBookmarkDown();
            break;

        default:
            echo(json_encode(array(
            "success" => false,
            "reason" => "Unknown action: $action"
        )));
        break;
    }
   }
   

// getRequestParameter("action") -> "deleteCard"
// getRequestParameter("actiondasgdajk") -> ""
function getRequestParameter($key) {
    // $_REQUEST[$key] -> asocijativna mapa s kljuÄevima i vrijednostima iz zahtjeva
    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : "";
}

//API.php?action=toggleNewComment&id=${postId}&user=${commentAuthor}&text=${commentText}
function processNewComment(){
    $success = false;
    $reason = "";

    $id = getRequestParameter("id");
    $user = getRequestParameter("user");
    $text = getRequestParameter("text");

    if (is_numeric($id)) {
        toggleNewComment($id, $user, $text);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleNewPost&user=${postUser}&userimg=${postUserImage}&location=${postLocation}&image=${postUserImage}&description=${postDescription}&tags=${postTags}
function processNewPost(){
    $success = false;
    $reason = "";

    $user = getRequestParameter("user");
    $userimg = getRequestParameter("userimg");
    $location = getRequestParameter("location");
    $image = getRequestParameter("image");
    $description = getRequestParameter("description");
    $tags = getRequestParameter("tags");

    $latestID;

    if (1) {
        $latestID = toggleNewPost($user, $userimg, $location, $image, $description, $tags);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason,
        "latestID" => $latestID
    )));
}

//API.php?action=toggleLike&id=${postId}&liked=${liked}
function processLike(){
    $success = false;
    $reason = "";

    $id = getRequestParameter("id");
    $liked = getRequestParameter("liked");

    if (is_numeric($id)) {
        toggleLike($id, $liked);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleDislike&id=${postId}&liked=${liked}
function processDislike(){
    $success = false;
    $reason = "";

    $id = getRequestParameter("id");
    $liked = getRequestParameter("liked");

    if (is_numeric($id)) {
        toggleDislike($id, $liked);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleTotalLike&id=${postId}
function processTotalLike(){
    $success = false;
    $reason = "";

    $user = getRequestParameter("user");

    if (1) {
        toggleTotalLike($user);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleTotalDislike&id=${postId}
function processTotalDislike(){
    $success = false;
    $reason = "";

    $user = getRequestParameter("user");

    if (1) {
        toggleTotalDislike($user);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}


//API.php?action=toggleBookmarkUp&id=${postId}&bookmarked=${bookmarkedUp}
function processBookmarkUp(){
    $success = false;
    $reason = "";

    $id = getRequestParameter("id");
    $bookmarked = getRequestParameter("bookmarked");

    if (is_numeric($id)) {
        toggleBookmarkUp($id, $bookmarked);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleBookmarkDown&id=${postId}&bookmarked=${bookmarkedDown}
function processBookmarkDown(){
    $success = false;
    $reason = "";

    $id = getRequestParameter("id");
    $bookmarked = getRequestParameter("bookmarked");

    if (is_numeric($id)) {
        toggleBookmarkDown($id, $bookmarked);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleTotalBookmarkUp&user=${user}
function processTotalBookmarkUp(){
    $success = false;
    $reason = "";

    $user = getRequestParameter("user");

    if (1) {
        toggleTotalBookmarkUp($user);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

//API.php?action=toggleTotalBookmarkDown&user=${user}
function processTotalBookmarkDown(){
    $success = false;
    $reason = "";

    $user = getRequestParameter("user");

    if (1) {
        toggleTotalBookmarkDown($user);
        $success = true;
    } 
    else {
        $success = false;
        $reason = "Needs id:number; like:number";
    }
    echo(json_encode(array(
        "success" => $success,
        "reason" => $reason
    )));
}

processRequest();
