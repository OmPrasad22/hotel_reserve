// Tabs

let pathname = window.location.pathname;
let pagename = pathname.split("/").pop();
if(pagename === "admin.php"){
    document.querySelector(".dash").classList.add("activelink");
}
if(pagename === "admin_addhotel.php"){
    document.querySelector(".add").classList.add("activelink");
}
if(pagename === "admin_edithotel.php" || pagename === "admin_actionhotel.php"){
    document.querySelector(".edit").classList.add("activelink");
}

function re(){
    window.location.reload()=true;
}