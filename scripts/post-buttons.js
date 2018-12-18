// Heart Icon
let heartIcons = document.querySelectorAll(".user-post .button-like");


for(let i = 0; i < heartIcons.length; i++){
    let heartIcon = heartIcons[i];
    heartIcon.addEventListener("click", handleHeartIconClick);
}

function handleHeartIconClick(e){
    let heartIcon = e.currentTarget;
    
    let heartPostCounts = document.querySelectorAll(".user-post .like-counter a");
    let heartIconsConfirms = document.querySelectorAll(".user-post .button-like");
    let heartPostCount;
    let heartIconsConfirm;
    for(i=0;i<heartPostCounts.length;i++){
        heartPostCount = heartPostCounts[i];
        heartIconsConfirm = heartIconsConfirms[i];
        if(heartIconsConfirm == heartIcon){
            break;
        }
    }


    let heartCount = document.getElementById("info-like-count");
    if(heartIcon.src.match("icon_srce.png")){
        heartIcon.src = "images/icons/icon_srce_full.png";
        heartCount.innerHTML = parseInt(heartCount.innerHTML) + 1;
        heartPostCount.innerHTML = parseInt(heartPostCount.innerHTML) + 1;
    }
    else {
        heartIcon.src = "images/icons/icon_srce.png";
        heartCount.innerHTML = parseInt(heartCount.innerHTML) - 1;
        heartPostCount.innerHTML = parseInt(heartPostCount.innerHTML) - 1;
    }
}

// Bookmark Icon
let bookmarkIcons = document.querySelectorAll(".user-post .button-save");

for(let i = 0; i < bookmarkIcons.length; i++){
    let bookmarkIcon = bookmarkIcons[i];
    bookmarkIcon.addEventListener("click", handleBookmarkIconClick);
}

function handleBookmarkIconClick(e){
    let bookmarkIcon = e.currentTarget;
    let bookmarkCount = document.getElementById("info-bookmark-count");
    if(bookmarkIcon.src.match("icon_save.png")){
        bookmarkIcon.src = "images/icons/icon_save_full.png";
        bookmarkCount.innerHTML = parseInt(bookmarkCount.innerHTML) + 1;
    }
    else {
        bookmarkIcon.src = "images/icons/icon_save.png";
        bookmarkCount.innerHTML = parseInt(bookmarkCount.innerHTML) - 1;
    }
}


// Search
let search = document.querySelector("#search-box");
search.addEventListener("keyup", searchBox);

function searchBox() {
    var input, filter, card, a, b, i, textValue;
    input = document.getElementById("search-box");
    filter = input.value.toUpperCase();
    card = document.getElementsByClassName("user-post");
    for (i = 0; i < card.length; i++) {     
        textValue = card[i].textContent;

        if ((textValue.toUpperCase().indexOf(filter) >= 0)) {
            card[i].style.display = "";
        } else {
            card[i].style.display = "none";
        }
    }
}





// Main Heart
let  mainHeart= document.querySelector("#menu-heart-icon");
mainHeart.addEventListener("click", handleCountHeartClick);


function handleCountHeartClick(e){
    let mainHeart = e.currentTarget;
    if(mainHeart.src.match("icon_srce.png")){
        mainHeart.src = "images/icons/icon_srce_full.png";
        let countHearts = document.querySelectorAll(".user-post .button-like");
        for(i = 0; i < countHearts.length; i++){
            let countHeart = countHearts[i];
            if(countHeart.src.match("icon_srce_full.png")){
                countHeart.parentElement.parentElement.parentElement.parentElement.style.display = "";
            }
            else{
                countHeart.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            }
        }
    }
    else {
        mainHeart.src = "images/icons/icon_srce.png";
        let countHearts = document.querySelectorAll(".user-post .button-like");
        for(i = 0; i < countHearts.length; i++){
            let countHeart = countHearts[i];
            countHeart.parentElement.parentElement.parentElement.parentElement.style.display = "";
        }
    }
}

// Main Profile
let  mainProfile= document.querySelector("#menu-profile-icon");
mainProfile.addEventListener("click", handleCountProfileClick);


function handleCountProfileClick(e){
    let mainProfile = e.currentTarget;
    let activeUser = document.querySelector("#profile .info h2");
    if(mainProfile.src.match("icon_profil.png")){
        mainProfile.src = "images/icons/icon_profil_full.png";
        let countPosts = document.querySelectorAll(".post-user-info .info h2");
        for(i = 0; i < countPosts.length; i++){
            let countPost = countPosts[i];
            if(countPost.innerHTML == activeUser.innerHTML){
                countPost.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = "";
            }
            else{
                countPost.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            }
        }
    }
    else {
        mainProfile.src = "images/icons/icon_profil.png";
        let countPosts = document.querySelectorAll(".post-user-info .info h2");
        for(i = 0; i < countPosts.length; i++){
            let countPost = countPosts[i];
            countPost.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = "";
        }
    }
}


