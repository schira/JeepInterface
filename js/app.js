(function () {
    $(function () {
        $("[id^=mainbtns]").on('click', function () {
            $("[id^=mainbtns]").each(function () {
                var $img = $(this);
                var data = $img.data('oldsrc');
                if (data) {
                    $img.attr('src', data);
                }
            });

            var $this = $(this);
            var src = $this.attr('src');
            if (src != $this.attr('newsrc')) {
                $this.data('oldsrc', src);
            }

            $this.attr('src', 'images/' + $this.attr('newsrc') + '.gif');
            $('#mainArea').load('/' + $this.attr('id') + '.php');

        });

    });
}).call(this);

