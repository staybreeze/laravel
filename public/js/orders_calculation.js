
document.addEventListener('DOMContentLoaded', function() {
  const numberInputs = document.querySelectorAll('.quantity-input');
  const priceElements = document.querySelectorAll('.price');
  const totalElements = document.querySelectorAll('.subtotal');
  const userPriceElements = document.querySelectorAll('.user-total-price');
  const totalPriceElement = document.getElementById('totalPrice');
  const userNames = Array.from(userPriceElements).map(element => {
    return element.getAttribute('data-username');
  });

  let itemPrices = Array.from(priceElements).map(element => parseFloat(element.innerText));
  let itemNumbers = Array.from(numberInputs).map(input => parseInt(input.value));

  function updateTotals(index) {
    // 檢查數量和價格是否是有效數字
    if (!isNaN(itemNumbers[index]) & !isNaN(itemPrices[index])) {
      let itemTotal = itemPrices[index] * itemNumbers[index];

      totalElements[index].innerText = itemTotal;

      updateGrandTotal();
      updateUserTotal();
    }
  }
  // ---與updateGrandTotal相同邏輯---
  function updateUserTotal() {
    const userNames = Array.from(userPriceElements).map(element => {
      return element.getAttribute('data-username');
    });

    userPriceElements.forEach((userPriceElement, index) => {
      let totalElementsForUser = Array.from(totalElements)
        .filter(element => {
          const userName = userNames[index];
          return element.id.startsWith(`subtotal_${userName}`);
        });

      let userTotal = totalElementsForUser
        .map(element => {
          let value = parseFloat(element.innerText);
          return isNaN(value) ? 0 : value;
        })
        .reduce((acc, value) => acc + value, 0);

      if (userTotal > 5000) {
        userTotal = Math.round(userTotal * 0.8);
      }
      userPriceElement.innerHTML = `<b>總計：<span class='underline'>${userTotal}</span>元</b>`;
    });
  }
  // ------

  // ---與updateUserTotal相同邏輯---
  function updateGrandTotal() {

    let grandTotal = 0;

    const userNames = Array.from(userPriceElements).map(element => {
      return element.getAttribute('data-username');
    });

    userPriceElements.forEach((userPriceElement, index) => {
      let totalElementsForUser = Array.from(totalElements)
        .filter(element => {
          const userName = userNames[index];
          return element.id.startsWith(`subtotal_${userName}`);
        });

      let userTotal = totalElementsForUser
        .map(element => {
          let value = parseFloat(element.innerText);
          return isNaN(value) ? 0 : value;
        })
        .reduce((acc, value) => acc + value, 0);


      if (userTotal > 5000) {
        userTotal = Math.round(userTotal * 0.8);
      }


      grandTotal += userTotal;
    });


    console.log(`Grand Total: ${grandTotal}`);


    totalPriceElement.innerHTML = `<b>總訂單金額：<span class='underline'>${grandTotal}</span>元</b>`;
  }

  // ------

  numberInputs.forEach((input, index) => {
    input.addEventListener('input', function() {
      // 檢查數量是否小於1，如果是，將其設置為1
      itemNumbers[index] = Math.max(1, parseInt(input.value));
      input.value = itemNumbers[index]; // 更新輸入欄位的值
      updateTotals(index);
    });
  });

  // 最初更新總計
  Array.from(totalElements).forEach((element, index) => {
    updateTotals(index);
  });
});
