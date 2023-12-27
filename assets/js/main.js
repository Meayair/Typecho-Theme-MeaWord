// 变黑函数
function setDark() {
  localStorage.setItem("isDarkMode", "1");
  document.documentElement.classList.add("dark");
}
// 变白函数
function removeDark() {
  localStorage.setItem("isDarkMode", "0");
  document.documentElement.classList.remove("dark");
}
// switch按钮
function switchDarkMode() {
  let isDark = localStorage.getItem("isDarkMode");
  if (isDark == '1') {
    removeDark();
  } else {
    setDark();
  }
}


//到某个高度后，给某个div加class
$(window).scroll(function () {
  if ($(window).scrollTop() > 900) {
    $('.headbox').addClass('fixednav');
  }
  else {
    $('.headbox').removeClass('fixednav');
  }
});



//table预设calss
$('.meapost table').addClass("table");


// 返回顶部
const scrollToTopBtn = document.querySelector(".scrollToTopBtn");
const rootElement = document.documentElement;

function handleScroll() {
  const scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
  // 计算整屏的高度
  const oneScreenHeight = rootElement.clientHeight;

  if (rootElement.scrollTop > oneScreenHeight) {
    scrollToTopBtn.classList.add("showBtn");
  } else {
    scrollToTopBtn.classList.remove("showBtn");
  }
}

function scrollToTop() {
  rootElement.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

scrollToTopBtn.addEventListener("click", scrollToTop);
document.addEventListener("scroll", handleScroll);


//锚点
$(function () {
  $('a[href^="#"]').click(function () {
    var speed = 10;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

$(function () {
  $(".meapost").find("a").attr("target", "_blank");
});