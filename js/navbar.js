var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);

dashboard = document.getElementById("menu-dashboard");
employee = document.getElementById("menu-employee");
retailer = document.getElementById("menu-retailer");
route = document.getElementById("menu-route");
routeShow = document.getElementById("menu-routeShow");
attendance = document.getElementById("menu-attendance");
order = document.getElementById("menu-order");


dashboard.classList.remove("active");
employee.classList.remove("active");
retailer.classList.remove("active");
route.classList.remove("active");
routeShow.classList.remove("active");
attendance.classList.remove("active")
order.classList.remove("active")


if(filename=="index.php" || filename==""){
    dashboard.classList.add("active");
}
else if(filename=="employee.php" || filename=="addEmployee.php" || filename=="editEmployee.php"){
    employee.classList.add("active");
}
else if(filename=="retailer.php" || filename=="addRetailer.php"){
    retailer.classList.add("active");
}
else if(filename=="employeeRoute.php"){
    route.classList.add("active");
}
else if(filename=="routeShow.php" || filename=="editRoute.php"){
    routeShow.classList.add("active");
}
else if(filename== "attendance.php"){
    attendance.classList.add("active")
}
else if(filename== "order.php" || filename == "orderDetails.php"){
    order.classList.add("active")
}