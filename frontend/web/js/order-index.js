$( document ).ready(function() {
    $('input#order-select-all').click(function(event) {
        var inputs = $('input.order-select');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = this.checked;
        }
    });

    $('a#btn-print-order').click(function(event) {
        event.preventDefault();
        var checked_inputs = $('input.order-select:checked');
        var ids = new Array();
        for (var i = 0; i < checked_inputs.length; i++) {
            ids.push(checked_inputs[i].value);
        }
        if (ids.length == 0) {
            alert('您未选择任何订单!');
        } else {
            window.open(this.href.replace('__ids__', ids.join(',')));
        }
    });
});