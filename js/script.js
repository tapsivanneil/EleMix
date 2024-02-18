let element_focus = 0;

const setElementName = (input_name, element_name) => {
  var element = document.getElementById(input_name);
  element.innerHTML = element_name;
};

const setElementFocus = (num) => {
  element_focus = "element_" + num;
};
