BX.ready(
    function () {
        // console.log(BX('sendbutton').value)
        var sendButton = BX.UI.ButtonManager.createByUniqId(BX('sendbutton').value)
        sendButton.bindEvent('click', function () {

            function showError(errorText, errorButton = 'Давай по новой нахуй') {
                BX.UI.Dialogs.MessageBox.alert(errorText, (messageBox, button, event) => {
                    messageBox.close()
                }, errorButton);
            }

            if (!BX('producer').value) {
                showError('Вы не заполнили поле: Производитель')
                return;
            }
            if (!BX('name').value) {
                showError('Вы не заполнили поле: Название')
                return;
            }

            if (!BX('value').value) {
                showError('Вы не заполнили поле: Обьем')
                return;
            } else {
                if (Number.isNaN(Number.parseFloat(BX('value').value))) {
                    showError('Вы ввели неподходящие значение')
                    return;
                }
            }
            if (!BX('price').value) {
                showError('Вы не заполнили поле: Цена')
                return;
            } else {
                if (Number.isNaN(Number.parseFloat(BX('price').value))) {
                    showError('Вы ввели неподходящие значение')
                    return;
                }
            }

            BX.ajax.runAction('amadare:example.api.Api.addPerfume', {
                data: {
                    producer: BX('producer').value,
                    name: BX('name').value,
                    producer_country: BX('producer_country').value,
                    value: BX('value').value,
                    price: BX('price').value
                }
            }).then(function (data) {
                if (data.status == 'success') {
                    showError('Данный успешно отправлены', 'Всё иди нахуй')
                }

            })
        })
    }
)