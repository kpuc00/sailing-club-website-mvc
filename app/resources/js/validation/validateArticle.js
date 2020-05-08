function validate(){
    let title = document.getElementById("title");
    let content = document.getElementById("content");

    if (title.value == "") {
        title.placeholder = "The title is required!";
        title.style.borderColor = "red";
        title.style.borderWidth = "2px";
        return false;
    }
    else {
        title.style.borderColor = "#ccc";
        title.style.borderWidth = "1px";
        true;
    }
    if (content.value == "") {
        content.placeholder = "The content is required!";
        content.style.borderColor = "red";
        content.style.borderWidth = "2px";

        return false;
    }
    else {
        content.style.borderColor = "#ccc";
        content.style.borderWidth = "1px";
        true;
    }
    if (content.value.length > 1000) {
        content.placeholder = "The article content is too long!";
        content.fontcolor = "red"; 
        content.style.borderColor = "red";
        content.style.borderWidth = "2px";
        return false;
    }
    else {
        content.style.borderColor = "#ccc";
        content.style.borderWidth = "1px";
        true;
    }
}