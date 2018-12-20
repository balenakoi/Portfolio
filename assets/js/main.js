function openNavbar() {
  document.querySelector("#navbar").style.width = "100%";
  document.querySelectorAll(".open")[0].style.opacity = 0;
  document.getElementById("disc").style.display = "none";
  document.getElementById("FOOTER").style.display = "none";
}

function closeNavbar() {
  document.querySelector("#navbar").style.width = "0";
  document.querySelectorAll(".open")[0].style.opacity = 1;
  document.getElementById("disc").style.display = "block";
  document.getElementById("FOOTER").style.display = "block";
}
