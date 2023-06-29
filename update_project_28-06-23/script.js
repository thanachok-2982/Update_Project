var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("buttonTHEN");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

function getLanguage() {
  // อ่านค่าภาษาที่เลือกจากคุกกี้
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith('lang=')) {
          return cookie.substring(5);
      }
  }
  // ถ้าไม่มีคุกกี้ภาษา ให้ใช้ภาษาเริ่มต้น (ภาษาไทย)
  return 'th';
}

window.addEventListener("load", function() {
  const lang = getLanguage();
  changeLanguage(lang);
});