function showMessage(msg, type) {
    $(document).ready(function() {
        switch (type) {
            case 'success':
                $().toastmessage('showSuccessToast', msg);
                break;
            case 'notice':
                $().toastmessage('showNoticeToast', msg);
                break;
            case 'warning':
                $().toastmessage('showWarningToast', msg);
                break;
            case 'danger':
                $().toastmessage('showErrorToast', msg);
                break;
            default:
                $().toastmessage('showSuccessToast', msg);
                break;
        }
    });
}
function removeBackdrop() {
    $(function() {
        $('#divModal').html('');
        $('.modal-backdrop').removeClass('modal-backdrop');

    });
}