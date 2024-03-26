<!DOCTYPE html>
<html lang="en">

<head>

    <title>CODE WITH HOSSEIN</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="css/style3.css">

    <!-- BoxIcons v2.1.2 -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">

</head>

<body class="light">

    <input type="checkbox" id="toggle">

    <label class="toggle" for="toggle">
        <i class="bx bxs-sun"></i>
        <i class="bx bx-moon"></i>
        <span class="ball"></span>
    </label>


</body>

</html>


<script>
const body = document.querySelector("body");
const toggle = document.querySelector("#toggle");
const sunIcon = document.querySelector(".toggle .bxs-sun");
const moonIcon = document.querySelector(".toggle .bx-moon");

toggle.addEventListener("change", () => {
    
    body.classList.toggle("dark");
    sunIcon.className = sunIcon.className == "bx bxs-sun" ? "bx bx-sun" : "bx bxs-sun";
    moonIcon.className = moonIcon.className == "bx bxs-moon" ? "bx bx-moon" : "bx bxs-moon";

});
</script>

