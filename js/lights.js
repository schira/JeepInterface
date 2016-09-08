(function () {

    $(function () {
        $("[name='chkbox-rearlights']").bootstrapSwitch('state', true, true);
        $("[name='my-checkbox']").bootstrapSwitch();
        $("[name='my-checkbox']").bootstrapSwitch();
        $("[name='toggleAll']").bootstrapSwitch();
        $('input[name="toggleAll"]').on('switchChange.bootstrapSwitch', function (event, state) {
            console.log(state)
            if (state === false) {
                $("[name='my-checkbox']").bootstrapSwitch('state', false)
            }
            if (true == state) {
                $("[name='my-checkbox']").bootstrapSwitch('state', true)
            }
        });

        $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function (event, state) {
            inputValue = this;
            if (state === false) {
                task = 'enable'
            }
            if (state === true) {
                task = 'disable'
            }
            $.ajax({
                type: "POST",
                url: "../../executeClass.php",
                data: "lightNum=" + inputValue.value + "&Task=" + task,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                    }
                }
            });
        });

    });
}).call(this);

