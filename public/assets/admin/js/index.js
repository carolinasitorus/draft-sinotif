var Index = function() {

    function formPost(target, params) {
        var form = document.createElement('form');
        console.log(1);

        form.setAttribute('method', 'POST');
        form.setAttribute('action', target);
        for(var key in params) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('name', key);
            hiddenField.setAttribute('value', params[key]);
            hiddenField.setAttribute('type', 'hidden');

            form.appendChild(hiddenField);
        }

        $(form).appendTo("body").submit();
    }

    function initDeleteForm() {
        var element = $('tbody');

        if (!element.length) {
            return;
        }
        element.delegate('a.delete', 'click', function(event) {

            var href = this.getAttribute('href', '#'),
                token = this.getAttribute('data-token'),
                message = this.getAttribute('data-message');

            var params = {
                _token: token,
                _method: 'DELETE'
            };

            if (message == null) {
                message = 'Are sure want to delete this?';
            }

            if (confirm(message)) {
                formPost(href, params);
            }
            event.preventDefault();
        });
    }

    function initSwitch() {
        var elements = $('.mini-switch')

        if (!elements.length) return;

        elements.on('switchChange.bootstrapSwitch', function (event, state) {
            var link = this.getAttribute('data-url');
            var token = this.getAttribute('data-token');

            console.log(this.getAttribute('data-url'));
            console.log(event.currentTarget);
            console.log(state);
            $.ajax({
                type: "POST",
                url: link,
                data: {
                    state: state,
                    _token: token
                }
            });
        });
        elements.bootstrapSwitch();
    }

    return {
        init: function() {
            initDeleteForm();
        },
        draw: function() {
            initSwitch();
        }
    };
}();
