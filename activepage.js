// Tabs

let pathname = window.location.pathname;
let pagename = pathname.split("/").pop();

if(pagename === "index.php"){
    document.querySelector(".home").classList.add("activelink");
}
if(pagename === "hotel.php" || pagename === "checkav.php"){
    document.querySelector(".hotel").classList.add("activelink");
}
if(pagename === "services.php"){
    document.querySelector(".services").classList.add("activelink");
}
if(pagename === "blog.php"){
    document.querySelector(".blog").classList.add("activelink");
}
if(pagename === "contact.php"){
    document.querySelector(".contact").classList.add("activelink");
    // Offline Map
    
    let off = document.getElementById("online");
    let show = document.getElementById("status");
    if(!navigator.onLine){
        off.src = "Components/offlinemap.png";
        show.style.display = "block";
    }
}
if(pagename === "login.php" || pagename === "signup.php"){
    document.querySelector(".login").classList.add("activelink");
}
if(pagename === "profile.php"){
    document.querySelector(".profile").classList.add("activelink");
}

let s = document.getElementById("chatdiv");
let schat = 0;
function chat(){
    if(schat == 0){
        s.style.display="block";
        schat = 1;
    }
    else{
        s.style.display="none";
        schat = 0;
    }
}
window.addEventListener('mouseup',function(event){
    let sb = document.getElementById("chatbtn");
    if(event.target != s && event.target.parentNode != sb && event.target.parentNode != s){
        schat = 1;
        chat();
    }
});  

function chatappen(){
    let inp = document.getElementById("chatinp");
    let dpimg = document.getElementById("dp");
    let messagesDiv = document.getElementById("messdiv");
    let item = document.querySelector("#messdiv");
    let newItem = document.createElement("div");
    let error = document.createElement("div");
    newItem.innerHTML=`<label for="bot" id="user" name="user">${inp.value}<img src="Components/${dpimg.innerHTML}" alt=""></label>`;
    error.innerHTML=`<label for="bot" id="bot" name="bot"><img src="Components/svg/chat.png" alt="">Please enter a message below.</label>`;
    if(inp.value==''){
        item.appendChild(error);
        inp.value="";
    }
    else{
        item.appendChild(newItem);
        fetch('chat.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `user=${encodeURIComponent(inp.value)}`
        })
        .then(response => response.text())
        .then(bot => {
            let botMessage = document.createElement('div');
            botMessage.innerHTML = `<label for="bot" id="bot" name="bot"><img src="Components/svg/chat.png" alt="">${bot}</label>`;
            item.appendChild(botMessage);
            inp.value="";
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        });
    }
}


//Slide message

// let i = 0;
// let txt = '| RESERVE ROOM FOR FAMILY VACATION |&| RESERVE ROOM FOR BUSINESS MEETINGS |&| RESERVE ROOM FOR TOUR ||';
// let speed = 50;
// typeWriter();
// function sleep(ms) {
//     return new Promise(resolve => setTimeout(resolve, ms));
// }
// async function typeWriter() {
//   if (i < txt.length) {
//     if(txt.charAt(i) == "&"){
//         i = i+1;
//         await sleep(3000);
//         document.getElementById("slide-mess").innerHTML = "";
//     }
//     if(i==txt.length-1){
//         i=0;
//         await sleep(3000);
//         document.getElementById("slide-mess").innerHTML = "";
//     }
//     document.getElementById("slide-mess").innerHTML += txt.charAt(i);
//     i++;
//     setTimeout(typeWriter, speed);
//   }
// }

// Hotels Facilities


let count = 0;
let active = 0;
let temp = 0;
function show(n){
    active = n;
    temp = 1;
}
let a = ["Gym","Bar","Pickup","Spa","Resturant"];
slideshow();

function slideshow(){
    let x = document.getElementsByClassName("svg-m");
    let y = document.getElementById("text");
    for(let i=0; i<x.length; i++){
        x[i].style.display = "none";
    }
    if(temp == 1){count=active;temp=0;}
    count++;
    if(count > x.length){count = 1}
    x[count - 1].style.display = "block";
    y.innerHTML = a[count-1];
    setTimeout(slideshow, 3000);
}

//datepicker update

function date(){
    let temp=document.getElementById("ci").value;
    let da=new Date(temp);
    let d = da.getDate();
    let m = da.getMonth()+1;
    let y = da.getFullYear();
    if(m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12){
        if(d==31){
            d=1;
            m=m+1
        }
        else{
            d=d+1;
        }
    }
    else{
        if(m==2 && y%4==0){
            if(d==29){
                d=1;
                m=m+1;
            }
            else{
                d=d+1;
            }
        }
        else if(m==2 && y%4!=0){
            if(d==28){
                d=1;
                m=m+1;
            }
            else{
                d=d+1;
            }
        }
        else{
            if(d==30){
                d=1;
                m=m+1;
            }
            else{
                d=d+1;
            }
        }
    }
    if(m==13){
        d=1;
        m=1;
        y=y+1;
    }
    let upda='';
    if(m<10){
        m="0"+m;
    }
    if(d<10){
        d="0"+d;
    }
    upda = y+"-"+m+"-"+d;
    document.getElementById("co").setAttribute("min",upda);
}
function pop(){
    let show=document.getElementById("popup");
    setTimeout(()=>{show.style.display="flex";},1000);
    setTimeout(()=>{show.style.display="none";},4000);
}