function showLoginPopup() {
  document.getElementById("loginPopup").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function hideLoginPopup() {
  document.getElementById("loginPopup").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
function redirectToPage() {
  location.href = "../PhP_pages/Mainpages/register_page.php";
}
function uitloggen() {
  let loguit = confirm('Weet u zeker dat u wilt uitloggen?');
  if (loguit) {
    location.href = 'uitloggen.php';
  }
}
function create_list() {
  location.href = "../PhP_pages/Mainpages/createList_page.php";
}
function easy_list() {
  location.href = "../PhP_pages/Mainpages/easyList_page.php";
}
function medium_list() {
  location.href = "../PhP_pages/Mainpages/mediumList_page.php";
}
function hard_list() {
  location.href = "../PhP_pages/Mainpages/hardList_page.php";
}