// Comment Focus
let  commentButtons = document.querySelectorAll(".user-post .button-comment");

for(i=0;i<commentButtons.length;i++){
    let commentButton = commentButtons[i];
    commentButton.addEventListener("click", handleCommentButtonClick);
}

function handleCommentButtonClick(e){
    let commentButton = e.currentTarget;
    let commentButtonsCompares = document.querySelectorAll(".user-post .button-comment");
    let commentSections = document.querySelectorAll(".post-add-comment .comment-text");
    let commentSection;
    for(i=0; i<commentButtonsCompares.length;i++){
        let commentButtonsCompare = commentButtonsCompares[i];
        commentSection = commentSections[i];
        if(commentButtonsCompare == commentButton){
            break;
        }
    }
    commentSection.focus();
}

// Add New Post
let addPostButton = document.querySelector(".add-post-button a");
addPostButton.addEventListener("click", e=> {
    let postUser = document.querySelector("#profile .info h2").textContent;
    let postUserImage = document.querySelector("#profile img").src;
    let postLocation = prompt("Unesite lokaciju gdje je slikana fotografija:", "Split, Hrvatska");
    if(!postLocation) {
        return;
    }
    let postImage = prompt("Unesite URL slike:", "images/posts/posts_image4.jpg");
    if(!postImage) {
        return;
    }
    let postDescription = prompt("Unesi opis kartice:", "Opis");
    if(!postDescription) {
        return;
    }
    let postTags = prompt("Unesi oznake:", "#oznaka");
    if(!postTags) {
        return;
    }

    let postTemplate = document.querySelector("#user-post");
    let postsElement = document.importNode(postTemplate.content, true);
    
    // Post Header
    postsElement.querySelector(".post-user-info img").src = postUserImage;
    postsElement.querySelector(".info h2").textContent = postUser;
    postsElement.querySelector(".info p").textContent = postLocation;
    
    // Post Image
    postsElement.querySelector(".post-user-image img").src = postImage;

    // Post Description
    postsElement.querySelector(".post-image-info .image-message-user").textContent = postUser;
    postsElement.querySelector(".post-image-info .image-message").textContent = postDescription;
    

    // Post Tags
    postsElement.querySelector(".image-tags").textContent = postTags;

    // Enable addEventListener
    postsElement.querySelector(".user-post .button-like").addEventListener("click", handleHeartIconClick);
    postsElement.querySelector(".user-post .button-save").addEventListener("click", handleBookmarkIconClick);
    postsElement.querySelector(".user-post .button-comment").addEventListener("click", handleCommentButtonClick); 
    postsElement.querySelector(".post-add-comment .submit-comment").addEventListener("click", handleSubmitCommentButton); 
    postsElement.querySelector(".comment-text").addEventListener('keyup', function(e){
        if (e.keyCode === 13) {
            handleSubmitCommentButton(e);
      }
    });

    let postContainer = document.querySelector("#posts .posts-container");
    let secondElement = postContainer.childNodes[1];

    secondElement.parentNode.insertBefore(postsElement, secondElement.nextSibling);
});

// Add Comment
let submitCommentButtons = document.querySelectorAll(".post-add-comment .submit-comment");

for(i = 0; i < submitCommentButtons.length; i++){
    let submitCommentButton = submitCommentButtons[i];
    submitCommentButton.addEventListener("click", handleSubmitCommentButton);
    submitCommentButton.parentElement.querySelector(".comment-text").addEventListener('keyup', function(e){
        if (e.keyCode === 13) {
            handleSubmitCommentButton(e);
        }
    });
}

function handleSubmitCommentButton(e){
    let submitButton = e.currentTarget;
    let addComment = submitButton.parentElement;
    let commentText = addComment.querySelector(".comment-text");

    if(commentText.value !== ""){
        let commentSection = addComment.parentElement.querySelector(".post-comment-section");
        let newComment = document.createElement("div");
        newComment.className = "comment";
        let newCommentUser = document.createElement("a");
        newCommentUser.href = "/";
        newCommentUser.style.margin = "0 5px 0 0";
        let newCommentText = document.createElement("p");

        newCommentUser.textContent = document.querySelector("#profile .info h2").textContent;
        newCommentText.textContent = commentText.value;

        commentSection.appendChild(newComment);
        newComment.appendChild(newCommentUser);
        newComment.appendChild(newCommentText);
    }
    commentText.value= "";
}
 

