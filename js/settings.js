const lightTheme = document.getElementById("lightTheme");
const darkTheme = document.getElementById("darkTheme");
const lightThemeSidebar = document.getElementById("lightThemeSidebar");
const darkThemeSidebar = document.getElementById("darkThemeSidebar");
var str = "00000"
// const mini_sidebar_setting = document.getElementById("mini_sidebar_setting");
// const sticky_header_setting = document.getElementById("sticky_header_setting");

// console.log(mini_sidebar_setting.value)
// console.log(sticky_header_setting.value)

lightTheme.onclick= ()=>{
    if(lightTheme.checked==true){
        str = replaceChar(str,"0",0)
    }
    document.cookie = "themeSettings="+str+"; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
}
darkTheme.onclick= ()=>{
    if(darkTheme.checked==true){
        str = replaceChar(str,"1",0)
    }
    document.cookie = "themeSettings="+str+"; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
}





cookie = getCookie("themeSettings");
console.log(cookie[0])
if(cookie[0]=="0"){
    lightTheme.checked = true
    darkTheme.checked = false
    console.log("hi")

}
else if(cookie[0]=="1"){
    lightTheme.checked = false
    darkTheme.checked = true
    console.log("hiiiiii")
    console.log(darkTheme)

}
else{
    console.log("h")
}


function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}

function replaceChar(origString, replaceChar, index) {
    let firstPart = origString.substr(0, index);
    let lastPart = origString.substr(index + 1);
        
    let newString = firstPart + replaceChar + lastPart;
    return newString;
}