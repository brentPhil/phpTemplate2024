function submitFormGeneric({
                               formData,
                               apiEndpoint,
                               onSuccess,
                               onError,
                               modalSelector = null,
                               loadingSpinnerSelector = '#loadingSpinner',
                               toastContainerSelector = '#toast-container'
                           }) {
    // Show loading spinner
    $(loadingSpinnerSelector).removeClass('hidden');

    $.ajax({
        url: apiEndpoint,
        method: 'POST',
        data: formData,
        contentType: false,  // Required for FormData
        processData: false,  // Required for FormData
        success: function(response) {
            // Parse the JSON response
            const result = JSON.parse(response);

            if (!result.success) {
                // Handle validation or server-side errors
                console.error('Operation failed:', result.errors);
                $(loadingSpinnerSelector).addClass('hidden');
                if (typeof onError === 'function') {
                    onError(result.errors);
                } else {
                    $(toastContainerSelector).toast({
                        title: 'Error',
                        description: 'Something went wrong!',
                        icon: 'bi bi-x-square-fill',
                        showCloseBtn: true,
                        duration: 5000,
                        variant: 'error',
                        reload: false,
                    });
                }
            } else {
                setTimeout(function() {
                    $(loadingSpinnerSelector).addClass('hidden');
                    if (modalSelector) {
                        $(modalSelector)[0].close();
                    }
                    if (typeof onSuccess === 'function') {
                        onSuccess(result.message);
                    } else {
                        $(toastContainerSelector).toast({
                            variant: 'success',
                            title: '',
                            description: result.message || 'Operation completed successfully!',
                            icon: 'bi bi-check-square-fill',
                            showCloseBtn: false,
                            duration: 4000
                        });
                    }
                }, 1000);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            console.error('AJAX error:', error);
            $(loadingSpinnerSelector).addClass('hidden');
            if (modalSelector) {
                $(modalSelector)[0].close();
            }
            if (typeof onError === 'function') {
                onError(error);
            } else {
                $(toastContainerSelector).toast({
                    title: 'Error',
                    description: 'Something went wrong!',
                    icon: 'bi bi-x-square-fill',
                    showCloseBtn: true,
                    duration: 5000,
                    variant: 'error',
                    reload: false,
                });
            }
        }
    });
}