// Recomended post - remove
let removeRecomendedElements = document.querySelectorAll("#posts-recomended .delete-button");

for(i = 0; i < removeRecomendedElements.length; i++){
    let removeRecomendedElement = removeRecomendedElements[i];
    removeRecomendedElement.addEventListener("click", handleRemoveRecomendedElementClick);
}

function handleRemoveRecomendedElementClick(e){
    let removeRecomendedElement = e.currentTarget;
    let recomendedElement = removeRecomendedElement.parentElement;
    let recomendedElementParent = recomendedElement.parentElement;
    let recomendedDelete = recomendedElementParent.parentElement.parentElement;
    
    
    let checkSecondRecomendedSection = document.querySelectorAll("#recomended .recomended-element");
    for(i = 0; i < checkSecondRecomendedSection.length; i++){
        if(checkSecondRecomendedSection[i].querySelector(".name h2").innerText == recomendedElement.querySelector(".name h2").innerText){
            checkSecondRecomendedSection[i].remove();
        }
    }
    recomendedElement.remove();

    if(recomendedElementParent.childElementCount == 0){
        recomendedDelete.remove();
        
    }

    let secondCheck = document.querySelector("#recomended .recomended-container");
    if(secondCheck.childElementCount == 1) {
        secondCheck.remove();
    }
}

// Recomended post - follow and remove
let recomendedButtons1 = document.querySelectorAll("#posts-recomended .follow a");
let recomendedButtons2 = document.querySelectorAll("#recomended .follow a");

for(i = 0; i < recomendedButtons1.length; i++){
    let recomededButton1 = recomendedButtons1[i];
    recomededButton1.addEventListener("click", handleRecomendedButton1Click);
}

function handleRecomendedButton1Click(e){
    let recomededButton1 = e.currentTarget;
    let recomededButton1Parent = recomededButton1.parentElement.parentElement;
    let recomededButton1Name = recomededButton1.parentElement.parentElement.querySelector(".name h2");
    let recomededParent = recomededButton1Parent.parentElement;
    let recomededGrandParent = recomededParent.parentElement.parentElement;

    let recomededButton2Name = document.querySelectorAll("#recomended .name h2");

    for(i=0; i<recomededButton2Name.length; i++){
        let recomededButton2 = recomededButton2Name[i].parentElement.parentElement.parentElement.parentElement;
        if(recomededButton2Name[i].innerHTML == recomededButton1Name.innerHTML){
            recomededButton2.remove();
        }
    }
    
    recomededButton1Parent.remove();
    if(recomededParent.childElementCount == 0){
        recomededGrandParent.remove();
    }

    let check = document.querySelector("#recomended .recomended-container");
    if(check.childElementCount == 1){
        check.parentElement.remove();
    }

    let followCounter = document.querySelector("#info-user-count");
    followCounter.innerHTML = parseInt(followCounter.innerHTML) + 1;
} 



for(i = 0; i < recomendedButtons2.length; i++){
    let recomededButton2 = recomendedButtons2[i];
    recomededButton2.addEventListener("click", handleRecomendedButton2Click);
}



function handleRecomendedButton2Click(e){
    let recomededButton2 = e.currentTarget;
    let recomededButton2Parent = recomededButton2.parentElement.parentElement;
    let recomededButton2Name = recomededButton2Parent.querySelector(".name h2");

    let recomededParent = recomededButton2Parent.parentElement;
    let recomededGrandParent = recomededParent.parentElement;

    let recomededButton1Name = document.querySelectorAll("#posts-recomended .name h2");

    for(i=0; i<recomededButton1Name.length; i++){
        let recomededButton1 = recomededButton1Name[i].parentElement.parentElement.parentElement.parentElement;
        if(recomededButton1Name[i].innerHTML == recomededButton2Name.innerHTML){
            recomededButton1.remove();
        }
    }

    recomededButton2Parent.remove();
    if(recomededParent.childElementCount == 1){
        recomededGrandParent.remove();
    }

    let check = document.querySelector("#posts-recomended .elements");
    if(check.childElementCount == 0){
        check.parentElement.parentElement.remove();
    }

    let followCounter = document.querySelector("#info-user-count");
    followCounter.innerHTML = parseInt(followCounter.innerHTML) + 1;
} 
