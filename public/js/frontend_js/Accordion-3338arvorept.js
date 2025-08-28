var acc = document.getElementsByClassName("ps-accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("ps-active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// var acc = document.getElementsByClassName("ps-accordion");
// var panel = document.getElementsByClassName('ps-panel');

// for (var i = 0; i < acc.length; i++) {
//   acc[i].onclick = function() {
//     var setClasses = !this.classList.contains('ps-active');
//       setClass(acc, 'ps-active', 'remove');
//       setClass(panel, 'show', 'remove');

// //owais added 4 lines:
//       var cat_id = $(this).val();
//       var cat;
//       window.cat = cat_id;
//       PriceFilter(cat_id);


//       if (setClasses) {
//           this.classList.toggle("ps-active");
//           this.nextElementSibling.classList.toggle("show");
//       }
//   }
// }

// function setClass(els, className, fnName) {
//   for (var i = 0; i < els.length; i++) {
//       els[i].classList[fnName](className);
//   }
// }
