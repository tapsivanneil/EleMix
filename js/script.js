let element_focus = 0;

const setElementName = (
  element_1_val,
  element_2_val,
  subscript_1_val,
  subscript_2_val
) => {
  var element_1 = document.getElementById("element_1");
  var element_2 = document.getElementById("element_2");
  var subscript_1 = document.getElementById("subscript_1");
  var subscript_2 = document.getElementById("subscript_2");

  element_1.innerHTML = element_1_val;
  element_2.innerHTML = element_2_val;
  subscript_1.innerHTML = subscript_1_val;
  subscript_2.innerHTML = subscript_2_val;

  getResult();
};

const setElementFocus = (num) => {
  element_focus = "element_" + num;
};

const getResult = () => {
  //console.log("lupet");
  var el_1 = document.getElementById("element_1").innerHTML;
  var el_2 = document.getElementById("element_2").innerHTML;

  var sub_1 = document.getElementById("subscript_1").innerHTML;
  var sub_2 = document.getElementById("subscript_2").innerHTML;

  var el_1 = (document.getElementById("element_1_search").value = el_1);
  var el_2 = (document.getElementById("element_2_search").value = el_2);

  var sub_1 = (document.getElementById("subscript_1_search").value = sub_1);
  var sub_2 = (document.getElementById("subscript_2_search").value = sub_2);

  // console.log(el_1 + sub_1 + el_2 + sub_2);
};

var audio = document.getElementById("bgm");
audio.volume = 0.1;

console.log(audio.volume);
