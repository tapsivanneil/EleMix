let element_focus = 0;

const setElementName = (input_name, element_name) => {
  var element = document.getElementById(input_name);
  element.innerHTML = element_name;
};

const setElementFocus = (num) => {
  element_focus = "element_" + num;
};

const getResult = () => {
  //console.log("lupet");
  var el_1 = document.getElementById("element_1").innerText;
  var el_2 = document.getElementById("element_2").innerText;
  var sub_1 = document.getElementById("subscript_1").value;
  var sub_2 = document.getElementById("subscript_2").value;

  el_1 =
    el_1 == "Element 1" ? "" : document.getElementById("element_1").innerHTML;
  el_2 =
    el_2 == "Element 2" ? "" : document.getElementById("element_2").innerHTML;

  var element_res = document.getElementById("element_result");
  element_res.value = el_1 + sub_1 + el_2 + sub_2;
};
