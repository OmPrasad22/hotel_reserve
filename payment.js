let ted=0;
function re(){
    window.location.reload()=true;
}
function f(value){
    let tc = document.getElementById("tab_r");
    document.getElementById("room").max=value;
    tc.innerHTML=fu(value);
}
function fu(inp){
    let t='';
    t='<table><tr><th style="width: 40%;">Name</th><th style="width: 15%;">Age</th><th style="width: 15%;">Gender</th><th style="width: 30%;">Mobile No.</th></tr>';
    for(let i=0;i<inp;i++){
        t=t+'<tr><td><input type="text" name="name[]" placeholder="Enter Name" style="width: 80%;" required></td><td><input type="text" name="age[]" placeholder="Enter Age" style="width: 80%;" required></td><td><select name="gender[]" id="" style="width: 80%;" required><option value="na">None</option><option value="Male">Male</option><option value="Female">Female</option></select></td><td><input type="text" maxlength="10" name="mno[]" placeholder="Enter Mobile No." style="width: 80%;" required></td></tr>';
    }
    t=t+'</table>';
    return t;
}

// SingleXA Suite
// DoubleXA Suite
// QuadXA Suite
// Executive Suite
// Royal Suite
function up(value,rup){
    let r=0;
    if(value == "SingleXA Suite"){
        r = rup + ((rup * 10) / 100);
        document.getElementById("pay").value=r;
        ted = r;
    }
    else if(value == "DoubleXA Suite"){
        r = rup + ((rup * 20) / 100);
        document.getElementById("pay").value=r;
        ted = r;
    }
    else if(value == "QuadXA Suite"){
        r = rup + ((rup * 40) / 100);
        document.getElementById("pay").value=r;
        ted = r;
    }
    else if(value == "Executive Suite"){
        r = rup + ((rup * 50) / 100);
        document.getElementById("pay").value=r;
        ted = r;
    }
    else if(value == "Royal Suite"){
        r = rup + ((rup * 75) / 100);
        document.getElementById("pay").value=r;
        ted = r;
    }
    else{
        document.getElementById("pay").value=rup;
        ted = rup;
    }
}
function roomup(value,rup){
    let ro = 0;
    rup=document.getElementById("pay").value;
    if(value == 0 || value == ''){
        ro = rup;
    }
    else{
        ro = value * rup;
        document.getElementById("nop").max=value*3;
    }
    document.getElementById("pay").value=ro;
    ted = ro;
}
function dateup(){
    let date1 = new Date(document.getElementById("ci").value);
    let date2 = new Date(document.getElementById("co").value);

    // Calculating the time difference
    // of two dates
    let Difference_In_Time =
        date2.getTime() - date1.getTime();

    // Calculating the no. of days between
    // two dates
    let Difference_In_Days =
        Math.round
            (Difference_In_Time / (1000 * 3600 * 24));

    // To display the final no. of days (result)
    document.getElementById("pay").value = ted * Difference_In_Days;
}
function fsc(value){
    if(value == "Online"){
        document.getElementById("qr").style.display="block";
        document.getElementById("upr").style.display="block";
        document.getElementById("updoc").required=true;
    }
    else{
        document.getElementById("qr").style.display="none";
        document.getElementById("upr").style.display="none";
        document.getElementById("updoc").required=false;
    }
}
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