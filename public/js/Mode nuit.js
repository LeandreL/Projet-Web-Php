var btn = document.querySelector('input');
var mode = document.getElementById('mode')

btn.addEventListener('click', updateBtn);

function updateBtn() {
  if (btn.value === 'Mode jour') {
    btn.value = 'Mode nuit';
    mode.style.backgroundColor = "white";
    mode.style.color = "dimgray";
  } else {
    btn.value ='Mode jour';
    mode.style.backgroundColor = "black";
    mode.style.color = "white";
  }
}

