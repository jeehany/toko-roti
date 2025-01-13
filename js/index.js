function incrementQuantity() {
  const input = document.getElementById("quantity");
  input.value = parseInt(input.value) + 1;
}

function decrementQuantity() {
  const input = document.getElementById("quantity");
  if (parseInt(input.value) > 1) {
    input.value = parseInt(input.value) - 1;
  }
}
