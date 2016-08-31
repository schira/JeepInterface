(function() {
    $(window).load(function() {
        $.ajax({
            type: "POST",
            url: "executeClass.php",
            data: "Task=allStatus",
            success: function(text) {
                $.each($.parseJSON(text), function(index, element) {
                    $("[value=" + index + "]").bootstrapSwitch('state', element)
                    console.log('Light:' + index + ' Value:' + element)
                });

            }
        });
    });
    $(function() {
        $("[name='chkbox-rearlights']").bootstrapSwitch('state', true, true);
        $("[name='my-checkbox']").bootstrapSwitch();
        $("[name='my-checkbox']").bootstrapSwitch();
        $("[name='toggleAll']").bootstrapSwitch();
        $('input[name="toggleAll"]').on('switchChange.bootstrapSwitch', function(event, state) {
            console.log(state)
            if (state === false) {
                $("[name='my-checkbox']").bootstrapSwitch('state', false)
            }
            if (true == state) {
                $("[name='my-checkbox']").bootstrapSwitch('state', true)
            }
        });

        $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
            inputValue = this;
            console.log(inputValue.value); // DOM element
            console.log(event); // jQuery event
            console.log(state); // true | false
            if (state === false) {
                task = 'disable'
            }
            if (state === true) {
                task = 'enable'
            }
            $.ajax({
                type: "POST",
                url: "executeClass.php",
                data: "lightNum=" + inputValue.value + "&Task=" + task,
                success: function(text) {
                    if (text == "success") {
                        formSuccess();
                    }
                }
            });
        });
    });
}).call(this);
