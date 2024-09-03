(function($) {
    $.fn.toast = function(options) {
        // Default options
        const settings = $.extend({
            title: '',
            description: '',
            icon: '',
            showCloseBtn: true,
            reload: true,
            duration: 3000,
            variant: 'info'  // Default variant
        }, options);

        // Determine alert class based on variant
        let alertClass;
        switch(settings.variant) {
            case 'success':
                alertClass = 'alert-success';
                break;
            case 'error':
                alertClass = 'alert-error';
                break;
            case 'warning':
                alertClass = 'alert-warning';
                break;
            case 'info':
            default:
                alertClass = 'alert-info';
                break;
        }

        // Toast HTML structure
        const toast = $(`
            <div class="toast toast-top toast-center z-40">
                <div class="rounded-md p-3 alert ${alertClass}">
                    ${settings.icon ? `<i class="${settings.icon}"></i>` : ''}
                    <div>
                    ${settings.title && `<strong>${settings.title}</strong>`}
                    <div class="text-sm">${settings.description}</div>
                    </div>
                    ${settings.showCloseBtn ? '<button class="close-btn">&times;</button>' : ''}
                </div>
            </div>
        `);

        // Append toast to container
        $('#toast-container').append(toast);

        // Handle close button
        if (settings.showCloseBtn) {
            toast.find('.close-btn').on('click', function() {
                toast.fadeOut(function() {
                    $(this).remove();
                });
            });
        }

        // Auto-remove after duration
        setTimeout(function() {
            toast.fadeOut(function() {
                $(this).remove();
            });
            settings.reload && setTimeout(function (){
                location.reload();
            }, 1000);
        }, settings.duration);

        return this;
    };
}(jQuery));
